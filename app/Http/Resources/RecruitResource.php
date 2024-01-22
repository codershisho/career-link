<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class RecruitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_kana' => $this->name_kana,
            'email' => $this->email,
            'birth_date' => $this->birth_date ? Carbon::parse($this->birth_date)->format('Y-m-d') : null,
            'post_code' => $this->post_code,
            'address' => $this->address,
            'phone' => $this->phone,
            'positions' => explode(",", $this->positions),
            'join_date' => $this->join_date ? Carbon::parse($this->join_date)->format('Y-m-d') : null,
            'source' => $this->source,
            'free_message' => $this->free_message,
            'created_at' => $this->created_at ? Carbon::parse($this->created_at)->format('Y-m-d H:i:s') : null,
            'updated_at' => $this->updated_at ? Carbon::parse($this->updated_at)->format('Y-m-d H:i:s') : null,
            'max_phase_id' => $this->max_phase_id,
            'max_phase_name' => $this->max_phase_name,
        ];
    }
}
