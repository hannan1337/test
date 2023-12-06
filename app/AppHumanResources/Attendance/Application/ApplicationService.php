<?php

namespace App\AppHumanResources\Attendance\Application;

use App\Models\AppHumanResources\Attendance\Domain\Attendance;

class ApplicationService
{
    public function groupByOwnersService()
    {
        $given_array = ['insurance.txt' => "Company A", "Letter.docx" => "Company A", 'Contract.docx' => 'Company B'];



        $result = [];

        foreach ($given_array as $key => $value) {
            if (!isset($result[$value])) {
                $result[$value] = [$key];
            } else {
                $result[$value][] = $key;
            }
        }


        return $result;
    }
}
