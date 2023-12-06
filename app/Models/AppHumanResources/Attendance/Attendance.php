<?php

namespace App\Models\AppHumanResources\Attendance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function employees()
    {
        return $this->belongsTo(Employee::class,  'emp_id', 'id');
    }

}
