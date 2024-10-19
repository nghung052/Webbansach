<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserRole;

class DecentralizationRepository 
{
  public static function getDecentralization($user_name)
  {
     $company_id = null;

  	$user = User::select('users.id', 'users.id_role', 'users.id_company')
                 ->join('roles', 'roles.id', '=', 'users.id_role')
                 ->where('username',$user_name)
                 ->first();
    $company_id = $user->id_company;
  	$user_id = $user->id;
    $id_role = $user->id_role;
      
  	return ['company_id' => $company_id, 'id_role' => $id_role, 'user_id' => $user_id];

  }

}