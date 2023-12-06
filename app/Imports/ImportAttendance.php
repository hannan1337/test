<?php

namespace App\Imports;

use App\Models\AppHumanResources\Attendance\Domain\Attendance ;
use DateTime;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportAttendance implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $check_in = new DateTime($row[1]);
        $check_out = new DateTime($row[2]);
        return new Attendance([
            'emp_id' => $row[0],
            'check_in' => $check_in->format('H:i:s'),
            'check_out' => $check_out->format('H:i:s'),
        ]);
    }
}
