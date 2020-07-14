<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Pages\CreatePagesRequest;
use App\Http\Requests\Dashboard\Pages\EditPagesRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create-pages'])->only('create');
        $this->middleware(['permission:read-pages'])->only('index');
        $this->middleware(['permission:update-pages'])->only('edit');
        $this->middleware(['permission:delete-pages'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::latest()->paginate(5);
        return view('dashboard.pages.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.pages.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePagesRequest $request)
    {
        Page::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $request->file('image')->store('images/pages', 'public'),
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->input('title'), '-'),
            'show_in_menu' => $request->get('show_in_menu')
        ]);

        session()->flash('success', 'تم انشاء الصفحة بنجاح');
        return redirect(route('dashboard.pages.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
//        return view('dashboard.pages.pages.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('dashboard.pages.pages.form', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(EditPagesRequest $request, Page $page)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/pages', 'public');
            Storage::disk('public')->delete($page->image);
        }

        $page->update($data);

        session()->flash('success', 'تم تعديل الصفحه بنجاح');

        return redirect(route('dashboard.pages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        Storage::disk('public')->delete($page->image);
        $page->delete();

        session()->flash('error', 'تم حذف الصفحه بنجاح');

        return redirect(route('dashboard.pages.index'));
    }
}
