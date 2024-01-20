<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhaseResultResource extends JsonResource
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
            'phase_result_id' => $this->phase_result ? $this->phase_result->id : null,
            'assessment_id' => $this->phase_result ? $this->phase_result->assessment_id : null,
            'result_flg' => $this->phase_result ? $this->phase_result->result_flg : null,
            'review_comment' => $this->phase_result ? $this->phase_result->review_comment : null,
            'memo' => $this->phase_result ? $this->phase_result->memo : null,
        ];
    }
}
