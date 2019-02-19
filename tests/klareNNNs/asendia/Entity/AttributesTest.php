<?php

declare(strict_types=1);


use klareNNNs\asendia\Entity\Attributes;
use PHPUnit\Framework\TestCase;

class AttributesTest extends TestCase
{
    public function testItShouldCreateCorrectAttributes()
    {
        $originSub = 'ES';
        $CRMID = 'ES17320007';
        $product = 'FTG';
        $service = 'PR';
        $additionalService = '';
        $format = 'P';

        $attributes = new Attributes($originSub, $CRMID, $product, $service, $additionalService, $format);

        $this->assertEquals($originSub, $attributes->getOriginSub());
        $this->assertEquals($CRMID, $attributes->getCRMID());
        $this->assertEquals($product, $attributes->getProduct());
        $this->assertEquals($service, $attributes->getService());
        $this->assertEquals($additionalService, $attributes->getAdditionalService());
        $this->assertEquals($format, $attributes->getFormat());
    }

}
