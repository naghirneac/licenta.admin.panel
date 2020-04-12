<?php

use Illuminate\Database\Seeder;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $data[] = [
                'user_id' => $i,
                'type_id' => 1,
                'status' => '0',
                'message' => 'Rog sa-mi oferiti concediu suplimentar pe data de 25.05.2020 din motiv personal',
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }


        DB::table('requests')->insert($data);
    }
}
