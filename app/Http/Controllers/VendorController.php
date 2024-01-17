<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = DB::select('SELECT s.*,IFNULL(c.name,"System") as company FROM `vendors` s left join company c on s.company_id = c.id;');
        return response()->json($vendors);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        DB::insert('INSERT INTO vendors (company_id, vendor_type_id, name, email, phone, alternate_phone, address_1, address_2, latitude, longitude, city, state, country, zipcode, status,bu_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)',
            [$data['company_id'], $data['vendor_type_id'], $data['name'], $data['email'], $data['phone'], $data['alternate_phone'], $data['address_1'], $data['address_2'], $data['latitude'], $data['longitude'], $data['city'], $data['state'], $data['country'], $data['zipcode'], $data['status'], $data['bu_id']]);

        return response()->json(['message' => 'Vendor created successfully']);
    }

    public function show($id)
    {
        $vendor = DB::select('SELECT * FROM vendors WHERE id = ?', [$id]);
        return response()->json($vendor);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        DB::update('UPDATE vendors SET company_id = ?, vendor_type_id = ?, name = ?, email = ?, phone = ?, alternate_phone = ?, address_1 = ?, address_2 = ?, latitude = ?, longitude = ?, city = ?, state = ?, country = ?, zipcode = ?, status = ?, bu_id = ? WHERE id = ?',
            [$data['company_id'], $data['vendor_type_id'], $data['name'], $data['email'], $data['phone'], $data['alternate_phone'], $data['address_1'], $data['address_2'], $data['latitude'], $data['longitude'], $data['city'], $data['state'], $data['country'], $data['zipcode'], $data['status'], $data['bu_id'], $id]);

        return response()->json(['message' => 'Vendor updated successfully']);
    }

    public function companywise($id)
    {
        $vendor = DB::select('SELECT s.*,IFNULL(c.name,"System") as company FROM `vendors` s left join company c on s.company_id = c.id WHERE company_id = ?', [$id]);
        return response()->json($vendor);
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM vendors WHERE id = ?', [$id]);
        return response()->json(['message' => 'Vendor deleted successfully']);
    }
}
