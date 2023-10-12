<?php

namespace App\Commons\Enums;

enum UserRoleEnum: int
{
  case ADMIN = 1;
  case DOCTOR = 2;
  case CLIENT = 3;
}
