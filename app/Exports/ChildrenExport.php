<?php

namespace App\Exports;

use App\Models\Children;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ChildrenExport implements FromQuery, WithHeadings, WithMapping, WithColumnWidths
{
    use Exportable;

    public function query()
    {
        return Children::query()
            ->sort();
    }

    public function headings(): array
    {
        return [
            '#',
            'Child ID',
            'Name',
            'Sponsor',
            'Region',
            'Date of birth',
            'Status',
        ];
    }

    public function map($children): array
    {
        return [
            $children->id,
            $children->child_id ?? null,
            $children->title ?? null,
            $children->sponsor->name ?? null,
            $children->region->title ?? null,
            $children->date_of_birth ?? null,
            $children->active ? 'Yes' : 'No',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'C' => 30,
            'D' => 30,
            'E' => 30,
            'F' => 25,
        ];
    }
}
