<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pretreatment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plants_id',
        'trains_id',

        'well_pump', // nullable
        'feed_pump', // nullable

        'frecuencies_well_pump', // nullable
        'frecuencies_feed_pump', // nullable

        'backwash',
        'observations',

        'user_created_at',
        'user_updated_at' // nullable
    ];

    public function trains(){
        return $this->belongsTo(Train::class, 'id', 'trains_id');
    }

    public function assignedBy(){
        return $this->hasOne(User::class, 'id', 'user_created_at');
    }

    public function multimedias(){
        return $this->hasMany(MultimediaFilter::class, 'pretreatments_id', 'id');
    }

    public function polish(){
        return $this->hasMany(PolishFilter::class, 'pretreatments_id', 'id');
    }
}
