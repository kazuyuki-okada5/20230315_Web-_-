<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'area_id', 'genre_id', 'store_overview', 'image_url'
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

   public function area()
    {
        return $this->belongsTo(Area::class);
    }
 
    public function genre()
    {
        return $this->belongsTo(Genre::class);
   }

}


