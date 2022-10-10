<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $table = 'episodes';
    public $timestamps = false;
    protected $fillable = ['number'];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
