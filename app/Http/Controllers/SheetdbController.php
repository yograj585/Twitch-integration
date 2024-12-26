<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SheetDB\SheetDB;
use App\Models\User;

class SheetdbController extends Controller
{
    public function get()
    {
        $sheetdb = new SheetDB('h041u2dc01xti');
        $data = $sheetdb->get();
        foreach ($data as $row) {
            User::create([
                'name' => $row->name,
                'email' => $row->email,
                'password' => bcrypt($row->password),
            ]);
        }

        return response()->json([
            'message' => 'Data inserted successfully',
        ]);
    }
}
