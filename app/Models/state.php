<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'name',
    ];

    /**
     * Define a relationship with the City model.
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * Define a relationship with the Country model.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
