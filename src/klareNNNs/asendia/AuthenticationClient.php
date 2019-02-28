<?php

declare(strict_types=1);

namespace klareNNNs\asendia;

use klareNNNs\asendia\Entity\AuthenticationTicket;
use SoapClient;

class AuthenticationClient
{
    const METHOD = 'Authenticate';
    private $user;
    private $password;
    private $client;

    public function __construct(string $user, string $password, string $wsdl, string $ws)
    {
        $this->user = $user;
        $this->password = $password;

        $this->client = new SoapClient($wsdl, array(
            'location' => $ws,
            'uri' => $ws,
            'trace' => 1
        ));
    }


    public function request()
    {
        $request = [
            "AuthenticateRequest" => [
                "Password" => $this->password,
                "UserName" => $this->user
            ]
        ];
        $result = $this->client->__soapCall(self::METHOD, $request);

        $response = new AuthenticationTicket($result);
        return $response;
    }


}