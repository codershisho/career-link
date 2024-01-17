<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'phase_id' => $this->id,
            'phase_name' => $this->name,
            'schedule_id' => $this->schedule ? $this->schedule->id : null,
            'recruit_id' => $this->schedule ? $this->schedule->recruit_id : null,
            'start_datetime' => $this->schedule ? $this->schedule->start_datetime : null,
            'end_datetime' => $this->schedule ? $this->schedule->end_datetime : null,
            'description' => $this->schedule ? $this->schedule->description : null,
        ];
    }
}
