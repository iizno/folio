<?php

Class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert(array(
                array('id' => 1, 'name' => "Apps"),
                array('id' => 2, 'name' => "Illustrations"),
                array('id' => 3, 'name' => "Artworks"),
                array('id' => 4, 'name' => "Hors ligne"),
                array('id' => 5, 'name' => "Web"),
                array('id' => 6, 'name' => "game"),
                array('id' => 7, 'name' => "bla"),
            ));
    }
}
