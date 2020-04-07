<?php

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Str;

    class UsersWtTable extends Seeder
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
                    'user_id' => 1,
                    'worktime' => "08:30:00",
                    'date' => "2020-01-07",
                ],
                [
                    'user_id' => 2,
                    'worktime' => "08:30:00",
                    'date' => "2020-01-07",
                ],
                [
                    'user_id' => 3,
                    'worktime' => "08:30:00",
                    'date' => "2020-01-07",
                ],
                [
                    'user_id' => 4,
                    'worktime' => "08:30:00",
                    'date' => "2020-01-07",
                ],
                [
                    'user_id' => 5,
                    'worktime' => "08:30:00",
                    'date' => "2020-01-07",
                ],
                [
                    'user_id' => 6,
                    'worktime' => "08:30:00",
                    'date' => "2020-01-07",
                ],
                [
                    'user_id' => 7,
                    'worktime' => "08:30:00",
                    'date' => "2020-01-07",
                ],
                [
                    'user_id' => 8,
                    'worktime' => "08:30:00",
                    'date' => "2020-01-07",
                ],
                [
                    'user_id' => 9,
                    'worktime' => "08:30:00",
                    'date' => "2020-01-07",
                ],
                [
                    'user_id' => 10,
                    'worktime' => "08:30:00",
                    'date' => "2020-01-07",
                ],
                [
                    'user_id' => 11,
                    'worktime' => "08:30:00",
                    'date' => "2020-01-07",
                ],
                [
                    'user_id' => 12,
                    'worktime' => "08:30:00",
                    'date' => "2020-01-07",
                ],
            ];
            DB::table('users_worktime')->insert($data);
        }

    }
