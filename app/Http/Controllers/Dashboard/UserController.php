<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Users\CreateUserRequest;
use App\Http\Requests\Dashboard\Users\EditUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create-users'])->only('create');
        $this->middleware(['permission:read-users'])->only('index');
        $this->middleware(['permission:update-users'])->only('edit');
        $this->middleware(['permission:delete-users'])->only('destroy');
    }

    public function index()
    {
        $users = User::whereRoleIs('admin')->get();
        return view('dashboard.pages.users.index', compact('users'));
    } // end of index


    public function create()
    {
        return view('dashboard.pages.users.form');
    } //end of create


    public function store(CreateUserRequest $request)
    {
        $data = $request->except(['password', 'password_confirmation', 'permissions', 'image']);
        $data['password'] = Hash::make($request->input('password'));
        $user = User::create($data);
        $user->attachRole('admin');
        $user->syncPermissions($request->get('permissions'));


        session()->flash('success', 'تم انشاء المشرف بنجاح');

       return redirect(route('dashboard.users.index'));

    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        return view('dashboard.pages.users.form', compact('user'));
    }


    public function update(EditUserRequest $request, User $user)
    {
        $data = $request->except(['permissions']);

        $user->update($data);

        $user->syncPermissions($request->get('permissions'));

        session()->flash('success', 'تم تعديل المشرف بنجاح');

        return redirect(route('dashboard.users.index'));
    }


    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('error', 'تم حذف المشرف بنجاح');

        return redirect(route('dashboard.users.index'));
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.pages.users.profile', compact('user'));
    }


    public function updateProfile(Request $request, $id)
    {
//        dd($request->all());
        $user = User::findOrFail($id);

        $data = $request->except(['password', 'password_confirmation', 'image']);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($user->image);

            $image = $request->file(['image'])->store('images/users', 'public');

            $data['image'] = $image;
        }

        $data['password'] = Hash::make($request->input(['password']));

        $user->update($data);


        session()->flash('success', 'تم تعديل الملف الشخصي بنجاح');

        return redirect(route('home'));
    }
}
