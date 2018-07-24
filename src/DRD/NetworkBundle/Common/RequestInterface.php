<?php

namespace DRD\NetworkBundle\Common;

use DRD\NetworkBundle\DTO\DTOInterface;
use DRD\NetworkBundle\Response\ResponseInterface;

interface RequestInterface
{
    /**
     * @param DTOInterface $data
     * @return ResponseInterface
     */
    public function send(DTOInterface $data): ResponseInterface;
}
