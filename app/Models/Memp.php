<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memp extends Model
{
    use HasFactory;

    protected $table='memp';
    protected $fillable = [
        'id',
        'nik',
        'name',
        'phn',
        'addr',
        'dob',
        'sex',
        'ktp',
        'stat'
    ]; 
}
