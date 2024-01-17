<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function super_admin_users(){
        $users = DB::select('SELECT u.*, IFNULL(c.name, "System") AS company, d.title
        FROM users u
        LEFT JOIN company c ON u.company_id = c.id
        LEFT JOIN designations d ON u.designation_id = d.id');
        return response()->json($users);

    }
    public function forgot_password_get($email)
    {
        $users = DB::select('SELECT * FROM `users` WHERE email = ?',[$email]);
        return response()->json($users);
    }
    public function reset_password(Request $request){
        $data = $request->all();
        $hashedPassword = Hash::make($data['password']);
        DB::update('update users set two_factor_secret=? , password=? WHERE email=?',[$hashedPassword,$data['password'],$data['email']]);
    }
    public function index2()
    {
        $users = DB::select('SELECT s.*,IFNULL(c.name,"System") as company FROM `users` s left join company c on s.company_id = c.id');
        return response()->json($users);
    }

    public function profile_update(Request $request){
        $data = $request->all();
        $hashedPassword = Hash::make($data['password']);

        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('documents','public');
        } else {
            $profilePath = null;
        }
        DB::update('UPDATE `users` SET `first_name`=?,`last_name`=?,`photo_url`= ?,name=?,password=?,two_factor_secret=? WHERE id=?',[$data['firstname'],$data['lastname'], $profilePath,$data['username'], $hashedPassword,$data['password'],$data['id']]);

        return response()->json(['message' => 'Profile Updated Successfully']);

    }

    public function store(Request $request)
    {
        $data = $request->all();
        $hashedPassword = Hash::make($data['password']);
        $fname= $data['first_name'];
            $lname= $data['last_name'];
            $email_var=$data['about'];
            $atSignPosition = strpos($email_var, "@");
            if ($atSignPosition !== false) {
                // Extract the domain part using substr
                $domain = substr($email_var, $atSignPosition + 1);
                $domain_="@".$domain;

            } else {
                echo "Invalid email address";
            }
            $User_name=$data['username'].$domain_;
          
        // You need to adjust the field names according to your table structure
        DB::insert('INSERT INTO users (first_name, last_name, company_id, name,email, about,two_factor_secret, designation_id,bu_id,  password) VALUES ( ?,?, ?,?, ?, ?, ?, ?,?,?)', [
            $data['first_name'],
            $data['last_name'],
            $data['company_id'],
            $data['username'],
            $User_name,
            $data['about'],
            $data['password'],
            $data['designation_id'],
            $data['bu_id'],
            $hashedPassword,
        ]);
        $email=$data['about'];
        $password=$data['password'];
        $data=[ 'email' => $User_name,
        'password'=>$password];
        $mailContent = view('mail3', $data)->render();

        Mail::send([], [], function ($message) use ( $mailContent,$email) {
            $message->to($email, 'User Login Credentials')
                ->subject('User Login Credentials')
                ->setBody($mailContent, 'text/html');

        });
        return response()->json(['message' => 'User created successfully']);
    }
    public function verify_username_up($id,$name){
        $user = DB::select('SELECT * FROM `users` WHERE not id=? and name=?', [$id,$name]);
        return response()->json($user);
    }
        public function verify_username($name){
            $user = DB::select('SELECT * FROM users WHERE name = ?', [$name]);
            return response()->json($user);
        }
    public function show($id)
    {
        $user = DB::select('SELECT * FROM users WHERE id = ?', [$id]);
        return response()->json($user);
    }
    public function groupdesignationuser($bu_id, $des_id)
    {

        $groupdesignationuser = DB::select('SELECT * FROM `group_designation` gd WHERE `bu_id`=? and designation_id = ? limit 1', [$bu_id, $des_id]);
        return response()->json($groupdesignationuser);
    }
    public function bugroupname($id){

    $bugroupname = DB::select('SELECT title FROM `bu_group` WHERE id=?', [$id]);
     return response()->json($bugroupname);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $hashedPassword = Hash::make($data['password']);

        DB::update('UPDATE users SET first_name = ?, last_name = ?, company_id = ?, name = ?, about = ?,two_factor_secret=? , designation_id = ?,bu_id=?,  password = ? WHERE id = ?', [
            $data['first_name'],
            $data['last_name'],
            $data['company_id'],
            $data['username'],
            $data['about'],
            $data['password'],
            $data['designation_id'],
            $data['bu_id'],
            $hashedPassword,
            $id
        ]);
        return response()->json(['message' => 'User updated successfully']);
    }

    public function companywise($id)
    {
        $status = DB::select('SELECT u.*, IFNULL(c.name, "System") AS company, d.title
        FROM users u
        LEFT JOIN company c ON u.company_id = c.id
        LEFT JOIN designations d ON u.designation_id = d.id
        WHERE u.company_id = ?', [$id]);
        return response()->json($status);
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM users WHERE id = ?', [$id]);
        return response()->json(['message' => 'User deleted successfully']);
    }

    public function getProfilePicture($filename)
    {
        $path = public_path('storage/documents/' . $filename);


        return response()->file($path);
    }

    public function store_customer(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('documents','public');
        } else {
            $profilePath = null;
        }

        // You need to adjust the field names according to your table structure
        DB::insert('INSERT INTO `customers`(`first_name`, `last_name`, `email`, `phone_no`, `profile_img`, `address`, `city`, `state`, `country`,company_id,bu_id)VALUES ( ?,?, ?,?, ?, ?, ?, ?,?,?,?)', [
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['phone_no'],
            $profilePath,
            $data['address'],
            $data['city'],
            $data['state'],
            $data['country'],
            $data['company_id'],
            $data['bu_id']


        ]);

    }

    public function customer_update(Request $request, $id)
    {
        $data = $request->all();

        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('documents','public');
            DB::update('UPDATE `customers` SET `first_name`=?,`last_name`=?,`email`=?,`phone_no`=?,`profile_img`=?,`address`=?,`city`=?,`state`=?,`country`=?,company_id=?,bu_id=?  WHERE id = ?', [
                $data['first_name'],
                $data['last_name'],
                $data['email'],
                $data['phone_no'],
                $profilePath,
                $data['address'],
                $data['city'],
                $data['state'],
                $data['country'],
                $data['company_id'],
                $data['bu_id'],
                $id
            ]);
        } else {
            // $profilePath = null;
            DB::update('UPDATE `customers` SET `first_name`=?,`last_name`=?,`email`=?,`phone_no`=?,`address`=?,`city`=?,`state`=?,`country`=?,company_id=?,bu_id=?  WHERE id = ?', [
                $data['first_name'],
                $data['last_name'],
                $data['email'],
                $data['phone_no'],
                $data['address'],
                $data['city'],
                $data['state'],
                $data['country'],
                $data['company_id'],
                $data['bu_id'],
                $id
            ]);
        }

        return response()->json(['message' => 'Customer updated successfully']);
    }
    public function customer_show()
    {
        $user = DB::select('SELECT * FROM customers WHERE company_id = ? and bu_id=?', [Auth::user()->company_id,Auth::user()->bu_id]);
        return response()->json($user);
    }
    public function super_admin_customer()
    {
        $user = DB::select('SELECT * FROM customers');
        return response()->json($user);
    }

    public function show_customer_by_id($id)
    {
        $user = DB::select('SELECT * FROM customers WHERE company_id = ?', [$id]);
        return response()->json($user);
    }

    public function show_customer_by_bu_id($id)
    {
        $user = DB::select('SELECT * FROM customers WHERE bu_id = ?', [$id]);
        return response()->json($user);
    }
}

