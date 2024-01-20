<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhaseUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 't_phase_users';
    protected $guarded = ['id'];

    public function recruit()
    {
        return $this->belongsTo(Recruit::class, 'recruit_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class, 'assessment_id', 'id');
    }

    // public function result()
    // {
    //     return $this->belongsTo(PhaseUserResult::class, 'id', 'phase_user_id');
    // }
}
