<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
        'id' => '1',
        'name' => 'admin',
      ]);
      DB::table('roles')->insert([
        'id' => '2',
        'name' => 'mentor',
      ]);
        DB::table('users')->insert([
          'name' => 'admin',
          'phone' => '1111111',
          'email' => 'sh.afzaly@gmail.com',
          'password' => '123456',
          'role_id' => 1,
        ]);

        // create fake data
        factory(App\Models\User::class, 5)->create()
        ->each(function ($user) {
            $user->Candidates()->saveMany(factory(App\Models\Candidate::class,4)->create(['mentor_id' => $user->id])
        ->each(function ($candidate) {
            $candidate->Activities()->saveMany(factory(App\Models\Activity::class,5)->create(['condidate_id' => $candidate->id])
        ->each(function ($activity) {
            $activity->ActivityScores()->saveMany(factory(App\Models\ActivityMentorScore::class,5)->create(['activity_id' => $activity->id])
          );
            })
            );
        })
    );
    });
    }
}
