<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $employees = [
            ['name' => 'Кузнецова Алина', 'role' => 'агент · 24ч', 'color' => 'bg-orange-100 text-orange-700'],
            ['name' => 'Волков Тимур', 'role' => 'агент · 24ч', 'color' => 'bg-blue-100 text-blue-700'],
            ['name' => 'Морозова Виктория', 'role' => 'агент · 24ч', 'color' => 'bg-purple-100 text-purple-700'],
            ['name' => 'Соколов Артём', 'role' => 'агент · 24ч', 'color' => 'bg-green-100 text-green-700'],
            ['name' => 'Лебедева Полина', 'role' => 'агент · 24ч', 'color' => 'bg-pink-100 text-pink-700'],
            ['name' => 'Новиков Кирилл', 'role' => 'агент · 24ч', 'color' => 'bg-teal-100 text-teal-700'],
            ['name' => 'Ерохина Дарья', 'role' => 'агент · 24ч', 'color' => 'bg-yellow-100 text-yellow-700'],
            ['name' => 'Гаврилов Егор', 'role' => 'агент · 24ч', 'color' => 'bg-indigo-100 text-indigo-700'],
        ];

        foreach ($employees as $emp) {
            Employee::create($emp);
        }
    }
}
