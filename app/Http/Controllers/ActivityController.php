<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Resources\ActivityCollection;
use App\Models\Candidate;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //   $mentorId = Candidate::find($request->candidat_id)->mentor_id;
    //   $candidates = Candidate::where('mentor_id', $mentorId)->get();
    //   // return $candidates;
    //     $candidateScoresSum = 0;
    //     $count =0;
    //   foreach ($candidates as $candidate) {
    //     // $activities = new ActivityCollection( $candidate->Activities);
    //     // return $activities;
    //     $activities = $candidate->Activities;
    //     // return $activities;
    //       foreach ($activities as $activity) {
    //           $count = $count+1;
    //           $candidateScoresSum = $candidateScoresSum + $activity->ActivityScores->avg('score');
    //
    //       }
    //
    //     // return   $activity;
    //   }
    //   return   $candidateScoresSum / $count;
      // return $ave;
      if($request->candidat_id){
        $candidat_id = $request->candidat_id;
        $activity = Activity::where('condidate_id',$candidat_id)->get();
      }else {
        $activity = Activity::all();
      }

        return new ActivityCollection($activity);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
