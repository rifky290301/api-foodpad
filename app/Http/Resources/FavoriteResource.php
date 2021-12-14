<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteResource extends JsonResource
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
        $temp = $this->recipe->ratings;
        $count = count($temp);
        if ($count != 0) {
            for ($i = 0; $i < $count; $i++) {
                $result = $result + $temp[$i]->rating;
            }
            $result = $result / $count;
        }

        return [
            'id' => $this->id,
            'recipe_id' => $this->recipe_id,
            'user_id' => $this->user_id,
            'name' => $this->recipe->name,
            'thumbnail' => $this->recipe->thumbnail,
            'duration' => $this->recipe->duration,
            'level' => $this->recipe->level,
            'rating' => number_format($result, 1),
        ];
    }
}
