<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultPhaseUserResource extends JsonResource
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
            'phase_users' => $this->users()
        ];
    }

    private function users()
    {
        $users = collect($this->phase_users);

        if ($users->isEmpty()) {
            return null;
        }

        return $users->map(function ($user) {
            return [
                'phase_user_id' => $user->id,
                'user_id' => $user->user->id,
                'user_name' => $user->user->name,
                'assessment_id' => $user->assessment->id,
                'assessment_name' => $user->assessment->name,
                'assessment_color' => $user->assessment->color_code,
                'comment' => $user->comments,
            ];
        })->values()->toArray();
    }
}
