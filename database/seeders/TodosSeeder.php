<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $todos = [
            [
                'status_id' => 1,
                'title' => 'Hi there 👋, Dayah !!!',
                'description' => 'This is a test seeder',
            ],
            [
                'status_id' => 2,
                'title' => 'This is very fun',
                'description' => 'This is a test seeder',
            ],
            [
                'status_id' => 1,
                'title' => 'I hope that your invterview goes well today',
                'description' => 'This is a test seeder',
            ],
        ];

        foreach ($todos as $todo) {
            Todo::create($todo);
        }
    }
}
