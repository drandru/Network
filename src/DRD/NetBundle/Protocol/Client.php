<?php

namespace DRD\NetBundle\Protocol;

use DRD\DecoderBundle\Common\StringToArrayDecoderInterface;
use GuzzleHttp\ClientInterface as HttpClientInterface;

class Client implements ClientInterface
{
    /**
     * @var HttpClientInterface
     */
    private $client;

    /**
     * @var StringToArrayDecoderInterface
     */
    private $decoder;

    /**
     * @param HttpClientInterface $client
     * @param StringToArrayDecoderInterface $decoder
     */
    public function __construct(HttpClientInterface $client, StringToArrayDecoderInterface $decoder)
    {
        $this->client = $client;
        $this->decoder = $decoder;
    }

    /**
     * @param string $url
     * @return array
     */
    public function get(string $url): array
    {
        $data = $this->client->request('GET', $url)->getBody()->getContents();

        return $this->decoder->decode($data);
    }
}
