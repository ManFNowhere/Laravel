<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
    public static function updateName($data){
        DB::update('update users set name = ? where email = ?', [$data['name'], $data['email']]);
    }    
}
