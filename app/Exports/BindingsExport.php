<?php

namespace App\Exports;

use App\Models\Binding;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BindingsExport implements FromQuery, WithHeadings, WithMapping, WithColumnWidths
{
    use Exportable;

    public function query()
    {
        return Binding::query()->orderBy('id');
    }
    public function headings(): array
    {
        return [
            '#',
            'Sponsor ID',
            'Sponsor Name',
            'Child ID',
            'Amount',
            'Started',
            'Updated',
            'Next Payment',
            'Active',
        ];
    }
    public function map($binding): array
    {
        return [
            $binding->id,
            $binding->sponsor_id ?? null ,
            $binding->sponsor->name ?? null ,
            $binding->child->child_id ?? null,
            $binding->amount ?? null,
            $binding->created_at,
            $binding->updated_at,
            $binding->must_be,
            $binding->active ? 'Yes' : 'No',

        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 30,
            'C' => 15,
            'D' => 25,
            'E' => 25,
            'F' => 25,
            'G' => 20
        ];
    }

}
