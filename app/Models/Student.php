<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function getStudents(){
        $records = DB::table('students')->select('id','name','address','city','pin_code','country')->get()->toArray();
        return $records;
    }

}
