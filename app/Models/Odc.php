<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odc extends Model
{
    use HasFactory;
    protected $table = 'odc';
    protected $fillable = [
        'wilayah_id',
        'nama',
        'deskripsi',
        'latitude',
        'longitude',
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function kml_history()
    {
        return $this->hasMany(KMLHistory::class, 'odc_id');
    }
}
