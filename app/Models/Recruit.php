<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recruit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 't_recruits';
    protected $guarded = ['id'];
    protected $dates = ['birth_date', 'join_date'];
    protected $appends = ['max_phase_id', 'max_phase_name'];

    public function phase_results()
    {
        return $this->hasMany(PhaseResult::class, 'recruit_id', 'id');
    }

    public function getImageAttribute()
    {
        if (empty($this->attributes['image'])) {
            return '/storage/users/no_image.png';
        }
        return $this->attributes['image'];
    }

    public function getMaxPhaseIdAttribute()
    {
        return $this->phase_results()->max('phase_id');
    }

    public function getMaxPhaseNameAttribute()
    {
        if ($this->phase_results()->count() > 0) {
            return optional($this->phase_results()->where('phase_id', $this->max_phase_id))->first()->phase->name;
        }
        return null;
    }
}
