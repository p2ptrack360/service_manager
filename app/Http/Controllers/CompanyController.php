<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Mail;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = DB::select('SELECT * FROM company');
        return response()->json($companies);
    }


        public function store(Request $request)
        {



            $data = $request->all();

            if ($request->hasFile('profile')) {
                $profilePath = $request->file('profile')->store('documents','public');
            } else {
                $profilePath = null;
            }
            DB::insert(
                'INSERT INTO company (name, email, telephon, mobile, address_1, address_2, city_id, state_id, country_id, zipcode, status, registration_number, first_name, middle_name, last_name, website, communication, datalines, telebox, domain_id, licences, latitude, longitude, support_email, support_contact, subscription_id,profile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)',
                [$data['name'], $data['email'], $data['telephon'], $data['mobile'], $data['address_1'], $data['address_2'], $data['city_id'], $data['state_id'], $data['country_id'], $data['zipcode'], $data['status'], $data['registration_number'], $data['first_name'], $data['middle_name'], $data['last_name'], $data['website'], $data['communication'], $data['datalines'], $data['telebox'], $data['domain_id'], $data['licences'], $data['latitude'], $data['longitude'], $data['support_email'], $data['support_contact'], $data['subscription_id'],$profilePath]
            );
            $insertedId = DB::getPdo()->lastInsertId();
            DB::insert('INSERT INTO designations (company_id, title, active) VALUES (?, ?, ?)',
            [$insertedId,' Company Admin', 1]);

            $designation_id = DB::getPdo()->lastInsertId();
            $password = Str::random(8);
            $hashedPassword = Hash::make($password);
            DB::insert('INSERT INTO business_units (company_id, marketing_manager, store_manager, bu_user, name, email, phone, alternate_phone, address_1, address_2, latitude, longitude, city, state, country, zipcode, status, properties,customer_r) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)',
            [$insertedId, '0', '0', '0', 'HQ '.$data['name'], $data['email'], $data['mobile'], $data['mobile'], $data['address_1'], $data['address_2'], $data['latitude'], $data['longitude'], $data['city_id'], $data['state_id'], $data['country_id'], $data['zipcode'], $data['status'], '[]',"yes"]);
            $buId = DB::getPdo()->lastInsertId();
            DB::table('bu_group')->insertGetId([
                'title' => 'Manager',
                'bu_id' => $buId,
                'company_id' => $insertedId,
                'created_by' => 1,
            ]);
            $bu_group=DB::getPdo()->lastInsertId();
            DB::table('bu_group')->insertGetId([
                'title' => 'Staff',
                'bu_id' => $buId,
                'company_id' => $insertedId,
                'created_by' => 1,
            ]);
            $fname= $data['first_name'];
            $lname= $data['last_name'];
            $email_var=$data['email'];
            $atSignPosition = strpos($email_var, "@");
            if ($atSignPosition !== false) {
                // Extract the domain part using substr
                $domain = substr($email_var, $atSignPosition + 1);
                $domain_="@".$domain;

            } else {
                echo "Invalid email address";
            }
            $User_name=$fname."_".$lname."_".mt_rand(100, 9999).$domain_;
            $user_name=$fname."_".$lname."_".mt_rand(100, 9999);
            DB::insert('INSERT INTO users (first_name, last_name, company_id, name, email,about,two_factor_secret, designation_id,  password,bu_id) VALUES ( ?, ?, ?,?, ?, ?, ?,?, ?,?)', [
                $data['first_name'],
                $data['last_name'],
                $insertedId,
                $user_name,
                $User_name,
                $data['email'],
                $password,
                $designation_id,
                $hashedPassword,
                $buId,
            ]);
            $user_id = DB::getPdo()->lastInsertId();
            DB::update('UPDATE `business_units` SET `reponsible_user` =? WHERE id=?',[$user_id,$buId]);

            // DB::table('bu_group')->insertGetId([
            //     'title' => $data['name']." Group",
            //     'bu_id' => $buId,
            //     'company_id' => $insertedId,
            //     'created_by' => 1,
            // ]);
            // $groupId = DB::getPdo()->lastInsertId();
            // DB::insert('INSERT INTO bu_group_members (group_id, member_id) VALUES (?, ?)', [$groupId, $user_id]);
            DB::insert('INSERT INTO designations (company_id, title, active) VALUES (?, ?, ?)',
            [$insertedId,' Company CEO', 1]);

            DB::insert('INSERT INTO designations (company_id, title, active) VALUES (?, ?, ?)',
                [$insertedId, 'Company Agent', 1]);
            DB::insert('INSERT INTO impacts (company_id, title, active) VALUES (?, ?, ?)', [$insertedId, 'High', $data['status']]);
            DB::insert('INSERT INTO impacts (company_id, title, active) VALUES (?, ?, ?)', [$insertedId, 'Medium', $data['status']]);
            DB::insert('INSERT INTO impacts (company_id, title, active) VALUES (?, ?, ?)', [$insertedId, 'Low', $data['status']]);
            DB::insert('INSERT INTO status (company_id, title, active) VALUES (?, ?, ?)', [
                $insertedId,
                'Open',
                $data['status'],
            ]);
            DB::insert('INSERT INTO status (company_id, title, active) VALUES (?, ?, ?)', [
                $insertedId,
                'Closed',
                $data['status'],
            ]);
            DB::insert('INSERT INTO status (company_id, title, active) VALUES (?, ?, ?)', [
                $insertedId,
                'Pending',
                $data['status'],
            ]);
            DB::insert('INSERT INTO types (company_id, title, parent_id, active) VALUES (?, ?, ?, ?)', [
                $insertedId,
                'Basic Type',
                '0',
                $data['status']
            ]);
            DB::insert('INSERT INTO priority (company_id, title, active, sla) VALUES (?, ?, ?, ?)', [$insertedId, 'High', $data['status'], '1']);
            DB::insert('INSERT INTO priority (company_id, title, active, sla) VALUES (?, ?, ?, ?)', [$insertedId, 'Medium', $data['status'], '1']);
            DB::insert('INSERT INTO priority (company_id, title, active, sla) VALUES (?, ?, ?, ?)', [$insertedId, 'Low', $data['status'], '1']);

            DB::insert('INSERT INTO group_designation (bu_id, group_id, designation_id) VALUES (?, ?, ?)', [$buId, $bu_group,$designation_id]);

                // $mailContent = 'check';

                $email=$data['email'];
                $data=[ 'email' => $User_name,
                'password'=>$password,
                ];
                $mailContent = view('mail3', $data)->render();

                Mail::send([], [], function ($message) use ( $mailContent,$email) {
                    $message->to($email, 'User Login Credentials')
                        ->subject('User Login Credentials')
                        ->setBody($mailContent, 'text/html');

                });

                // Provide a meaningful response or redirect as needed.
                // return response("Success", 200);




            return response()->json(['message' => 'Company created successfully']);
        }

    public function show($id)
    {
        $company = DB::select('SELECT * FROM company WHERE id = ?', [$id]);
        return response()->json($company);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        DB::update('UPDATE company SET name = ?, email = ?, telephon = ?, mobile = ?, address_1 = ?, address_2 = ?, city_id = ?, state_id = ?, country_id = ?, zipcode = 321, status = 1, registration_number = ?, first_name = ?, middle_name = ?, last_name = ?, website = ?, communication = "COM", datalines = "datalines", telebox = "telebox", domain_id = ?, licences = ?, latitude = ?, longitude = ?, support_email = ?, support_contact = ?, subscription_id = ? WHERE id = ?', [$data['name'], $data['email'], $data['telephon'], $data['mobile'], $data['address_1'], $data['address_2'], $data['city_id'], $data['state_id'], $data['country_id'],  $data['registration_number'], $data['first_name'], $data['middle_name'], $data['last_name'], $data['website'], $data['domain_id'], $data['licences'], $data['latitude'], $data['longitude'], $data['support_email'], $data['support_contact'], $data['subscription_id'], $id]);

        return response()->json(['message' => 'Company updated successfully']);
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM company WHERE id = ?', [$id]);
        return response()->json(['message' => 'Company deleted successfully']);
    }
}
