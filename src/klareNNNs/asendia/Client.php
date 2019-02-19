<?php

declare(strict_types=1);

namespace klareNNNs\asendia;

use Exception;
use klareNNNs\asendia\Entity\AuthenticationTicket;
use klareNNNs\asendia\Entity\Request;
use klareNNNs\asendia\Entity\Response;
use klareNNNs\asendia\Services\SoapRequestFactory;
use klareNNNs\asendia\Services\SoapResponseFactory;
use SoapClient;
use SoapHeader;

class Client
{

    const TRANSACTION_METHOD = 'AddAndPrintShipment';
    const TICKET_AUTH = 'AuthenticationTicket';
    private $wsdl;
    private $authenticationTicket;
    private $wsLocation;

    public function __construct(string $wsdl, string $wsLocation, AuthenticationTicket $authenticationTicket)
    {
        $this->wsdl = $wsdl;
        $this->wsLocation = $wsLocation;
        $this->authenticationTicket = $authenticationTicket;
    }

    public function AddAndPrintShipmentRequest(Request $request) : Response
    {
        //create soap client
        try {
            $SoapClient = new SoapClient($this->wsdl, array(
                'location' => $this->wsLocation,
                'uri' => $this->wsLocation,
                'trace' => 1
            ));
        } catch(Exception $ex) {
            echo "SOAP Exception\r\n";
            dump($ex);
        }
        //Header
        $header = new SoapHeader('http://centiro.com/facade/shared/1/0/datacontract',self::TICKET_AUTH, $this->authenticationTicket->authenticationTicket(), false);

        $AddAndPrintShipmentRequest = SoapRequestFactory::create($request);
        try {
            $AddAndPrintShipmentResp = $SoapClient->__soapCall(self::TRANSACTION_METHOD, array($AddAndPrintShipmentRequest), NULL, $header, $output_headers);

        }
        catch (Exception $ex)
        {
            echo "SOAP Exception AddAndPrintShipment \r\n";
            dump($ex->getMessage());

        }

        try{

            return SoapResponseFactory::create($AddAndPrintShipmentResp, $output_headers);
        }
        catch (Exception $ex)
        {
            echo "RETURN EXCEPTION \r\n";
            dump($ex->getMessage());

        }

    }
}