<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivityCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
         'data' => $this->collection->map(function ($item) use ($request) {
             // return (new ItemResource($item))->toArray($request);
             return[
               'id'=>$item->id,
               'song_name'=>$item->song_name,
               'date'=>$item->date,
               'candidate_id'=>$item->condidate_id,
               'average_scores'=>$item->ActivityScores->avg('score'),
             ];
         })
       ];
    }
}
