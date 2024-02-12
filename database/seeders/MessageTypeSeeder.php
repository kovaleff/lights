<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('message_types')->insert([
            'type' => 'fail',
            'title' => 'Проезд на красный. Штраф!',
        ]);
        DB::table('message_types')->insert([
            'type' => 'success',
            'title' => 'Проезд на зеленый!',
        ]);
        DB::table('message_types')->insert([
            'type' => 'success',
            'title' => 'Успели на желтый!',
        ]);
        DB::table('message_types')->insert([
            'type' => 'fail',
            'title' => 'Слишком рано начали движение!',
        ]);
    }
}
