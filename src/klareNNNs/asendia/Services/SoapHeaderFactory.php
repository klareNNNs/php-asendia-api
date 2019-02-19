<?php

namespace klareNNNs\asendia\Services;

use klareNNNs\asendia\Entity\AuthenticationTicket;
use SoapHeader;

class SoapHeaderFactory
{
    public static function create(AuthenticationTicket $authenticationTicket)
    {
        $auth = [
            'AuthenticationTicket' => $authenticationTicket->authenticationTicket(),
        ];
        $soapHeader = new SoapHeader('http://centiro.com/facade/shared/1/0/datacontract', 'AuthenticationTicket', $auth);

        return $soapHeader;
    }
}
