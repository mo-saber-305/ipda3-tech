<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Clients\CreateClientsRequest;
use App\Http\Requests\Dashboard\Clients\EditClientsRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('dashboard.pages.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.clients.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientsRequest $request)
    {
        $image = $request->image->hashName();
        $path = public_path() . '/images/clients';
        $request->file('image')->move($path, $image);

        Client::create([
            'name' => $request->input('name'),
            'url' => $request->input('url'),
            'image' => "images/clients/$image",
            'user_id' => Auth::user()->id,
        ]);

        session()->flash('success', 'تم انشاء العميل بنجاح');

        return redirect(route('dashboard.clients.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('dashboard.pages.clients.form', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(EditClientsRequest $request, Client $client)
    {
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            File::delete(public_path($client->image));
            $folder = 'images\clients';
            $path = public_path($folder);
            $image = $request->image->hashName();
            $request->file('image')->move($path, $image);
            $data['image'] = "$folder/$image";
        }

        $client->update($data);

        session()->flash('success', 'تم تعديل بيانات العميل بنجاح');

        return redirect(route('dashboard.clients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //delete client image form storage
        File::delete(public_path($client->image));

        $client->delete();

        session()->flash('error', 'تم حذف العميل بنجاح');

        return redirect(route('dashboard.clients.index'));
    }
}
