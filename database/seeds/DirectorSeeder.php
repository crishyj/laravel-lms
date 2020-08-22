<?php

use Illuminate\Database\Seeder;
use App\Models\Director;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Director::create([           
            'email' => 'admin@admin.com',
            'password' => md5('123456'),           
        ]);
    }
}
