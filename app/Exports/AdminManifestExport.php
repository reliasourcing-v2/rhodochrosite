<?php

namespace App\Exports;

use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;

class AdminManifestExport implements WithHeadings, WithEvents, ShouldAutoSize
{
    public function headings(): array
    {
        return ["First Name", "Last Name", "Email", "Job Title", "Department"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                /** @var Sheet $sheet */
                $sheet = $event->sheet;

                $departments = Department::select(DB::raw("CONCAT(id, ' - ', name) AS value"))->pluck('value')->map(function ($value) {
                    return str_replace(',', ' ', $value);
                })->toArray();

                $validation = $sheet->getCell('E2')->getDataValidation();
                $validation->setType(DataValidation::TYPE_LIST);
                $validation->setErrorStyle(DataValidation::STYLE_INFORMATION);
                $validation->setAllowBlank(false);
                $validation->setShowInputMessage(true);
                $validation->setShowErrorMessage(true);
                $validation->setShowDropDown(true);
                $validation->setErrorTitle('Input error');
                $validation->setError('Option is not in list.');
                $validation->setPromptTitle('Pick from the list');
                $validation->setPrompt('Please pick an option from the drop-down list.');
                $validation->setFormula1('"' . implode(' ,', $departments) . '"');

                /**
                 * validation for Department
                 */
                $sheet->setCellValue('E2', 'SELECT AN OPTION');
                $sheet->getCell('E2')->setDataValidation(clone $validation);
            },
        ];
    }
}
