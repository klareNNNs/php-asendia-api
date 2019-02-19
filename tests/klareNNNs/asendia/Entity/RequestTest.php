<?php

declare(strict_types=1);

namespace klareNNNs\asendia\Entity;


use PHPUnit\Framework\TestCase;
use stdClass;

class RequestTest extends TestCase
{

    public function testItShouldCreateCorrectRequest()
    {
        $address1 = 'C/NUEVA,2';
        $addressType = 'Receiver';
        $cellPhone = '+44666666666';
        $city = 'London';
        $zipCode = '28010';
        $ISOCountry = 'GB';
        $contact = '';
        $email = 'test@test.com';
        $name = 'John Doe';

        $address = new Address($address1, $addressType, $cellPhone, $city, $contact, $email, $ISOCountry, $name, $zipCode);

        $ticket = "ERjXNo89KJe4SN67t0vHSS19BkoAV6AVbI3IE0renJPgAryrOoec5cum7IWDm8TSx%2f9MnIbpMXHin0vv0%2bOPoG%2f%2bmm0P2HHwUeN83mB5KR9ZFuJ1UkP6azV0b0ap8%2bdBU5VyNUVNlWMvSN2geEsPwA%3d%3d";

        $result = new stdClass;
        $result->AuthenticationTicket = $ticket;

        $authenticationTicket = new AuthenticationTicket($result);

        $originSub = 'ES';
        $CRMID = 'ES17320007';
        $product = 'FTG';
        $service = 'PR';
        $additionalService = '';
        $format = 'P';

        $attributes = new Attributes($originSub, $CRMID, $product, $service, $additionalService, $format);

        $currency = 'EUR';
        $modeOfTransport = 'MASTERSHP';
        $orderNumber = 1;

        $countryOfOrigin = 'ES';
        $description1 = 'tshirt';
        $harmonizationCode = 610910000080;

        $orderLine = new OrderLine($countryOfOrigin, $description1, $harmonizationCode);
        $orderLines[] = $orderLine;
        $orderLines[] = $orderLine;
        $orderLines[] = $orderLine;
        $parcelIdentifier = 1;
        $weight = 1;
        $parcels = new Parcel($orderLines, $parcelIdentifier, $weight);

        $senderCode = 'ES00001';
        $shipDate = date('yyyy-MM-ddThh:mm:ss');
        $shipmentIdentifier = 1;
        $request = new Request($address,
                                $authenticationTicket,
                                $attributes,
                                $currency,
                                $modeOfTransport,
                                $orderNumber,
                                $parcels,
                                $senderCode,
                                $shipDate,
                                $shipmentIdentifier);

        $this->assertEquals($address, $request->getAddress());
        $this->assertEquals($authenticationTicket, $request->getAuthenticationTicket());
        $this->assertEquals($attributes, $request->getAttributes());
        $this->assertEquals($currency, $request->getCurrency());
        $this->assertEquals($modeOfTransport, $request->getModeOfTransport());
        $this->assertEquals($orderNumber, $request->getOrderNumber());
        $this->assertEquals($parcels, $request->getParcels());
        $this->assertEquals($senderCode, $request->getSenderCode());
        $this->assertEquals($shipDate, $request->getShipDate());
        $this->assertEquals($shipmentIdentifier, $request->getShipmentIdentifier());
    }
}
