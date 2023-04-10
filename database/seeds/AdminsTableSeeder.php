<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords = [
            [
                'id' => 1,
                'name' => 'admin',
                'type' => 'admin',
                'mobile' => '01965885389',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678'),
                'image' => '',
                'status' => 1,
            ]
        ];
        DB::table('admins')->insert($adminRecords);

        // foreach ($adminRecords as $key => $record) {
        //     \App\Admin::create($record);
        // }
    }
}
