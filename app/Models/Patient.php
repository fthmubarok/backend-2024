<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
      // membuat fungsi getallStudents di model Student
      public static function getAllPatients()
      {
          $patients = DB::select('select * from patients');
          return $patients;
      }

      protected $fillable = [
        'name',
        'phone',
        'address',
        'status',
        'in_date_at',
        'out_date_at'
    ];
}
