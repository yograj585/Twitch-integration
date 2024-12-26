<?php
namespace App\Services;

use Google\Client;
use Google\Service\Sheets;

class GoogleSheetsService
{
    public function getClient()
    {
        $client = new Client();
        $client->setApplicationName('Laravel Google Sheets Integration');
        $client->setScopes(Sheets::SPREADSHEETS);
        $client->setAuthConfig(storage_path('app/credentials.json')); // Ensure this is the correct path
        $client->setAccessType('offline');
        return $client;
    }

    public function updateSheet($spreadsheetId, $data)
    {
        $client = $this->getClient();
        $service = new Sheets($client);

        // Define the range where you want to insert data in Google Sheets
        $range = 'Sheet1!A1'; // Adjust as needed

        $values = [];
        foreach ($data as $user) {
            $values[] = [
                $user['name'],
                $user['email'],
                $user['phone_number'],
                $user['role_name']
            ];
        }

        $body = new \Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        // Update the Google Sheet with the data
        $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
    }
}
