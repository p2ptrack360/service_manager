<?php

namespace App\Imports;

use App\Models\newbu;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BuImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //  dd($row["name"]);
        $Parent_bu=DB::select('SELECT * FROM `business_units` WHERE company_id='.Auth::user()->company_id.' And name="'.$row["parent_bu_id"].'"');


        foreach ($row as &$value) {
            if ($value === 'NULL') {
                $value = null;
            }
        }

        return new newbu([
            'company_id' => Auth::user()->company_id,
            'bu_user' => Auth::user()->id,
            'name' => $row["name"],
            'email' => $row["email"],
            'phone' => $row["phone"],
            'alternate_phone' => $row["alternate_phone"],
            'address_1' => $row["address_1"],
            'address_2' => $row["address_2"],
            'latitude' => $row["latitude"],
            'longitude' => $row["longitude"],
            'city' => $row["city"],
            'state' => $row["state"],
            'country' => $row["country"],
            'zipcode' => $row["zipcode"],
            'status' => $row["status"],
            'vendor_r' => $row["vendor_r"],
            'parent_bu_id' => (count($Parent_bu)==0?0:$Parent_bu[0]->id)

        ]);

        // $bu_id=DB::select('SELECT * FROM `business_units` WHERE company_id='.Auth::user()->company_id.' And name="'.$row["name"].'"');

        //     DB::insert('INSERT INTO `bu_group`(`title`, `bu_id`, `company_id`, `created_by`) VALUES(?,?,?,?)',['Manager'],[$bu_id[0]->id],[Auth::user()->company_id],[Auth::user()->id] );
        //     DB::insert('INSERT INTO `bu_group`(`title`, `bu_id`, `company_id`, `created_by`) VALUES(?,?,?,?)',['Staff'],[$bu_id[0]->id],[Auth::user()->company_id],[Auth::user()->id] );


    }
}
