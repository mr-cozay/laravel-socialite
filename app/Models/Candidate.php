<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'firstname', 'age', 'photo'
    ];

     /**
     * Get edition.
     */
    public function edition()
    {
        return $this->hasOne(Edition::class);
    }

    /**
     * Get votes.
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
