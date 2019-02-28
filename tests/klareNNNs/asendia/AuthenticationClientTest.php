<?php

use GuzzleHttp\Handler\MockHandler;
use klareNNNs\asendia\AuthenticationClient;
use klareNNNs\asendia\Entity\AuthenticationTicket;
use PHPUnit\Framework\TestCase;

class AuthenticationClientTest extends TestCase
{
    const TEST_SOAP_CLIENT = 'https://uat.centiro.com/Universe.Services/TMSBasic/Wcf/c1/i1/TMSBasic/Authenticate.svc?wsdl';
    const TEST_SOAP_WS_CLIENT = 'https://uat.centiro.com/Universe.Services/TMSBasic/Wcf/c1/i1/TMSBasic/Authenticate.svc/xml';
    private $client;
    private $user;
    private $password;


    public function setUp()
    {

        $this->user = "usertest";
        $this->password = "passwordtest";

        $this->client = new AuthenticationClient(
            $this->user,
            $this->password,
            self::TEST_SOAP_CLIENT,
            self::TEST_SOAP_WS_CLIENT
        );

    }

    public function testCanCreateClient()
    {
        $this->assertInstanceOf(AuthenticationClient::class, $this->client);
    }

    public function testCorrectResponseWhenCorrectData()
    {
        $ticket = "ERjXNo89KJe4SN67t0vHSS19BkoAV6AVbI3IE0renJPgAryrOoec5cum7IWDm8TSx%2f9MnIbpMXHin0vv0%2bOPoG%2f%2bmm0P2HHwUeN83mB5KR9ZFuJ1UkP6azV0b0ap8%2bdBU5VyNUVNlWMvSN2geEsPwA%3d%3d";

        $result = new stdClass;
        $result->AuthenticationTicket = $ticket;

        $client = $this->getMockFromWsdl(
            'https://uat.centiro.com/Universe.Services/TMSBasic/Wcf/c1/i1/TMSBasic/Authenticate.svc?wsdl',
            'AuthenticationClient',
            "AuthenticationClientMock",
            ['request']
        );
        $client->expects($this->any())
        ->method('request')
        ->will($this->returnValue(new AuthenticationTicket($result)));

        $this->assertEquals(new AuthenticationTicket($result), $client->request());
    }
}
