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
            $this->call(RolesTableSeeder::class);
            $this->call(UsersTableSeeder::class);
            $this->call(UserRolesTableSeeder::class);
            $this->call(UsersWtTable::class);
            $this->call(RequestTypesTableSeeder::class);
            $this->call(RequestsTableSeeder::class);
            $this->call(PositionsTableSeeder::class);
            $this->call(UserPositionsTableSeeder::class);
        }
    }
