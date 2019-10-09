<?php

namespace DRD\NetworkBundle\Extractor;

use DRD\NetworkBundle\DTO\DTOInterface;

/**
 * Interface ParamsExtractorInterface
 * @package DRD\NetworkBundle\Extractor
 */
interface ParamsExtractorInterface
{
    /**
     * @param DTOInterface $data
     * @return array
     */
    public function getParams(DTOInterface $data): array;
}
