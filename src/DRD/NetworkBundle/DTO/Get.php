<?php

namespace DRD\NetworkBundle\DTO;

/**
 * Class Get
 * @package DRD\NetworkBundle\DTO
 */
class Get implements DTOInterface
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string[]
     */
    private $arguments;

    /**
     * @var string[]
     */
    private $headers;

    /**
     * @var string[]
     */
    private $cookies;

    /**
     * Get constructor.
     * @param string $url
     * @param array $arguments
     */
    public function __construct(string $url, array $arguments = [])
    {
        $this->url = $url;
        $this->arguments = $arguments;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string[]
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * @param string[] $arguments
     * @return Get
     */
    public function setArguments(array $arguments): Get
    {
        $this->arguments = $arguments;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param string[] $headers
     * @return Get
     */
    public function setHeaders(array $headers): Get
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getCookies(): array
    {
        return $this->cookies;
    }

    /**
     * @param string[] $cookies
     * @return Get
     */
    public function setCookies(array $cookies): Get
    {
        $this->cookies = $cookies;

        return $this;
    }
}
