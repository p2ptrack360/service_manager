<?php

namespace App\Imports;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

use App\Models\newuser;

class UserImport implements ToModel,WithHeadingRow
{

    public function model(array $row)
     {
        // dd($row);
        $designation_id="";
        $bu=DB::select('SELECT * FROM `business_units` WHERE company_id= '.Auth::user()->company_id.' AND name="'.$row["bu_id"].'"');


        $designation=DB::select('SELECT * FROM `designations` WHERE company_id ='.Auth::user()->company_id.' and title ="'.$row["designation_id"].'"');
        if (count($designation) == 0) {
            DB::insert('INSERT INTO `designations`(company_id, title, active) VALUES (?,?,?)', [Auth::user()->company_id, $row["designation_id"], 1]);
            $designation_id = DB::getPdo()->lastInsertId();
        } else {
            $designation_id = $designation[0]->id;
        }
        $password = Str::random(8);
        $hashedPassword = Hash::make($password);

        $fname=$row["first_name"];
        $lname=$row["last_name"];
        $email_var=$row["email"];
        $atSignPosition = strpos($email_var, "@");
        if ($atSignPosition !== false) {
            // Extract the domain part using substr
            $domain = substr($email_var, $atSignPosition + 1);
            $domain_="@".$domain;

        } else {
            echo "Invalid email address";
        }
        $User_name=$fname."_".$lname."_".mt_rand(100, 9999).$domain_;


        $data=[ 'email' => $User_name,
        'password'=>$password,
        ];
        $mailContent = view('mail3', $data)->render();

        Mail::send([], [], function ($message) use ( $mailContent, $email_var) {
            $message->to( $email_var, 'User Login Credentials')
                ->subject('User Login Credentials')
                ->setBody($mailContent, 'text/html');

        });


        foreach ($row as &$value) {
            if ($value === 'NULL') {
                $value = null;
            }
        }
        return new newuser([
            'first_name' => $row["first_name"],
            'last_name' => $row["last_name"],
            'company_id' => Auth::user()->company_id,
            'bu_id' => (count($bu)==0 ? 0 :$bu[0]->id),
            'designation_id' => $designation_id,
            'name' => $row["name"],
            'email' => $User_name,
            'password' =>$hashedPassword,
            'two_factor_secret'=>$password,
            'about' => $row["email"],
            'photo_url' => $row["photo_url"]

        ]);
    }
}
