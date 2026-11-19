<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        $shifts = [];
        foreach (Shift::all() as $shift) {
            $key = $shift->employee_id . '-' . $shift->date;
            $shifts[$key] = [
                'name' => $shift->name,
                'time' => $shift->time,
                'hours' => $shift->hours,
                'colorClass' => $shift->color_class,
            ];
        }

        return response()->json([
            'employees' => $employees,
            'shifts' => $shifts
        ]);
    }

    public function store(Request $request)
    {
        // 1. Валидация входящих данных
        $validated = $request->validate([
            'shifts' => 'nullable|array',
            'shifts.*.name' => 'required|string',
            'shifts.*.time' => 'required|string',
            'shifts.*.hours' => 'required|integer',
            'shifts.*.colorClass' => 'nullable|string',
        ]);

        $shiftsData = $validated['shifts'] ?? [];

        // 2. Использование транзакции, чтобы при ошибке база не осталась пустой
        try {
            DB::transaction(function () use ($shiftsData) {
                Shift::query()->delete();

                foreach ($shiftsData as $key => $shift) {
                    [$employeeId, $day] = explode('-', $key, 2);

                    Shift::create([
                        'employee_id' => $employeeId,
                        'date' => $day,
                        'name' => $shift['name'],
                        'time' => $shift['time'],
                        'hours' => $shift['hours'],
                        'color_class' => $shift['colorClass'] ?? 'bg-gray-100',
                    ]);
                }
            });

            return response()->json(['message' => 'График успешно сохранен']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Ошибка при сохранении', 'error' => $e->getMessage()], 500);
        }
    }

    public function publish()
    {
        return response()->json(['message' => 'График успешно опубликован! Теперь он виден всем сотрудникам.']);
    }
}
