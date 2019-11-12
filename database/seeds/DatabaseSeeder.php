<?php

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
        // $this->call(UsersTableSeeder::class);

        /* role seeder */
        DB::table('roles')->insert([
            'id' => 1,
            'title' => 'Customer',
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'title' => 'Seller',
        ]);

    
        /* seller category seeder */
        factory(App\SellerCategory::class, 10)->create();

        /* user seeder */
        factory(App\User::class, 20)->create();

        /* request seeder */
        factory(App\Request::class, 10)->create();
    }
}
