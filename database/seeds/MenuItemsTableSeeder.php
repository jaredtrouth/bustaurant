<?php

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menuitems')->delete();

        $items = array(
          ['id' => 1, 'name' => 'Steak Kabobs', 'slug' => 'steak-kabobs', 'image_path' => '/foo/bar.jpg', 'description' => 'Cupidatat voluptate elit irure voluptate sunt ut dolor eu magna id incididunt ut eiusmod in fugiat aliqua ea laboris.', 'active' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
          ['id' => 2, 'name' => 'The Best Cuban Sandwich', 'slug' => 'cuban', 'image_path' => 'foo/bar2.jpg', 'description' => 'In irure et occaecat.', 'active' => true, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        DB::table('menuitems')->insert($items);
    }
}
