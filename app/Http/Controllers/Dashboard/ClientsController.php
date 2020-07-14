<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Clients\CreateClientsRequest;
use App\Http\Requests\Dashboard\Clients\EditClientsRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest()->paginate();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientsRequest $request)
    {
        Client::create([
            'name' => $request->input('name'),
            'image' => $request->file('image')->store('images/clients', 'public'),
            'user_id' => Auth::user()->id,
        ]);

        session()->flash('success', 'تم انشاء العميل بنجاح');

        return redirect(route('dashboard.clients.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('dashboard.pages.clients.form', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(EditClientsRequest $request, Client $client)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->image->store('images/clients', 'public');
            Storage::disk('public')->delete($client->image);
            $data['image'] = $image;
        }

        $client->update($data);

        session()->flash('success', 'تم تعديل بيانات العميل بنجاح');

        return redirect(route('dashboard.clients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //delete client image form storage
        Storage::disk('public')->delete($client->image);

        $client->delete();

        session()->flash('error', 'تم حذف العميل بنجاح');

        return redirect(route('dashboard.clients.index'));
    }
}
