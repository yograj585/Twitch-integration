<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TwitchController extends Controller
{
    public function redirectToTwitch()
    {
        $query = http_build_query([
            'client_id' => env('TWITCH_CLIENT_ID'),
            'redirect_uri' => env('TWITCH_REDIRECT_URI'),
            'response_type' => 'code',
            'scope' => 'user:read:email',
            
        ]);

        return redirect('https://id.twitch.tv/oauth2/authorize?' . $query);
    }

    public function handleTwitchCallback(Request $request)
    {
        $response = Http::asForm()->post('https://id.twitch.tv/oauth2/token', [
            'client_id' => env('TWITCH_CLIENT_ID'),
            'client_secret' => env('TWITCH_CLIENT_SECRET'),
            'code' => $request->input('code'),
            'grant_type' => 'authorization_code',
            'redirect_uri' => env('TWITCH_REDIRECT_URI'),
        ]);

        $data = $response->json();

        // Use the access token to get user details
        $userResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $data['access_token'],
            'Client-Id' => env('TWITCH_CLIENT_ID'),
        ])->get('https://api.twitch.tv/helix/users');

        $user = $userResponse->json();

        // Handle the user data (e.g., store in the database)
        return $user;
    }
}
