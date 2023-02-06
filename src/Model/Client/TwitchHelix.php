<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Client;

use ArrayIterator;
use Exception;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use TwitchHelixStreams\Model\QueryParameters\QueryParameterCollection;
use TwitchHelixStreams\Model\Streams\QueryParameter;

class TwitchHelix
{
    /**
     * @param string $domain 'https://api.twitch.tv'
     * @param string $pathStreams '/helix/streams'
     */
    public function __construct(
        private string $domain,
        private string $pathStreams,
        private string $clientId,
        private ClientInterface $client
    ) {
    }

    /**
     * @throws GuzzleException
     */
    public function streamsRequest(
        string $token,
        QueryParameterCollection $queryParameterCollection = null
    ): ResponseInterface {
        if (null === $queryParameterCollection) {
            $queryParameterCollection = new QueryParameterCollection([]);
        }

        $queryParameter = $this->generateQueryParameters($queryParameterCollection);
        $queryParameter = $this->addFirst($queryParameter, $queryParameterCollection);
        $queryParameter = $this->addBefore($queryParameter, $queryParameterCollection);
        $queryParameter = $this->addAfter($queryParameter, $queryParameterCollection);

        $url = sprintf("%s%s%s", $this->domain, $this->pathStreams, $queryParameter);

        return $this->client->request(
            'GET',
            $url,
            [
                'headers' => array_merge($this->getDefaultHeaders(), $this->getAuthorizationHeaders($token)),
            ]
        );
    }

    private function addFirst(string $queryParameter, QueryParameterCollection $queryParameterCollection): string
    {
        if (null === $queryParameterCollection->first) {
            return $queryParameter;
        }

        if ('' === $queryParameter) {
            return sprintf('?%s=%s', 'first', $queryParameterCollection->first->getValue());
        }

        return sprintf('%s&%s=%s', $queryParameter, 'first', $queryParameterCollection->first->getValue());
    }

    private function addBefore(string $queryParameter, QueryParameterCollection $queryParameterCollection): string
    {
        if (null === $queryParameterCollection->before) {
            return $queryParameter;
        }

        if ('' === $queryParameter) {
            return sprintf('?%s=%s', 'before', $queryParameterCollection->before->getValue());
        }

        return sprintf('%s&%s=%s', $queryParameter, 'before', $queryParameterCollection->before->getValue());
    }

    private function addAfter(string $queryParameter, QueryParameterCollection $queryParameterCollection): string
    {
        if (null === $queryParameterCollection->after) {
            return $queryParameter;
        }

        if ('' === $queryParameter) {
            return sprintf('?%s=%s', 'after', $queryParameterCollection->after->getValue());
        }

        return sprintf('%s&%s=%s', $queryParameter, 'after', $queryParameterCollection->after->getValue());
    }

    /**
     * @throws Exception
     */
    private function generateQueryParameters(QueryParameterCollection $queryParameterCollection): string
    {
        if (0 === iterator_count($queryParameterCollection->getIterator())) {
            return '';
        }

        $queryString = '';

        /** @var QueryParameter $item */
        foreach ($queryParameterCollection as $item) {
            if ('' === $queryString) {
                $queryString = sprintf('?%s', $this->createQueryParameter($item));
                continue;
            }

            $queryString = sprintf("%s&%s", $queryString, $this->createQueryParameter($item));
        }

        return $queryString;
    }

    private function createQueryParameter(QueryParameter $queryParameter): string
    {
        return sprintf('%s=%s', $queryParameter->getValueName(), $queryParameter->getValue());
    }

    /**
     * @return array{Client-ID: string}
     *
     */

    private function getDefaultHeaders(): array
    {
        return [
            'Client-ID' => $this->clientId,
        ];
    }

    /**
     * @return array{Authorization: string}
     *
     */
    private function getAuthorizationHeaders(string $token): array
    {
        return [
            'Authorization' => 'Bearer ' . $token,
        ];
    }
}
