<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 't_schedules';
    protected $guarded = ['id'];
    protected $dates = ['start_datetime', 'end_datetime'];

    public function phase()
    {
        return $this->belongsTo(Phase::class, 'phase_id', 'id');
    }

    public function recruit()
    {
        return $this->belongsTo(Recruit::class, 'recruit_id', 'id');
    }
}
