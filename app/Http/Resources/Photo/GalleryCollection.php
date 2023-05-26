<?php

namespace App\Http\Resources\Photo;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GalleryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->groupBy('year_month'),
            'timeline' => $this->collection->sortByDesc('year_month')->pluck('year_month')->unique()->values(),
        ];
    }
}
