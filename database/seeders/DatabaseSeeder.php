<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Commons\Enums\UserRoleEnum;
use App\Models\Appointment;
use App\Models\Role;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
    Role::insert([
      [
        'id' => UserRoleEnum::ADMIN,
        'role_name' => 'Admin'
      ],
      [
        'id' => UserRoleEnum::DOCTOR,
        'role_name' => 'Doctor'
      ],
      [
        'id' => UserRoleEnum::CLIENT,
        'role_name' => 'Client'
      ]
    ]);

    User::insert([
      [
        'name' => 'Admin',
        'phone_number' => '081234567890',
        'email' => 'admin@example.com',
        'password' => bcrypt('password'),
        'role_id' => UserRoleEnum::ADMIN,
      ],
      [
        'name' => 'Doctor',
        'phone_number' => '081234567891',
        'email' => 'doctor@example.com',
        'password' => bcrypt('password'),
        'role_id' => UserRoleEnum::DOCTOR,
      ],
      [
        'name' => 'User',
        'phone_number' => '081234567892',
        'email' => 'user@example.com',
        'password' => bcrypt('password'),
        'role_id' => UserRoleEnum::CLIENT,
      ]
    ]);

    Session::insert([
      [
        'user_id' => 2,
        'start_time' => '2021-01-01 08:00:00',
        'end_time' => '2021-01-01 12:00:00',
      ]
    ]);

    Appointment::insert([
      [
        'name' => 'Appointment 1',
        'user_id' => 3,
        'doctor_id' => 2,
        'appointment_date' => '2021-01-01 08:00:00',
      ]
    ]);
  }
}
