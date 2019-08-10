<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Resources\CandidateCollection;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if($request->mentor_id){
        $mentorId = $request->mentor_id;
        $candidates = Candidate::where('mentor_id',$mentorId)->get();
      }else {
        $candidates = Candidate::all();
      }
        return new CandidateCollection($candidates);
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
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
    }

    public function teamAverage (Integer $mentorId){
      // $mentorId = Candidate::find($request->candidat_id)->mentor_id;
      $candidates = Candidate::where('mentor_id', $mentorId)->get();
      // return $candidates;
        $candidateScoresSum = 0;
        $count = 0;
      foreach ($candidates as $candidate) {
        // $activities = new ActivityCollection( $candidate->Activities);
        // return $activities;
        $activities = $candidate->Activities;
        // return $activities;
          foreach ($activities as $activity) {
              $count = $count+1;
              $candidateScoresSum = $candidateScoresSum + $activity->ActivityScores->avg('score');

          }

        // return   $activity;
      }
      return   $candidateScoresSum / $count;
    }
}
