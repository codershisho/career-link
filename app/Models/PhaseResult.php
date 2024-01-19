<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhaseResult extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 't_phase_results';
    protected $guarded = ['id'];

    public function phase()
    {
        return $this->belongsTo(Phase::class, 'phase_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class, 'assessment_id', 'id');
    }
}
