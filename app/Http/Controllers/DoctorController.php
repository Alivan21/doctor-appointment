<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::with('role')->where('role_id', 2)->paginate(10);

    return view('admin.doctor.doctor', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $roles = Role::where('id', 2)->get();
    return view('admin.doctor.doctor-add', compact('roles'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate(
      [
        'name' => 'required',
        'phone_number' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
      ]
    );

    // Create a new user instance and set role_id to 2
    $user = new User($request->all());
    $user->role_id = 2;

    // Save the user to the database
    $user->save();

    return redirect()->route('doctor')->with('success', 'Doctor created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    return view('admin.doctor.doctor-edit', compact('user'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
    $user->update($request->all());

    // Set role_id to 2
    $user->role_id = 2;

    // Save the user to the database
    $user->save();

    return redirect()->route('doctor')->with('success');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->route('doctor')->with('success', 'Doctor deleted successfully');
  }
}
