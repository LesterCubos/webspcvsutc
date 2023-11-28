<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Grade;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class TemplateExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return Grade::query();
    }

    public function headings(): array
    {
        return [
            'Student Number',
            'Grade',
        ];
    }

    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function(AfterSheet $event) {
    //             $event->sheet->styleCells(
    //                 'A1:E1',
    //                 [
    //                     'font' => [
    //                         'bold' => true,
    //                     ],
    //                 ]
    //             );
    //         },
    //     ];
    // }
}
