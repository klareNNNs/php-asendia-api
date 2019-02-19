<?php

declare(strict_types=1);

namespace klareNNNs\asendia;


use DateTime;
use klareNNNs\asendia\Entity\Address;
use klareNNNs\asendia\Entity\Attributes;
use klareNNNs\asendia\Entity\AuthenticationTicket;
use klareNNNs\asendia\Entity\OrderLine;
use klareNNNs\asendia\Entity\Parcel;
use klareNNNs\asendia\Entity\Request;
use PHPUnit\Framework\TestCase;
use stdClass;

class ClientTest extends TestCase
{
    const WSDL_LOCATION = 'https://uat.centiro.com/Universe.Services/TMSBasic/Wcf/c1/i1/TMSBasic/TMSBasic.svc?wsdl';
    const WS_LOCATION = 'https://uat.centiro.com/Universe.Services/TMSBasic/Wcf/c1/i1/TMSBasic/TMSBasic.svc/xml';
    /**
     * @var Client
     */
    private $client;
    private $user;
    private $password;
    private $authenticationTicket;
    private $authClient;

    public function setUp()
    {
        $ticket = "ERjXNo89KJe4SN67t0vHSS19BkoAV6AVbI3IE0renJPgAryrOoec5cum7IWDm8TSx%2f9MnIbpMXHin0vv0%2bOPoG%2f%2bmm0P2HHwUeN83mB5KR9ZFuJ1UkP6azV0b0ap8%2bdBU5VyNUVNlWMvSN2geEsPwA%3d%3d";

        $result = new stdClass;
        $result->AuthenticationTicket = $ticket;

        $this->authenticationTicket = new AuthenticationTicket($result);

        $this->user = "usertest"; /* USER AND PASSWORD GIVEN TO YOU BY ASENDIA*/
        $this->password = "passwordtest";

        $this->authClient = new AuthenticationClient($this->user, $this->password, 'https://uat.centiro.com/Universe.Services/TMSBasic/Wcf/c1/i1/TMSBasic/Authenticate.svc?wsdl');

    }

    public function testCanCreateClient()
    {

        $this->client = new Client(self::WSDL_LOCATION, self::WS_LOCATION, $this->authenticationTicket);
        $this->assertInstanceOf(Client::class, $this->client);
    }

    public function testCorrectResponseWhenCorrectData()
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

        $originSub = 'ES';
        $CRMID = 'ES14030004'; /* Your unique identifier within Asendia system called CRM ID. */
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

        $datetime = new DateTime('now');
        $shipDate = $datetime->format('c');
        $shipmentIdentifier = 1;
        $request = new Request($address,
            $this->authenticationTicket,
            $attributes,
            $currency,
            $modeOfTransport,
            $orderNumber,
            $parcels,
            $CRMID,
            $shipDate,
            $shipmentIdentifier);

        $responseAuth = $this->authClient->request();
        $this->client = new Client(self::WSDL_LOCATION, self::WS_LOCATION, $responseAuth);
        $response = $this->client->AddAndPrintShipmentRequest($request);

        $this->assertEquals(true, $response->getSuccess());
    }

}
