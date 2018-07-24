<?php

namespace DRD\NetworkBundle\Get;

use DRD\NetworkBundle\Common\RequestInterface;
use DRD\NetworkBundle\DTO\DTOInterface;
use DRD\NetworkBundle\DTO\Get;
use DRD\NetworkBundle\Exception\NotFoundHttpException;
use DRD\NetworkBundle\Exception\RequestFaultException;
use DRD\NetworkBundle\Extractor\ParamsExtractorInterface;
use DRD\NetworkBundle\Response\ResponseInterface;
use DRD\NetworkBundle\Response\Transformer\ResponseTransformerInterface;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface as GuzzleResponseInterface;
use Psr\Http\Message\StreamInterface;

class Request implements RequestInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var ParamsExtractorInterface
     */
    private $extractor;

    /**
     * @var ResponseTransformerInterface
     */
    private $responseTransformer;

    /**
     * Request constructor.
     * @param ClientInterface $client
     * @param ParamsExtractorInterface $extractor
     * @param ResponseTransformerInterface $responseTransformer
     */
    public function __construct(
        ClientInterface $client
        , ParamsExtractorInterface $extractor
        , ResponseTransformerInterface $responseTransformer
    ) {
        $this->client = $client;
        $this->extractor = $extractor;
        $this->responseTransformer = $responseTransformer;
    }

    /**
     * @param DTOInterface|Get $data
     * @return ResponseInterface
     * @throws NotFoundHttpException
     */
    public function send(DTOInterface $data): ResponseInterface
    {
        try {
            return $this->getContent($data);
        } catch (NotFoundHttpException $e) {
            throw new NotFoundHttpException('Content not found');
        }
    }

    /**
     * @param Get $data
     * @return ResponseInterface
     */
    private function getContent(Get $data): ResponseInterface
    {
        $content = $this->sendRequest($data);

        return $this->responseTransformer->transform($content);
    }

    /**
     * @param Get $data
     * @return StreamInterface
     */
    private function sendRequest(Get $data): StreamInterface
    {
        $response = $this->client->request('GET', $data->getUrl(), $this->getParams($data));

        $this->checkStatus($response);

        return $response->getBody();
    }

    /**
     * @param DTOInterface|Get $data
     * @return array
     */
    private function getParams(DTOInterface $data): array
    {
        return $this->extractor->getParams($data);
    }


    /**
     * @param GuzzleResponseInterface $response
     * @throws RequestFaultException
     */
    private function checkStatus(GuzzleResponseInterface $response)
    {
        if($response->getStatusCode() >= 400) {
            throw new RequestFaultException();
        }
    }
}
