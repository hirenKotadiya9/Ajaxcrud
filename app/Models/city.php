<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory; // Enables model factories for easier testing and seeding

    protected $fillable = [
        'state_id',
        'name',
    ];

    /**
     * Define a relationship with the State model.
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
