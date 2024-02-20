<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class UltraMsgController extends Controller
{
    public function sendMessage(Request $request)
    {
        $client = new Client();

        $params = [
            'token' => 't4p7lekmonaaku6u',
            'to' => $request->phone, // Définir le destinataire
            'body' => 'WhatsApp API on UltraMsg.com works good'
        ];

        try {
            $response = $client->request('POST', 'https://api.ultramsg.com/instance73638/messages/chat', [
                'form_params' => $params,
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'verify' => false,
            ]);

            if ($response->getStatusCode() == 200) {
                return $response->getBody();
            } else {
                return response('Unexpected HTTP status: ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase(), $response->getStatusCode());
            }
        } catch (GuzzleException $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}
