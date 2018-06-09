<?php

namespace DRD\NetBundle\Protocol;

interface ClientInterface
{
    /**
     * @param string $url
     * @return array
     */
    public function get(string $url): array;
}
