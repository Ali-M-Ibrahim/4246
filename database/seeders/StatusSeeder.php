<?php

namespace Database\Seeders;

use App\Models\status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new status();
        $obj->name='Pending';
        $obj->save();

        $obj2 = new status();
        $obj2->name='Rented';
        $obj2->save();
    }
}
