<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\QueryParameters;

use ArrayIterator;
use IteratorAggregate;
use RuntimeException;
use Traversable;
use TwitchHelixStreams\Model\Pagination\After;
use TwitchHelixStreams\Model\Pagination\Before;
use TwitchHelixStreams\Model\Pagination\First;
use TwitchHelixStreams\Model\Streams\QueryParameter;

final class QueryParameterCollection implements IteratorAggregate
{
    public array $queryParameter = [];

    /**
     * @param array<QueryParameter> $queryParameters
     */
    public function __construct(
        array $queryParameters,
        public readonly ?First $first = null,
        public readonly ?After $after = null,
        public readonly ?Before $before = null
    ) {
        if (count($queryParameters) > 100) {
            throw new RuntimeException('to much items');
        }

        foreach ($queryParameters as $queryParameter) {
            if (!$queryParameter instanceof QueryParameter) {
                throw new RuntimeException(
                    sprintf(
                        "item has to be %s but %s given",
                        QueryParameter::class,
                        $queryParameter::class
                    )
                );
            }
        }

        $this->queryParameter = $queryParameters;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->queryParameter);
    }
}
