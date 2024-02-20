<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Models\locataire as locataires;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $locataire = locataires::select("*")
                     ->where('locataires.date_fin','<',now())
                     ->get();
        //foreach($locataire as $loc) {}


        $client = new Client();

        $params = [
            'token' => 't4p7lekmonaaku6u',
            'to' => '+594694245210', // Définir le destinataire
            'body' => 'Bonjour cher locataire. Nous avons le plaisir de vous rappeler que votre échéance pour le règlement des factures est atteint. Merci de faire diligence.'
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
                return $response->getBody()->getContents();
            } else {
                return response('Unexpected HTTP status: ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase(), $response->getStatusCode());
            }
        } catch (GuzzleException $e) {
                return response('Error: ' . $e->getMessage(), 500);
            }
        

        $this->info('Reminders sent successfully!');
                
    }
}
