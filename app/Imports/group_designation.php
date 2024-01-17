<?php

namespace App\Imports;

use App\Models\group_des;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class group_designation implements ToModel,WithHeadingRow{

    public function model(array $row)
    {


        $bu=DB::select('SELECT * from business_units WHERE company_id ="' . Auth::user()->company_id .' " and name= "'.$row["bu_id"].'" limit 1');
        $bu_id=$bu[0]->id;
        // dd('SELECT * FROM `bu_group` where bu_id="'.$bu[0]->id.'" and company_id="'.Auth::user()->company_id.'" AND title="'.$row['group'].'" LIMIT 1');
        $group_id=DB::select('SELECT * FROM `bu_group` where bu_id="'.$bu_id.'" and company_id="'.Auth::user()->company_id.'" AND title="'.$row['group_id'].'" LIMIT 1');
        if(count($group_id)==0){
            DB::insert('INSERT INTO `bu_group`(`title`, `bu_id`, `company_id`, `created_by`) VALUES(?,?,?,?)',['Manager',$bu_id,Auth::user()->company_id,Auth::user()->id ]);
            DB::insert('INSERT INTO `bu_group`(`title`, `bu_id`, `company_id`, `created_by`) VALUES(?,?,?,?)',['Staff',$bu_id,Auth::user()->company_id,Auth::user()->id] );

        }

        // dd($group_id);
        $designation=DB::select('SELECT * FROM `designations` where company_id ='.Auth::user()->company_id.' and title="'.$row['designation_id'].'"');
        if (count($designation) == 0) {
            DB::insert('INSERT INTO `designations`(company_id, title, active) VALUES (?,?,?)', [Auth::user()->company_id, $row["designation_id"], 1]);
            $designation_id = DB::getPdo()->lastInsertId();
        } else {
            $designation_id = $designation[0]->id;
        }
        $group=DB::select('SELECT * FROM `bu_group` where bu_id="'.$bu_id.'" and company_id="'.Auth::user()->company_id.'" AND title="'.$row['group_id'].'" LIMIT 1');


        foreach ($row as &$value) {
        if ($value === 'NULL') {
            $value = null;
        }
        }
        return new group_des([
           'bu_id' => $bu_id,
           'group_id'=>$group[0]->id,
           'designation_id'=>$designation_id
        ]);
    }
}
