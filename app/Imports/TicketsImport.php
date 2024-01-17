<?php

namespace App\Imports;

use App\Models\Priority;
use App\Models\Tickets_new;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TicketsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {


//  dd($row);
// Assuming $row is a row from your Excel file
$completed_date_serialized = $row['completed_date']; // Replace 'date_column' with the actual column name

// Convert serialized date to a Carbon instance
$date = Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($completed_date_serialized - 2);

// Format the date as needed (e.g., 'Y-m-d')
$completed_date = $date->format('Y-m-d');
$due_date_serialized = $row['due_date']; // Replace 'date_column' with the actual column name

// Convert serialized date to a Carbon instance
$date = Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($due_date_serialized - 2);

// Format the date as needed (e.g., 'Y-m-d')
$due_date = $date->format('Y-m-d');

// Now you can use $formattedDate to save the date in your database

        $reported_by_id = "";
        $assign_to_id = "";
        // $created_by_id = "";
        $completed_by_id = "";
        $priority_id = '';
        $impact_id = '';
        $status_id = '';
        $type_id = '';
        $bu_id = "";


        // dd($row);

        $assign_to = DB::select('SELECT * FROM users WHERE company_id = ' . Auth::user()->company_id . ' AND name="' . $row["assigned_to"] . '"');

        // $created_by = DB::select('SELECT * FROM users WHERE company_id = ' . Auth::user()->company_id . ' AND name="' . $row["created_by"] . '"');
        $reported_by = DB::select('SELECT * FROM users WHERE company_id = ' . Auth::user()->company_id . ' AND name="' . $row["reported_by"] . '"');

        $business = DB::select('SELECT * FROM business_units WHERE company_id = ' . Auth::user()->company_id . ' AND name="' . $row["business_unit_id"] . '"');
        // dd($business[0]->id);
        $completed_by = DB::select('SELECT * FROM users WHERE company_id = ' . Auth::user()->company_id . ' AND name="' . $row["completed_by"] . '"');
        $priority = DB::select('SELECT * FROM priority WHERE company_id = ' . Auth::user()->company_id . ' AND title="' . $row["priority_id"] . '"');
        // dd($priority[0]->id);
        $impact = DB::select('SELECT * FROM `impacts` WHERE company_id=' . Auth::user()->company_id . ' AND title ="' . $row["impact_id"] . '" ');
        // dd($impact);
        $status = DB::select('SELECT * FROM `status` WHERE company_id = ' . Auth::user()->company_id . ' AND title="' . $row["status_id"] . '" ');
        $type = DB::select('SELECT * FROM `types` WHERE company_id=' . Auth::user()->company_id . ' AND title="' . $row["sub_type_id"] . '" ');
        // dd(Auth::user()->company_id);

        // dd(count($company));
        // if (count($created_by) == 0) {

        //     $created_by_id = null;
        // } else {
        //     $created_by_id = $created_by[0]->id;
        // }
        if (count($assign_to) == 0) {

            $assign_to_id = null;
        } else {
            $assign_to_id = $assign_to[0]->id;
        }
        if (count($reported_by) == 0) {

            $reported_by_id = Auth::user()->id;
        } else {
            $reported_by_id = $reported_by[0]->id;
        }

        if (count($completed_by) == 0) {

            $completed_by_id = null;
        } else {
            $completed_by_id = $completed_by[0]->id;
        }
        if (count($business) == 0) {

            $bu_id = Auth::user()->bu_id;
        } else {
            $bu_id = $business[0]->id;
        }

        if (count($priority) == 0) {
            DB::insert('INSERT INTO priority (company_id, title, active, sla) VALUES (?, ?, ?, ?)', [Auth::user()->company_id, $row["priority_id"], 1, 1]);
            $priority_id = DB::getPdo()->lastInsertId();
        } else {
            $priority_id = $priority[0]->id;
        }
        if (count($impact) == 0) {
            DB::insert('INSERT INTO impacts ( company_id,title,active) VALUES (?,?,?)', [Auth::user()->company_id, $row["impact_id"], 1]);
            $impact_id = DB::getPdo()->lastInsertId();
        } else {
            $impact_id = $impact[0]->id;
        }
        if (count($status) == 0) {
            DB::insert('INSERT INTO `status`(`company_id`, `title`, `active` ) VALUES (?,?,?)', [Auth::user()->company_id, $row["status_id"], 1]);
            $status_id = DB::getPdo()->lastInsertId();
        } else {
            $status_id = $status[0]->id;
        }

        if (count($type) == 0) {
            DB::insert('INSERT INTO `types`(`company_id`, `title`) VALUES (?,?)', [Auth::user()->company_id, $row["sub_type_id"]]);
            $type_id = DB::getPdo()->lastInsertId();
        } else {
            $type_id = $type[0]->id;
        }

        // // dd($row);

        // dd($row);
        // return new Tickets_new([
        //     'external_id' => $row[0],
        //     'ticketID' => $row[1],
        //     'ticket_counter' => $row[2],
        //     'title' => $row[3],
        //     'description' => $row[4],
        //     'completed_date' => $row[5],
        //     'due_date' => $row[6],
        //     'company_id' => $row[7],
        //     'completed_by' => $row[8],
        //     'business_unit_id' => $row[9],
        //     'vendor_id' => $row[10],
        //     'vendor_type_id' => $row[11],
        //     'reported_by' => $row[12],
        //     'assigned_to' => $row[13],
        //     'mode_of_complaint' => $row[14],
        //     'sub_type_id' => $type_id,
        //     'priority_id' => $priority_id,
        //     'impact_id' => $impact_id,
        //     'status_id' => $status_id,
        //     'file' => $row[19],
        //     'store_contact' => $row[20],
        //     'created_by' => $row[21],
        //     // 'created_at' => $row[22],
        //     // 'updated_at' => $row[23],
        //     // 'deleted_at' => $row[24],
        //     'email_status' => $row[25],
        // ]);
        // dd($row);
        foreach ($row as &$value) {
            if ($value === 'NULL') {
                $value = null;
            }
        }
        return new Tickets_new([

            'title' => $row["title"],
            'description' => $row["description"],
            'completed_date' => $completed_date,
            'due_date' => $due_date,
            'company_id' => Auth::user()->company_id,
            'completed_by' => $completed_by_id,
            'business_unit_id' => $bu_id,
            // 'vendor_id' => $row["vendor_id"],
            // 'vendor_type_id' => $row["vendor_type_id"],
            'reported_by' => $reported_by_id,
            'assigned_to' => $assign_to_id,
            'mode_of_complaint' => $row["mode_of_complaint"],
            'sub_type_id' => $type_id,
            'priority_id' => $priority_id,
            'impact_id' => $impact_id,
            'status_id' => $status_id,
            'file' => $row["file"],
            'store_contact' => $row["store_contact"],
            'created_by' => Auth::user()->id,
            'completed'
            // 'created_at' => $row[22],
            // 'updated_at' => $row[23],
            // 'deleted_at' => $row[24],
            // 'email_status' => $row["email_status"],
        ]);
    }
}
