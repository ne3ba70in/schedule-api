<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            // Внешний ключ на таблицу employees. Если удалить сотрудника, его смены удалятся (cascade)
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');

            $table->string('date'); // Дата в формате 'пн 1', 'вт 2' (для MVP сойдет строкой)
            $table->string('name'); // Название смены: 'Утро', 'День', 'Своя'
            $table->string('time'); // Время: '07:00 - 15:00'
            $table->integer('hours'); // Количество часов: 8
            $table->string('color_class'); // CSS класс для цвета: 'bg-[#E5F0FF] text-[#1A56DB]'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
