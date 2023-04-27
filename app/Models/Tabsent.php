<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabsent extends Model
{
    use HasFactory;
    protected $casts = [
        'tdtabsent' => 'date',
    ];
    
    protected $table='tabsent';
    protected $fillable = [
        'id',
        'nik',
        'name_memp',
        'tdtabsent',
        'approval',
        'stat'
    ];    
}
