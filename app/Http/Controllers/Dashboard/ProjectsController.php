<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Projects\CreateProjectRequest;
use App\Http\Requests\Dashboard\Projects\EditProjectRequest;
use App\Models\Photo;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create-projects'])->only('create');
        $this->middleware(['permission:read-projects'])->only('index');
        $this->middleware(['permission:update-projects'])->only('edit');
        $this->middleware(['permission:delete-projects'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->paginate(5);
        return view('dashboard.pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.projects.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        // create a new project
        $image = $request->image->hashName();
        $imageFolder = 'images/projects/image';
        $imagePath = public_path($imageFolder);
        $request->file('image')->move($imagePath, $image);

        $coverImage = $request->cover_image->hashName();
        $coverImageFolder = 'images/projects/cover';
        $coverImagePath = public_path($coverImageFolder);
        $request->file('cover_image')->move($coverImagePath, $coverImage);

        $project = Project::create([
            'title' => $request->input(['title']),
            'content' => $request->input(['content']),
            'image' => "$imageFolder/$image",
            'cover_image' => "$coverImageFolder/$coverImage",
            'slug' => Str::slug($request->title, '-'),
            'user_id' => Auth::user()->id,
        ]);

        // store multiple image
        if ($request->hasFile('project_images')) {
            $images = $request->file('project_images');
            $folder = 'images/projects/project_images';
            $path = public_path($folder);
            foreach ($images as $image) {
                $imageName = $image->hashName();
                $image->move($path, $imageName);
                // create a new project images
                $project->photos()->create([
                    'image' => $folder . '/' . $imageName,
                ]);
            }
        }
        return redirect(route('dashboard.projects.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Project $project
     * @param Photo $photos
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('dashboard.pages.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('dashboard.pages.projects.form', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(EditProjectRequest $request, Project $project)
    {
        // update data in projects table
        $data = $request->only(['title', 'content']);
        $data['slug'] = Str::slug($data['title'], '-');

        // check if request has a new image and delete old cover image files
        if ($request->hasfile('image')) {
            $image = $request->image->hashName();
            $imageFolder = 'images/projects/image';
            $imagePath = public_path($imageFolder);
            File::delete(public_path($project->image));
            $request->file('image')->move($imagePath, $image);
            $data['image'] = "$imageFolder/$image";
        }

        // check if request has a new cover image and delete old cover image files
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->cover_image->hashName();
            $coverImageFolder = 'images/projects/cover';
            $coverImagePath = public_path($coverImageFolder);
            File::delete(public_path($project->cover_image));
            $request->file('cover_image')->move($coverImagePath, $coverImage);
            $data['cover_image'] = "$coverImageFolder/$coverImage";
        }

        // update request with a new data
        $project->update($data);

        // upload data in photos table
        if ($request->hasFile('project_images')) {
            $folder = 'images/projects/project_images';
            $path = public_path($folder);

            // delete old project images
            $images = $project->photos()->get('image');

            foreach ($images as $item) {
                $project->photos()->delete();
                File::delete(public_path($item->image));
            }

            // create a new project images
            $newImages = $request->file('project_images');

            foreach ($newImages as $image) {
                $imageName = $image->hashName();
                $image->move($path, $imageName);
                // create a new project images
                $project->photos()->create([
                    'image' => $folder . '/' . $imageName,
                ]);
            }
        }

        session()->flash('success', 'تم تعديل المشروع بنجاح');

        return redirect(route('dashboard.projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //delete image form storage
        File::delete(public_path($project->image));

        //delete cover image form storage
        File::delete(public_path($project->cover_image));

        //delete project images form storage
        $images = $project->photos()->get('image');
        foreach ($images as $item) {
            File::delete(public_path($item->image));
        }
        //deleting from database
        $project->photos()->delete();
        $project->delete();

        session()->flash('error', 'تم حذف المشروع بنجاح');
        return redirect(route('dashboard.projects.index'));
    }
}
