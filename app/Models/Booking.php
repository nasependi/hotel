<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = ['no_kamar', 'nama_kamar', 'checkin', 'checkout'];
    protected $guarded = [];
}
