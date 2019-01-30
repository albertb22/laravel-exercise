<?php

use App\Models\Channel;
use Illuminate\Database\Seeder;

class SeedRandomChannel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel = new Channel();
        $channel->name = 'random';
        $channel->save();
    }
}
