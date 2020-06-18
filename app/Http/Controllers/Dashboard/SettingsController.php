<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Settings\CreateSettingsRequest;
use App\Http\Requests\Dashboard\Settings\EditSettingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('dashboard.pages.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.settings.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSettingsRequest $request)
    {
        Setting::create([
            'slogan' => $request->input('slogan'),
            'intro_image' => $request->file('intro_image')->store('images/settings', 'public'),
            'header_logo' => $request->file('header_logo')->store('images/settings', 'public'),
            'footer_logo' => $request->file('footer_logo')->store('images/settings', 'public'),
        ]);

        session()->flash('success', 'تم انشاء الاعدادات بنجاح');
        return redirect(route('settings.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('dashboard.pages.settings.form', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(EditSettingsRequest $request, Setting $setting)
    {
        $data = $request->only('slogan');

        if ($request->hasFile('intro_image')) {
            Storage::disk('public')->delete($setting->intro_image);
            $data['intro_image'] = $request->file('intro_image')->store('images/settings', 'public');
        }

        if ($request->hasFile('header_logo')) {
            Storage::disk('public')->delete($setting->header_logo);
            $data['header_logo'] = $request->file('header_logo')->store('images/settings', 'public');
        }

        if ($request->hasFile('footer_logo')) {
            Storage::disk('public')->delete($setting->footer_logo);
            $data['footer_logo'] = $request->file('footer_logo')->store('images/settings', 'public');
        }

        $setting->update($data);

        session()->flash('success', 'تم تعديل الاعدادات بنجاح');

        return redirect(route('settings.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        Storage::disk('public')->delete($setting->intro_image);
        Storage::disk('public')->delete($setting->header_logo);
        Storage::disk('public')->delete($setting->footer_logo);
        $setting->delete();

        session()->flash('error', 'تم حذف الاعدادات بنجاح');

        return redirect(route('settings.index'));
    }
}
