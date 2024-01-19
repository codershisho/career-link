<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhaseUserResult extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 't_phase_user_results';
    protected $guarded = ['id'];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class, 'assessment_id', 'id');
    }
}
