<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Projects\CreateProjectRequest;
use App\Http\Requests\Dashboard\Projects\EditProjectRequest;
use App\Models\Photo;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        // create a new project
        $project = Project::create([
            'title' => $request->input(['title']),
            'content' => $request->input(['content']),
            'image' => $request->file(['image'])->store('images/projects/image', 'public'),
            'cover_image' => $request->file(['cover_image'])->store('images/projects/cover_image', 'public'),
            'slug' => Str::slug($request->title, '-'),
            'user_id' => Auth::user()->id,
        ]);

        // store multiple image
        if($request->hasFile('project_images'))
        {
            $images = $request->file('project_images');
            foreach($images as $image)
            {
                // create a new project images
                $project->photos()->create([
                    'project_images' => $image->store('images/projects/project_images', 'public'),
                    'ext' => $image->extension(),
                ]);
            }
        }
        return redirect(route('projects.index'));
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(EditProjectRequest $request, Project $project)
    {
        // update data in projects table
        $data = $request->only(['title', 'content']);
        $data['slug'] = Str::slug($data['title'], '-');

        // check if request has a new image and delete old cover image files
        if ( $request->hasfile('image') ) {
            $image = $request->file('image')->store('images/projects/image','public');
            Storage::disk('public')->delete($project->image);
            $data['image'] = $image;
        }

        // check if request has a new cover image and delete old cover image files
        if ($request->hasFile('cover_image')) {
            $cover_image = $request->file('cover_image')->store('images/projects/cover_image','public');
            Storage::disk('public')->delete($project->cover_image);
            $data['cover_image'] = $cover_image;
        }

        // update request with a new data
        $project->update($data);

        // upload data in photos table
        if($request->hasFile('project_images'))
        {
            // delete old project images
            $images = $project->photos()->get('project_images');
            foreach ($images as $image) {
                $project->photos()->delete($image);
                Storage::disk('public')->delete($image->project_images);
            }

            // create a new project images
            foreach($request->file('project_images') as $project_image) {
                $project->photos()->create([
                    'project_images' => $project_image->store('images/projects/project_images', 'public'),
                    'ext' => $project_image->extension(),
                ]);
            }
        }

        session()->flash('success', 'تم تعديل المشروع بنجاح');

        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //delete image form storage
        Storage::disk('public')->delete($project->image);

        //delete cover image form storage
        Storage::disk('public')->delete($project->cover_image);

        //delete project images form storage
        $images = $project->photos()->get('project_images');
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->project_images);
        }
        //deleting from database
        $project->photos()->delete();
        $project->delete();

        session()->flash('error', 'تم حذف المشروع بنجاح');
        return redirect(route('projects.index'));
    }
}
