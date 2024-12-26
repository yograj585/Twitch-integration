<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RoleTypeUser extends Model
{
    use HasFactory;

    protected $table = 'role_type_users'; // The name of the table if it's different from the model's plural name
}