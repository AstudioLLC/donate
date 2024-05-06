<?php

namespace App\Imports;

use App\Binding;
use Maatwebsite\Excel\Concerns\ToModel;

class BindingsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Binding([
            //
        ]);
    }
}
