<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Hash;
use Google_Client;
use Google_Service_Sheets;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'role_name' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        // Create the new user in the database
        $user = User::create([
            'name'      => $request->name,
            'avatar'    => $request->image,
            'email'     => $request->email,
            'role_name' => $request->role_name,
            'password'  => Hash::make($request->password),
        ]);

        // Add the user data to Google Sheets
        $this->addUserToGoogleSheet($user);

        Toastr::success('Create new account successfully :)', 'Success');
        return redirect('login');
    }

    private function addUserToGoogleSheet($user)
    {
        $client = new Google_Client();
        $client->setAuthConfig(config('google.credentials_json'));
        $client->addScope(Google_Service_Sheets::SPREADSHEETS);
        $service = new Google_Service_Sheets($client);

        $spreadsheetId = config('google.spreadsheet_id');
        $range = config('google.range');
        $values = [
            [
                $user->name,
                $user->email,
                $user->role_name,
                $user->created_at->toDateString(), 
            ]
        ];

        $body = new \Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);
        $params = [
            'valueInputOption' => 'RAW',
        ];

        try {
            $service->spreadsheets_values->append(
                $spreadsheetId,
                $range,
                $body,
                $params
            );
        } catch (\Exception $e) {
            \Log::error("Error adding user to Google Sheets: " . $e->getMessage());
        }
    }
}
