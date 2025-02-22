<?php
namespace App\Services;

use Google\Client;
use Google\Service\Gmail;

class GmailService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setApplicationName('Laravel Web 2');
        $this->client->setScopes(Gmail::MAIL_GOOGLE_COM);
        $this->client->setAuthConfig(storage_path('app/credentials.json'));
        $this->client->setAccessType('offline');
    }

    public function authenticate()
    {
        return $this->client->createAuthUrl();
    }

    public function fetchAccessTokenWithAuthCode($code)
    {
        $accessToken = $this->client->fetchAccessTokenWithAuthCode($code);
        if (isset($accessToken['error'])) {
            throw new \Exception('Error fetching access token: ' . $accessToken['error']);
        }
        file_put_contents(storage_path('app/token.json'), json_encode($accessToken));
    }

    
    public function sendEmail($to, $subject, $body)
    {
        $tokenPath = storage_path('app/token.json');
        if (!file_exists($tokenPath) || !$accessToken = json_decode(file_get_contents($tokenPath), true)) {
            throw new \Exception('Invalid or missing token.json. Please authenticate first.');
        }

        $accessToken = json_decode(file_get_contents($tokenPath), true);
        if (!$accessToken) {
            throw new \Exception('Invalid token file. Please authenticate again.');
        }

        $this->client->setAccessToken($accessToken);

         //Refresh token jika kedaluwarsa
        if ($this->client->isAccessTokenExpired()) {
            $refreshToken = $this->client->getRefreshToken();
            if (!$refreshToken) {
                throw new \Exception('Refresh token is missing. Please reauthenticate.');
            }
            $newAccessToken = $this->client->fetchAccessTokenWithRefreshToken($refreshToken);
            file_put_contents($tokenPath, json_encode(array_merge($accessToken, $newAccessToken)));
        }

        $gmail = new Gmail($this->client);

        $rawMessage = "To: $to\r\n";
        $rawMessage .= "Subject: $subject\r\n";
        $rawMessage .= "MIME-Version: 1.0\r\n";
        $rawMessage .= "Content-Type: text/html; charset=UTF-8\r\n";
        $rawMessage .= "\r\n$body";

        $mimeMessage = base64_encode($rawMessage);
        $mimeMessage = str_replace(['+', '/', '='], ['-', '_', ''], $mimeMessage);

        $message = new \Google\Service\Gmail\Message();
        $message->setRaw($mimeMessage);

        try {
            $gmail->users_messages->send('me', $message);
        } catch (\Exception $e) {
            throw new \Exception('Error sending email: ' . $e->getMessage());
        }
    }
}
