<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Settings\EditSettingsRequest;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read-settings'])->only('edit');
        $this->middleware(['permission:update-settings'])->only('update');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('dashboard.pages.settings.form', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function update(EditSettingsRequest $request, Setting $setting)
    {
        $data = $request->except(['intro_image', 'slogan_image', 'header_logo', 'footer_logo', 'site_icon', 'footer_image']);

        if ($request->hasFile('intro_image')) {

            if ($setting->intro_image != 'images/settings/intro_image.jpeg') {
                unlink(public_path() . '/' . $setting->intro_image);
            }

            $introImage = $request->intro_image->hashName();

            $path = public_path() . '/images/settings';

            $request->file('intro_image')->move($path, $introImage);

            $data['intro_image'] = "images/settings/$introImage";
        }

        if ($request->hasFile('site_icon')) {

            if ($setting->site_icon != 'images/settings/ipda3_icon.jpg') {
                unlink(public_path() . '/' . $setting->site_icon);
            }

            $siteIcon = $request->site_icon->hashName();

            $path = public_path() . '/images/settings';

            $request->file('site_icon')->move($path, $siteIcon);

            $data['site_icon'] = "images/settings/$siteIcon";
        }

        if ($request->hasFile('slogan_image')) {

            if ($setting->slogan_image != 'images/settings/who-are-we.png') {
                unlink(public_path() . '/' . $setting->slogan_image);
            }

            $sloganImage = $request->slogan_image->hashName();

            $path = public_path() . '/images/settings';

            $request->file('slogan_image')->move($path, $sloganImage);

            $data['slogan_image'] = "images/settings/$sloganImage";
        }

        if ($request->hasFile('header_logo')) {

            if ($setting->header_logo != 'images/settings/ipda3_logo_dark.png') {
                unlink(public_path() . '/' . $setting->header_logo);
            }

            $headerLogo = $request->header_logo->hashName();

            $path = public_path() . '/images/settings';

            $request->file('header_logo')->move($path, $headerLogo);

            $data['header_logo'] = "images/settings/$headerLogo";
        }

        if ($request->hasFile('footer_logo')) {

            if ($setting->footer_logo != 'images/settings/ipda3_logo.png') {
                unlink(public_path() . '/' . $setting->footer_logo);
            }

            $footerLogo = $request->footer_logo->hashName();

            $path = public_path() . '/images/settings';

            $request->file('footer_logo')->move($path, $footerLogo);

            $data['footer_logo'] = "images/settings/$footerLogo";
        }

        if ($request->hasFile('footer_image')) {

            if ($setting->footer_image != 'images/settings/footer_image.jpg') {
                unlink(public_path() . '/' . $setting->footer_image);
            }

            $footerImage = $request->footer_image->hashName();

            $path = public_path() . '/images/settings';

            $request->file('footer_image')->move($path, $footerImage);

            $data['footer_image'] = "images/settings/$footerImage";
        }

        $setting->update($data);

        session()->flash('success', 'تم تعديل الاعدادات بنجاح');

        return redirect()->back();
    }

}
