<?php

use Illuminate\Database\Seeder;
use App\College;

class CollegeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AppUser::class, 15)->create();
    }
}
