<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phase extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'm_phases';
    protected $guarded = ['id'];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'id', 'phase_id');
    }

    public function phase_users()
    {
        return $this->hasMany(PhaseUser::class, 'phase_id', 'id');
    }
}
