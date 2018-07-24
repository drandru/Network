<?php

namespace DRD\NetworkBundle\Extractor;

use DRD\NetworkBundle\DTO\DTOInterface;

interface ParamsExtractorInterface
{
    /**
     * @param DTOInterface $data
     * @return array
     */
    public function getParams(DTOInterface $data): array;
}
