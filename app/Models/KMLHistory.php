<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KMLHistory extends Model
{
    use HasFactory;

    protected $table = 'kml_history';

    protected $fillable = [
        'odc_id',
        'user_id',
        'url'
    ];

    public function odc()
    {
        return $this->belongsTo(Odc::class, 'odc_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
