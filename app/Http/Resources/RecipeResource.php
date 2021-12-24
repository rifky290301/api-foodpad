<?php

namespace App\Http\Resources;

use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $result = 0;
        $temp = $this->ratings;
        $count = count($temp);
        if ($count != 0) {
            for ($i = 0; $i < $count; $i++) {
                $result = $result + $temp[$i]->rating;
            }
            $result = $result / $count;
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'thumbnail' => $this->thumbnail,
            'duration' => $this->duration + $this->prepare,
            'level' => $this->level,
            'rating' => number_format($result, 1),
        ];
    }
}
