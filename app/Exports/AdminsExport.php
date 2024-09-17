<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\Border;

class AdminsExport implements FromCollection, WithMapping, WithHeadings, WithEvents
{
    private $admins;

    public function __construct($admins)
    {
        $this->admins = $admins;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->admins->get();
    }

    /**
     * @return array
     */
    public function map($admin): array
    {
        return [
            $admin->id,
            $admin->first_name,
            $admin->last_name,
            $admin->email,
            $admin->department->name,
            $admin->title,
            Date::dateTimeToExcel($admin->created_at),
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'First Name',
            'Last Name',
            'Email',
            'Department',
            'Title',
            'Created At',
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:G1';

                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

                $styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_THICK,
                            'color' => ['argb' => 'FFFF0000'],
                        ],
                    ],
                ];

                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(20);
            },
        ];
    }
}
