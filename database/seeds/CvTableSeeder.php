<?php

use Illuminate\Database\Seeder;
use App\Models\CV;

class CvTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\CV::class, 50)->create();
    }
}
