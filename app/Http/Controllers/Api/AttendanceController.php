<?php

namespace App\Http\Controllers;

use App\AppHumanResources\Attendance\Application\AttendanceService;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{

    public function __construct(public AttendanceService $attendanceService)
    {
    }
    public function uploadAttendance(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,xls',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        
        $this->attendanceService->upload($request);
        return response()->json(['message' => 'Attendance data uploaded successfully']);
    }

    public function showAttendance()
    {
        $attendance = $this->attendanceService->showAttendance();
        return response()->json(['message' => 'Attendance', 'data' => $attendance]);
    }
}
