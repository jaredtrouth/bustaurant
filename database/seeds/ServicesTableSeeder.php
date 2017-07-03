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
          ['id' => 1, 'starttime' => new DateTime('8/1/17 11:30:00'), 'endtime' => new DateTime('August 1, 2017 2PM'), 'loc_lat' => '36.143359', 'loc_long' => '-86.778516', 'loc_name' => 'Flip', 'loc_address' => '1100 8th Ave S, Nashville, TN 372031100 8th Ave S, Nashville, TN 37203', 'created_at' => new DateTime, 'updated_at' => new DateTime],
          ['id' => 2, 'starttime' => new DateTime('8/2/17 5:30 PM'), 'endtime' => new DateTime('8/2/17 7:00 PM'), 'loc_lat' => '36.131028', 'loc_long' => '-86.801787', 'loc_name' => "Friedman's Army Surplus", 'loc_address' => '2101 21st Ave S, Nashville, TN 37212', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        DB::table('services')->insert($services);
    }
}
