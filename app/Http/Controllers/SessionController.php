<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $sessions = Session::paginate(10);

    return view('admin.session.session', compact('sessions'));
  }

  public function doctorIndex()
  {
    $current_user_id = auth()->user()->id;

    $sessions = Session::where('user_id', $current_user_id)->paginate(10);

    return view('doctor.session.session', compact('sessions'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $users = User::where('role_id', 2)->get();

    return view('admin.session.session-add', compact('users'));
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
        'start_time' => 'required',
        'end_time' => 'required|different:start_time',
        'user_id' => 'required',
      ]
    );

    $session = new Session($request->all());
    $session->save();

    return redirect()->route('session')->with('success', 'Session created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Session  $session
   * @return \Illuminate\Http\Response
   */
  public function show(Session $session)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Session  $session
   * @return \Illuminate\Http\Response
   */
  public function edit(Session $session)
  {
    $users = User::where('role_id', 2)->get();

    return view('admin.session.session-edit', compact('session', 'users'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Session  $session
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Session $session)
  {
    $session->update($request->all());

    $session->save();

    return redirect()->route('session')->with('success', 'Session updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Session  $session
   * @return \Illuminate\Http\Response
   */
  public function destroy(Session $session)
  {
    $session->delete();
    return redirect()->route('session')->with('success', 'Session deleted successfully.');
  }
}
