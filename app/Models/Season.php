<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $table = 'seasons';
    public $timestamps = false;
    protected $fillable = ['number'];

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function episodes()
    {
        $this->hasMany(Episode::class);
    }
}
