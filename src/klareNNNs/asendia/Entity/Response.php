<?php

declare(strict_types=1);

namespace klareNNNs\asendia\Entity;

final class Response
{
    private $trackingCode;
    private $ticket;
    private $success;

    public function __construct(string $trackingCode, string $ticket, bool $success)
    {
        $this->trackingCode = $trackingCode;
        $this->ticket = $ticket;
        $this->success = $success;
    }

    public function getTrackingCode(): string
    {
        return $this->trackingCode;
    }

    public function getTicket(): string
    {
        return $this->ticket;
    }

    public function getSuccess(): bool
    {
        return $this->success;
    }



}