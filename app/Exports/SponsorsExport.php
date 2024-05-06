<?php

namespace App\Exports;

use App\Constants\UserRole;
use App\Models\Children;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SponsorsExport implements FromQuery, WithHeadings, WithMapping, WithColumnWidths
{
    use Exportable;

    public function query()
    {
        return User::query()->where('role', UserRole::SPONSOR)
            ->orderBy('id', 'desc');
    }

    public function headings(): array
    {
        return [
            '#',
            'Sponsor ID',
            'Name',
            'Child ID',
            'Email',
            'Phone',
            'Status',
            'Registration date',
        ];
    }

    public function map($sponsor): array
    {
        $child_ids = DB::table('childrens')->whereNull('deleted_at')->whereIn('sponsor_id',[$sponsor->id])->pluck('child_id')->collect();
        return [
            $sponsor->id,
            $sponsor->options->sponsor_id ?? null,
            $sponsor->name ?? null,
            $child_ids->implode(', ') ?? null,
            $sponsor->email ?? null,
            $sponsor->phone ?? null,
            $sponsor->active ? 'Yes' : 'No',
            $sponsor->created_at->format('d/m/Y'),
        ];
    }

    public function columnWidths(): array
    {
        return [
            'C' => 30,
            'D' => 40,
            'E' => 25,
        ];
    }
}
