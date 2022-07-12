<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $fillable = [
            "name",
            "address",
            "city",
            "pin_code",
            "country"
    ];

}
