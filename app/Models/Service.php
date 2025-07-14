<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service';
    protected $primaryKey = 'id_service';
    
    protected $fillable =[
        'category',
        'decryption',
        'address',
        'activity_date',
        'activity_photos'
    ];
}