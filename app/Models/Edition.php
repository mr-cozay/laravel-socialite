<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    use HasFactory;

    /**
     * Get the candidates for an edition.
     */
    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'candidate_id');
    }
}
