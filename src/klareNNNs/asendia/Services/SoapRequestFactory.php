<?php

declare(strict_types=1);

namespace klareNNNs\asendia\Services;

use klareNNNs\asendia\Entity\Request;
use SoapVar;

class SoapRequestFactory
{
    public static function create(Request $request): array
    {

        //Body
        $Address = array (

            'Address1' => $request->getAddress()->getAddress1(),
            //'Address2' => '',
            //'Address3' => '',
            'AddressType' => $request->getAddress()->getAddressType(),
            'CellPhone' => $request->getAddress()->getCellPhone(),
            'City' => $request->getAddress()->getCity(),
            'Contact' => $request->getAddress()->getContact(),
            //'CustomerNumber' => '',
            'Email' => $request->getAddress()->getEmail(),
            //'Fax' => '',
            //'Freetext1' => '',
            //'Freetext2' => '',
            //'Freetext3' => '',
            //'Freetext4' => '',
            'ISOCountry' => $request->getAddress()->getISOCountry(),
            'Name' => $request->getAddress()->getName(),
            'Phone' => '',
            'State' => '',
            //'VatNo' => '',
            'ZipCode' => $request->getAddress()->getZipCode()
        );

        $Addresses = array ('Address' => $Address);



        $Attributes = array(

            new SoapVar(array('ns2:Code' => 'OriginSub', 'ns2:Value' => $request->getAttributes()->getOriginSub()), SOAP_ENC_OBJECT, '', 'Attribute', ''),
            new SoapVar(array('ns2:Code' => 'CRMID', 'ns2:Value' => $request->getAttributes()->getCRMID()), SOAP_ENC_OBJECT, '', 'Attribute', ''),
            new SoapVar(array('ns2:Code' => 'Product', 'ns2:Value' => $request->getAttributes()->getProduct()), SOAP_ENC_OBJECT, '', 'Attribute', ''),
            new SoapVar(array('ns2:Code' => 'Service', 'ns2:Value' => $request->getAttributes()->getService()), SOAP_ENC_OBJECT, '', 'Attribute', ''),
            new SoapVar(array('ns2:Code' => 'AdditionalService', 'ns2:Value' => ''), SOAP_ENC_OBJECT, '', 'Attribute', ''),
            new SoapVar(array('ns2:Code' => 'Format', 'ns2:Value' => $request->getAttributes()->getFormat()), SOAP_ENC_OBJECT, '', 'Attribute', ''),
            new SoapVar(array('ns2:Code' => 'AdditionalData1', 'ns2:Value' => ''), SOAP_ENC_OBJECT, '', 'Attribute', ''),
            new SoapVar(array('ns2:Code' => 'AdditionalData2', 'ns2:Value' => ''), SOAP_ENC_OBJECT, '', 'Attribute', ''),
            new SoapVar(array('ns2:Code' => 'AdditionalData3', 'ns2:Value' => ''), SOAP_ENC_OBJECT, '', 'Attribute', ''),
            new SoapVar(array('ns2:Code' => 'AdditionalData4', 'ns2:Value' => ''), SOAP_ENC_OBJECT, '', 'Attribute', ''),
            new SoapVar(array('ns2:Code' => 'AdditionalData5', 'ns2:Value' => ''), SOAP_ENC_OBJECT, '', 'Attribute', '')

        );

        $orderLines = $request->getParcels()->getOrderLines();
        $OrderLine = array(
            'CountryOfOrigin' => $orderLines[0]->getDescription1(),
            'Currency' => $request->getCurrency(),
            'Description1' => $orderLines[0]->getDescription1(),
            //'Description2' => '',
            'HarmonizationCode' => $orderLines[0]->getHarmonizationCode(),
            'OrderLineNumber' => '1',
            'OrderNumber' => $request->getOrderNumber(),
            'QuantityShipped' => $orderLines[0]->getQuantityShipped(),
            'UnitPrice' => $orderLines[0]->getUnitPrice(),
            'Weight' => $request->getWeight()
        );

        $OrderLines = array ('OrderLine' => $OrderLine);

        $Parcel = array(
            'GoodsMarking' => '',
            'Height' => '',
            'Length' => '',
            'OrderLines' => $OrderLines,
            'ParcelIdentifier' => $request->getParcels()->getParcelIdentifier(),
            'TypeOfGoods' => '',
            'TypeOfPackage' => '',
            'Value' => '',
            'Weight' => $request->getWeight(),
            'Width' => ''
        );

        $Parcels = array(
            'Parcel' => $Parcel,
        );

        $Shipment = array (
            'Addresses' => $Addresses,
            'Attributes'=> $Attributes,
            //'CashOnDeliveryAmount' => '',
            //'CashOnDeliveryCurrency' => '',
            //'CashOnDeliveryReference' => '',
            //'CreateReturnShipment' => '',
            'Currency' => $request->getCurrency(),
            'ModeOfTransport' => $request->getModeOfTransport(),
            'OrderNumber' => $request->getOrderNumber(),
            'Parcels'=> $Parcels,
            'SenderCode' => $request->getSenderCode(),
            'ShipDate' => $request->getShipDate(),
            'ShipmentIdentifier' => $request->getShipmentIdentifier(),
            'ShipmentType' => $request->getShipmentType(),
            'TermsOfDelivery' => 'DDP',
            'TermsOfDeliveryLocation' => '',
            'Weight' => $request->getWeight(),

        );

        $AddAndPrintShipmentRequest = array(
            'LabelType' => 'PDF',
            'Shipment'	=> $Shipment
        );
        return $AddAndPrintShipmentRequest;
    }
}