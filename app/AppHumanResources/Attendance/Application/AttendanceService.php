<?php

namespace App\AppHumanResources\Attendance\Application;

use App\Models\AppHumanResources\Attendance\Domain\Attendance;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportAttendance;


class AttendanceService
{

    public function upload($request) {
        Excel::import(new ImportAttendance, $request->file('file')->store('files'));
    }
    public function showAttendance()
    {
        $attendance_data = Attendance::with('user:id,name')->select('*')
            ->selectRaw('ROUND((TIMESTAMPDIFF(SECOND, check_in, check_out) / 3600), 2) as total_hours')
            ->get();
        return $attendance_data;
    }
}
