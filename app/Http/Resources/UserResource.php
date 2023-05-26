<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'name' => $this->name,
          'job_title' => $this->job_title,
          'birth_date' => $this->birth_date,
          'phone_number' => $this->phone_number,
          'adopted' => $this->created_at,
          'fired' => $this->deleted_at,
        ];
    }
}
