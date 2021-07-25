<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
<<<<<<< HEAD:database/seeders/DatabaseSeeder.php
        // $this->call(OffersSeeder::class);
=======
        $this->call(LaratrustSeeder::class);
>>>>>>> 3a93cc6889084c4015c27422aa145b23c298dbda:freelancing-platform/database/seeders/DatabaseSeeder.php

    }
}
