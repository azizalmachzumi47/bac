<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_activity extends Model
{
    use HasFactory;

    protected $table = 'image_activity';
    protected $primaryKey = 'id_imageactivity';

    protected $fillable = [
        'id_service',
        'activity_photosbac'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service', 'id_service');
    }
}
