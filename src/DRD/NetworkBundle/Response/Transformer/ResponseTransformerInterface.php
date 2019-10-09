<?php

namespace DRD\NetworkBundle\Response\Transformer;

use DRD\NetworkBundle\Response\ResponseInterface;

/**
 * Interface ResponseTransformerInterface
 * @package DRD\NetworkBundle\Response\Transformer
 */
interface ResponseTransformerInterface
{
    /**
     * @param string $data
     * @return ResponseInterface
     */
    public function transform(string $data): ResponseInterface;
}
