<?php

declare(strict_types=1);

namespace klareNNNs\asendia\Entity;

final class Attributes
{

    private $originSub = 'ES';
    private $CRMID;
    private $product;
    private $service;
    private $additionalService;
    private $format;

    /**
     * Attributes constructor.
     * @param string $originSub
     * @param $CRMID
     * @param $product
     * @param $service
     * @param $additionalService
     * @param $format
     */
    public function __construct(string $originSub, $CRMID, $product, $service, $additionalService, $format)
    {
        $this->originSub = $originSub;
        $this->CRMID = $CRMID;
        $this->product = $product;
        $this->service = $service;
        $this->additionalService = $additionalService;
        $this->format = $format;
    }

    public function getOriginSub(): string
    {
        return $this->originSub;
    }

    public function getCRMID()
    {
        return $this->CRMID;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getService()
    {
        return $this->service;
    }

    public function getAdditionalService()
    {
        return $this->additionalService;
    }

    public function getFormat()
    {
        return $this->format;
    }




}