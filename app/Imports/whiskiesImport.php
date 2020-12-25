<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Whisky;
use Maatwebsite\Excel\Concerns\ToModel;

class whiskiesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return Whisky::firstOrCreate([
            'brand_id' => Brand::firstOrCreate([
                'code' => $row[1],
                'name' => explode(" ",$row[2])[0],
            ])->id,
            'name' => $row[2],
            'size' => $row[3],
            'price' => $row[5]
        ]);
    }
}
