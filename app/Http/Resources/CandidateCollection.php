<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CandidateCollection extends ResourceCollection
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
                 'name'=>$item->name,
                 'phone'=>$item->phone,
                 'mentor_id'=>$item->mentor_id,
               ];
           })
       ];
    }
}
