<?php

declare(strict_types=1);

namespace klareNNNs\asendia\Entity;

final class Request
{
    const LABEL_TYPE = 'PDF';

    private $address;
    private $authenticationTicket;
    private $attributes;
    private $currency = 'EUR';
    private $modeOfTransport = 'ACSS';
    private $orderNumber;
    private $parcels;
    private $senderCode;
    private $shipDate;
    private $shipmentIdentifier;
    private $shipmentType = 'OUTB';
    private $weight = 1;

    public function __construct(Address $address,
                                AuthenticationTicket $authenticationTicket,
                                Attributes $attributes,
                                string $currency,
                                string $modeOfTransport,
                                $orderNumber,
                                Parcel $parcels,
                                $senderCode,
                                $shipDate,
                                $shipmentIdentifier,
                                string $shipmentType = 'OUTB',
                                float $weight = 1)
    {
        $this->address = $address;
        $this->authenticationTicket = $authenticationTicket;
        $this->attributes = $attributes;
        $this->currency = $currency;
        $this->modeOfTransport = $modeOfTransport;
        $this->orderNumber = $orderNumber;
        $this->parcels = $parcels;
        $this->senderCode = $senderCode;
        $this->shipDate = $shipDate;
        $this->shipmentIdentifier = $shipmentIdentifier;
        $this->shipmentType = $shipmentType;
        $this->weight = $weight;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getAuthenticationTicket(): AuthenticationTicket
    {
        return $this->authenticationTicket;
    }

    public function getAttributes(): Attributes
    {
        return $this->attributes;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getModeOfTransport(): string
    {
        return $this->modeOfTransport;
    }

    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    public function getParcels(): Parcel
    {
        return $this->parcels;
    }

    public function getSenderCode()
    {
        return $this->senderCode;
    }

    public function getShipDate()
    {
        return $this->shipDate;
    }

    public function getShipmentIdentifier()
    {
        return $this->shipmentIdentifier;
    }

    public function getShipmentType(): string
    {
        return $this->shipmentType;
    }

    public function getWeight()
    {
        return $this->weight;
    }

}
