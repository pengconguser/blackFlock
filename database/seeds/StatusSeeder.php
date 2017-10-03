<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $status=Status::firstOrNew([
           'content'=>'帅气',
       ]);
       $status->user_id='2';
       $status->save();
    }
}
