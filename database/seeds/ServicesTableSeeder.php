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
          ['id' => 1, 'date' => new DateTime('7/1/2017'), 'starttime' => new DateTime('11:30:00'), 'endtime' => new DateTime('2PM'), 'loc_lat' => '36.143359', 'loc_long' => '-86.778516', 'loc_name' => 'Flip', 'created_at' => new DateTime, 'updated_at' => new DateTime],
          ['id' => 2, 'date' => new DateTime('7/2/2017'), 'starttime' => new DateTime('5:30 PM'), 'endtime' => new DateTime('7:00 PM'), 'loc_lat' => '36.131028', 'loc_long' => '-86.801787', 'loc_name' => 'Friedman\'s Army Surplus', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        DB::table('services')->insert($services);
    }
}
