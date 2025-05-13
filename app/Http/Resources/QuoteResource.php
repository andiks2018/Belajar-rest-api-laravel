<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [

            // tampilan di stell disini
            'id' => $this->id,
            'text' => $this->text,
            'author' =>strtoupper($this->author),
        ];
    }
}
