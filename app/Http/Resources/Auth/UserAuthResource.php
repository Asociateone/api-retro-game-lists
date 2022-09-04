<?php

namespace App\Http\Resources\Auth;

use http\Client\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'e-mail' => $request->email,
            'token' => $this->resource,
        ];
    }
}
