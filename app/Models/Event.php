<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
        'location',
        'price',
        'max_capacity',
        'category_id',


    ];
    
    protected $casts = [
    'date' => 'datetime',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function isFull(){
        return $this->bookings()
            ->where('status', 'booked')
            ->count() >= $this->max_capacity;
    }

     public function getIsFullAttribute()
    {
        return $this->isFull();
    }
}

