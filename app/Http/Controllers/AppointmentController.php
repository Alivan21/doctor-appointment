<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $current_user_id = auth()->user()->id;
    $appointments = Appointment::where('user_id', $current_user_id)->paginate(10);

    return view("user.booking.booking", compact('appointments'));
  }

  public function adminIndex()
  {
    $appointments = Appointment::paginate(10);

    return view("admin.appointment.booking", compact('appointments'));
  }

  public function doctorIndex()
  {
    $current_user_id = auth()->user()->id;
    $appointments = Appointment::where('doctor_id', $current_user_id)->paginate(10);

    return view("doctor.appointment.booking", compact('appointments'));
  }

  public function doctorPatientIndex()
  {
    $current_user_id = auth()->user()->id;
    $appointments = Appointment::where('doctor_id', $current_user_id)->paginate(10);

    return view("doctor.patient.patient", compact('appointments'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $doctors = User::where('role_id', 2)->get();

    return view("user.booking.create-booking", compact('doctors'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $current_user = auth()->user();
    $request->validate([
      "name" => "required",
      "doctor_id" => "required",
      "appointment_date" => "required",
    ]);

    $appointment = new Appointment([
      "name" => $request->input("name"),
      "user_id" => $current_user->id,
      "doctor_id" => $request->input("doctor_id"),
      "appointment_date" => $request->input("appointment_date"),
    ]);

    $appointment->user_id = $current_user->id;
    $appointment->save();

    return redirect()->route("user.dashboard")->with("success", "Appointment created successfully");
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Appointment  $appointment
   * @return \Illuminate\Http\Response
   */
  public function show(Appointment $appointment)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Appointment  $appointment
   * @return \Illuminate\Http\Response
   */
  public function edit(Appointment $appointment)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Appointment  $appointment
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Appointment $appointment)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Appointment  $appointment
   * @return \Illuminate\Http\Response
   */
  public function destroy(Appointment $appointment)
  {
    //
  }
}
