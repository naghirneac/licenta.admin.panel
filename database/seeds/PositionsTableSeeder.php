<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
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
                'id' => '1',
                'name' => 'Back-End Developer',
                'description' => '...',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'name' => 'Front-End Developer',
                'description' => '...',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'name' => 'Full-Stack Developer',
                'description' => '...',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '4',
                'name' => 'Manual Tester',
                'description' => '...',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '5',
                'name' => 'Automation Tester',
                'description' => '...',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '6',
                'name' => 'Team Lead',
                'description' => '...',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '7',
                'name' => 'Designer',
                'description' => '...',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '8',
                'name' => 'System Administrator',
                'description' => '...',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '9',
                'name' => 'iOS Developer',
                'description' => '...',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '10',
                'name' => 'Android Developer',
                'description' => '...',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '11',
                'name' => 'Administrator',
                'description' => '...',
                'created_at' => date('Y-m-d H:i:s'),
            ],

        ];

        DB::table('positions')->insert($data);
    }
}
