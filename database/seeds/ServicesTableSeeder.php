<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->delete();

        $services = array(
          ['id' => 1, 'start_datetime' => new DateTime('7/1/2017 11:30:00'), 'end_datetime' => new DateTime('7/1/2017 14:00:00'), 'loc_lat' => '36.143359', 'loc_long' => '-86.778516', 'loc_name' => 'Flip', 'created_at' => new DateTime, 'updated_at' => new DateTime],
          ['id' => 2, 'start_datetime' => new DateTime('7/2/2017 17:00:00'), 'end_datetime' => new DateTime('7/2/2017 19:30:00'), 'loc_lat' => '36.131028', 'loc_long' => '-86.801787', 'loc_name' => 'Friedman\'s Army Surplus', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        DB::table('services')->insert($services);
    }
}
