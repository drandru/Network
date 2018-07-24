<?php

namespace DRD\NetworkBundle\Extractor;

use DRD\NetworkBundle\DTO\DTOInterface;
use DRD\NetworkBundle\DTO\Get as GetDTO;

class Get implements ParamsExtractorInterface
{
    /**
     * @param DTOInterface|GetDTO $data
     * @return array
     */
    public function getParams(DTOInterface $data): array
    {
        $params = [];

        $params = $this->addHeaders($data, $params);
        $params = $this->addCookies($data, $params);
        $params = $this->addArguments($data, $params);

        return $params;
    }

    /**
     * @param GetDTO $data
     * @param array $params
     * @return array
     */
    private function addHeaders(GetDTO $data, array $params)
    {
        if($data->getHeaders())
            $params['headers'] = $data->getHeaders();

        return $params;
    }

    /**
     * @param GetDTO $data
     * @param array $params
     * @return array
     */
    private function addCookies(GetDTO $data, array $params)
    {
        if($data->getCookies())
            $params['cookies'] = $data->getCookies();

        return $params;
    }

    /**
     * @param GetDTO $data
     * @param array $params
     * @return array
     */
    private function addArguments(GetDTO $data, array $params)
    {
        if($data->getArguments())
            $params['query'] = $data->getArguments();

        return $params;
    }
}
