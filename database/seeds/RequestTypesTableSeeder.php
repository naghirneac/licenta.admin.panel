<?php

use Illuminate\Database\Seeder;

class RequestTypesTableSeeder extends Seeder
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
                'name' => 'Concediu suplimentar',
                'description' => 'Concediu suplimentar sau concediu din cont propriu.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'name' => 'Concediu medical',
                'description' => 'Concediu medical, la final trebuie prezentata foaia de boala de la medic.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'name' => 'Recuperare',
                'description' => 'Recuperarea orelor de lucru.',
                'created_at' => date('Y-m-d H:i:s'),
            ],

        ];

        DB::table('request_types')->insert($data);
    }
}
