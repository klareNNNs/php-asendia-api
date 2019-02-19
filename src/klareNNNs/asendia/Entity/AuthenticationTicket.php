<?php

declare(strict_types=1);

namespace klareNNNs\asendia\Entity;

final class AuthenticationTicket
{

    private $authenticationTicket;

    public function __construct($result)
    {
        $this->authenticationTicket = $result->AuthenticationTicket;
    }

    public function authenticationTicket()
    {
        return $this->authenticationTicket;
    }


}