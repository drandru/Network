<?php

namespace DRD\NetworkBundle\Response\Transformer;

use DRD\NetworkBundle\Response\ResponseInterface;

interface ResponseTransformerInterface
{
    /**
     * @param string $data
     * @return ResponseInterface
     */
    public function transform(string $data): ResponseInterface;
}
