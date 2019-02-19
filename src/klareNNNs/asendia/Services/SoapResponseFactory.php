<?php

declare(strict_types=1);

namespace klareNNNs\asendia\Services;

use InvalidArgumentException;
use klareNNNs\asendia\Entity\Response;
use UnexpectedValueException;

final class SoapResponseFactory
{
    public static function create($response, $output)
    {
        if ($output['Success'] === false) {
            throw new InvalidArgumentException($output['ErrorMessages']->string);
        }
        if (!static::validateFields($response)) {
            throw new UnexpectedValueException('The Response has unexpected Values');
        }
        $result = $response->ParcelDocuments->ParcelDocument;

        return new Response($result->Identifier, $result->Content, $output['Success']);
    }

    private static function validateFields($response)
    {
        if (!isset($response->ParcelDocuments)) {
            return false;
        }

        $result = $response->ParcelDocuments->ParcelDocument;
        if (!isset($result->Content)) {
            return false;
        }
        if (!isset($result->Identifier)) {
            return false;
        }

        return true;
    }

}