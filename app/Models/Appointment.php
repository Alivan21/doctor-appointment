<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'user_id',
    'doctor_id',
    'appointment_date',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function doctor()
  {
    return $this->belongsTo(User::class);
  }
}
