<?php

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Str;

    class UsersTableSeeder extends Seeder
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
                    'id' => 1,
                    'name' => 'admin',
                    'idnp' => '0000000000001',
                    'birth_date' => '1988-11-02',
                    'enrolment_date' => date('Y-m-d'),
                    'email' => 'a@a.ru',
                    'password' => bcrypt(12345678),
                    'img' => 'user_photo_man.png',
                ],
                [
                    'id' => 2,
                    'name' => 'user',
                    'idnp' => '0000000000002',
                    'birth_date' => '1985-11-10',
                    'enrolment_date' => date('Y-m-d'),
                    'email' => 'u@u.ru',
                    'password' => bcrypt(12345678),
                    'img' => 'user_photo_man.png',
                ],
                [
                    'id' => 3,
                    'name' => 'sasha',
                    'idnp' => '0000000000003',
                    'birth_date' => '1990-01-02',
                    'enrolment_date' => date('Y-m-d'),
                    'email' => 'admin@admin.ru8',
                    'password' => bcrypt(12345678),
                    'img' => 'user_photo_man_2.png',
                ],
                [
                    'id' => 4,
                    'name' => 'masha',
                    'idnp' => '0000000000004',
                    'birth_date' => '1995-11-05',
                    'enrolment_date' => date('Y-m-d'),
                    'email' => 'admin@admin.ru9',
                    'password' => bcrypt(12345678),
                    'img' => 'user_photo_woman.png',
                ],
                [
                    'id' => 5,
                    'name' => 'pasha',
                    'idnp' => '0000000000005',
                    'birth_date' => '1997-04-06',
                    'enrolment_date' => date('Y-m-d'),
                    'email' => 'admin@admin.ru10',
                    'password' => bcrypt(12345678),
                    'img' => 'user_photo_man.png',
                ],
                [
                    'id' => 6,
                    'name' => 'misha',
                    'idnp' => '0000000000006',
                    'birth_date' => '1970-10-20',
                    'enrolment_date' => date('Y-m-d'),
                    'email' => 'admin@admin.ru11',
                    'password' => bcrypt(12345678),
                    'img' => 'user_photo_man_2.png',
                ],
                [
                    'id' => 7,
                    'name' => 'dasha',
                    'idnp' => '0000000000007',
                    'birth_date' => '1980-12-12',
                    'enrolment_date' => date('Y-m-d'),
                    'email' => 'admin@admin.ru12',
                    'password' => bcrypt(12345678),
                    'img' => 'user_photo_woman_2.png',
                ],
                [
                    'id' => 8,
                    'name' => 'olia',
                    'idnp' => '0000000000008',
                    'birth_date' => '1989-09-28',
                    'enrolment_date' => date('Y-m-d'),
                    'email' => 'admin@admin.ru13',
                    'password' => bcrypt(12345678),
                    'img' => 'user_photo_woman.png',
                ],
                [
                    'id' => 9,
                    'name' => 'kolia',
                    'idnp' => '0000000000009',
                    'birth_date' => '1998-08-02',
                    'enrolment_date' => date('Y-m-d'),
                    'email' => 'admin@admin.ru14',
                    'password' => bcrypt(12345678),
                    'img' => 'user_photo_man.png',
                ],
                [
                    'id' => 10,
                    'name' => 'oleg',
                    'idnp' => '0000000000010',
                    'birth_date' => '1993-07-05',
                    'enrolment_date' => date('Y-m-d'),
                    'email' => 'admin@admin.ru15',
                    'password' => bcrypt(12345678),
                    'img' => 'user_photo_man_2.png',
                ],
                [
                    'id' => 11,
                    'name' => 'ira',
                    'idnp' => '0000000000011',
                    'birth_date' => '1975-06-04',
                    'enrolment_date' => date('Y-m-d'),
                    'email' => 'admin@admin.ru16',
                    'password' => bcrypt(12345678),
                    'img' => 'user_photo_woman.png',
                ],
                [
                    'id' => 12,
                    'name' => 'nastia',
                    'idnp' => '0000000000012',
                    'birth_date' => '1978-01-22',
                    'enrolment_date' => date('Y-m-d'),
                    'email' => 'admin@admin.ru17',
                    'password' => bcrypt(12345678),
                    'img' => 'user_photo_woman_2.png',
                ],
            ];
            DB::table('users')->insert($data);
        }

    }
