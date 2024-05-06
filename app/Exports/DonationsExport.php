<?php

namespace App\Exports;

use App\Models\Binding;
use App\Models\Country;
use App\Models\Donation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class DonationsExport implements FromQuery, WithHeadings, WithMapping, WithColumnWidths, WithColumnFormatting
{
    use Exportable;

    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function query()
    {
        return $this->model;
    }

    public function headings(): array
    {
        return [
            '#',
            'Sponsor name',
            'Sponsor ID',
            'Email',
            'Phone',
            'Country',
            'City',
            'Address',
            'Donation date',
            'Project type',
            'Amount',
            'Child ID',
            'Comments',
            'Is Binding',
            'Payment type',
            'Admin comments',
        ];
    }

    public function map($donation): array
    {
        $country = Country::where('id',$donation->country_id)->first();
        $bind_child = Binding::where('bindingId',$donation->bindingId)->first();

        return [
            $donation->id,
            $donation->sponsor->name ?? $donation->fullname,
            $donation->sponsor->options->sponsor_id ?? null,
            $donation->email ?? null,
            $donation->phone ?? null,
            $country->title ?? null,
            $donation->city ?? null,
            $donation->address ?? null,
            Date::dateTimeToExcel($donation->created_at),
            isset($donation->fundraiser->title) ? $donation->fundraiser->title ?? null : $donation->gift->title ?? null,
            $donation->amount,
            $donation->children->child_id ?? $bind_child->child->child_id ?? null,
            $donation->message ?? null,
            $donation->is_binding ? 'Yes' : 'No',
            Str::title($donation->card_type) ?? null,
            $donation->message_admin ?? null
        ];
    }

    public function columnFormats(): array
    {
        return [
            'I' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
    public function columnWidths(): array
    {
        return [
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 25,
            'F' => 30,
            'G' => 30,
            'H' => 30,
            'I' => 30,
            'J' => 30,
            'K' => 30,
            'L' => 30,
            'M' => 30,
            'N' => 30
        ];
    }
}
