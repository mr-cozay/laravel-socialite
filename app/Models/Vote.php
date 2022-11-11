<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'candidate_id'
    ];

    /**
     * Get candidates own votes.
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
