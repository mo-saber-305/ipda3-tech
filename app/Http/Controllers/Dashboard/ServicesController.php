<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Services\CreateServicesRequest;
use App\Http\Requests\Dashboard\Services\EditSevicesRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create-services'])->only('create');
        $this->middleware(['permission:read-services'])->only('index');
        $this->middleware(['permission:update-services'])->only('edit');
        $this->middleware(['permission:delete-services'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->paginate(5);
        return view('dashboard.pages.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.services.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServicesRequest $request)
    {
        $image = $request->file('image')->hashName();
        $folder = 'images/services';
        $path = public_path($folder);
        $request->file('image')->move($path, $image);
        Service::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'status' => $request->get('status'),
            'image' => "$folder/$image",
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->input('title'), '-')
        ]);

        session()->flash('success', 'تم انشاء الخدمة بنجاح');

        return redirect(route('dashboard.services.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('dashboard.pages.services.form', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(EditSevicesRequest $request, Service $service)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title'], '-');

        if ($request->hasFile('image')) {
            $image = $request->file('image')->hashName();
            $folder = 'images/services';
            $path = public_path($folder);
            $request->file('image')->move($path, $image);
            File::delete(public_path($service->image));
            $data['image'] = "$folder/$image";
        }

        $service->update($data);

        session()->flash('success', 'تم تعديل الخدمة بنجاح');

        return redirect(route('dashboard.services.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        File::delete(public_path($service->image));
        $service->delete();

        session()->flash('error', 'تم حذف الخدمة بنجاح');

        return redirect(route('dashboard.services.index'));
    }
}
