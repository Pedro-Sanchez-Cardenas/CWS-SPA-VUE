<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Train extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plants_id',
        'capacity',
        'multimedia_filter_quantity',
        'polish_filters_types_id',
        'polish_filters_quantity',
        'tds',
        'booster_quantity',
        'status',
        'type',
        'membrane_active_area',
        'membrane_elements',
        'user_created_at',
        'user_updated_at'
    ];

    public function plant() {
        return $this->belongsTo(Plant::class, 'plants_id', 'id');
    }

    public function polish_filters_type(){
        return $this->hasOne(PolishFilterType::class, 'id', 'polish_filters_types_id');
    }

    public function multimediaFilters(){
        return $this->hasMany(MultimediaFilter::class, 'trains_id', 'id');
    }

    public function pretreatments(){
        return $this->hasMany(Pretreatment::class, 'trains_id', 'id')->orderBy('created_at', 'DESC');
    }

    public function operations(){
        return $this->hasMany(Operation::class, 'trains_id', 'id')->orderBy('created_at', 'DESC');
    }

    public function productRea(){
        return $this->hasMany(ProductionReading::class, 'trains_id', 'id')->orderBy('created_at', 'DESC');
    }
}
