<?php

use Illuminate\Database\Seeder;

class UserPositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => '1',
                'position_id' => '11',
            ],
            [
                'user_id' => '2',
                'position_id' => '1',
            ],
            [
                'user_id' => '3',
                'position_id' => '2',
            ],
            [
                'user_id' => '4',
                'position_id' => '3',
            ],
            [
                'user_id' => '5',
                'position_id' => '4',
            ],
            [
                'user_id' => '6',
                'position_id' => '5',
            ],
            [
                'user_id' => '7',
                'position_id' => '6',
            ],
            [
                'user_id' => '8',
                'position_id' => '7',
            ],
            [
                'user_id' => '9',
                'position_id' => '8',
            ],
            [
                'user_id' => '10',
                'position_id' => '9',
            ],
            [
                'user_id' => '11',
                'position_id' => '10',
            ],
            [
                'user_id' => '12',
                'position_id' => '5',
            ],
        ];

        DB::table('user_positions')->insert($data);
    }
}
