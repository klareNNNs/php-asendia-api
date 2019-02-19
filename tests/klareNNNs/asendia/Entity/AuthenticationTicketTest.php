<?php

declare(strict_types=1);


use klareNNNs\asendia\Entity\AuthenticationTicket;
use PHPUnit\Framework\TestCase;

class AuthenticationTicketTest extends TestCase
{
    public function testCreateCorrectAuthenticationTicketEntity()
    {
        $ticket = "ERjXNo89KJe4SN67t0vHSS19BkoAV6AVbI3IE0renJPgAryrOoec5cum7IWDm8TSx%2f9MnIbpMXHin0vv0%2bOPoG%2f%2bmm0P2HHwUeN83mB5KR9ZFuJ1UkP6azV0b0ap8%2bdBU5VyNUVNlWMvSN2geEsPwA%3d%3d";

        $result = new stdClass;
        $result->AuthenticationTicket = $ticket;

        $authenticationTicket = new AuthenticationTicket($result);

        $this->assertInstanceOf(AuthenticationTicket::class, $authenticationTicket);
        $this->assertEquals($ticket, $authenticationTicket->authenticationTicket());
    }

}
