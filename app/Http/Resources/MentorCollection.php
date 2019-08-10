<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Candidate;

class MentorCollection extends ResourceCollection
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
             'email'=>$item->email,
             'teamAverage'=> $this->teamAverage($item->id),
           ];
         })
         ];
    }

     function teamAverage ($mentorId){
      $candidates = Candidate::where('mentor_id', $mentorId)->get();
        $candidateScoresSum = 0;
        $count = 0;
      foreach ($candidates as $candidate) {
        $activities = $candidate->Activities;
          foreach ($activities as $activity) {
              $count = $count+1;
              $candidateScoresSum = $candidateScoresSum + $activity->ActivityScores->avg('score');
          }
      }
      return  round($candidateScoresSum / $count,2);
    }
}
