<?php

declare(strict_types=1);

namespace klareNNNs\asendia\Entity;


use PHPUnit\Framework\TestCase;

class ParcelTest extends TestCase
{
    public function testItShouldCreateCorrectParcel()
    {
        $countryOfOrigin = 'ES';
        $description1 = 'tshirt';
        $harmonizationCode = 610910000080;

        $orderLine = new OrderLine($countryOfOrigin, $description1, $harmonizationCode);

        $orderLines[] = $orderLine;
        $orderLines[] = $orderLine;
        $orderLines[] = $orderLine;

        $parcelIdentifier = 1;
        $weight = 1;

        $parcel = new Parcel($orderLines, $parcelIdentifier, $weight);

        $testLines = $parcel->getOrderLines();

        $this->assertInternalType('array', $testLines);
        $this->assertCount(3, $testLines);
        $this->assertContainsOnlyInstancesOf(OrderLine::class, $testLines);
        $this->assertEquals($parcelIdentifier, $parcel->getParcelIdentifier());
        $this->assertEquals($weight, $parcel->getWeight());
    }

}
