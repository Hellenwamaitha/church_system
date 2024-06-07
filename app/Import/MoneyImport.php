<?php

// app/Imports/UsersImport.php

namespace App\Imports;

use App\Models\Money;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Money([
            'date' => $row['date'],
            'type' => $row['type'],
            'amount' => $row['amount'],
            // Map other fields as necessary
        ]);
    }
}
