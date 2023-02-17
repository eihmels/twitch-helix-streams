<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

use InvalidArgumentException;
use TwitchHelixStreams\Model\Pagination\Pagination;

class StreamCollection
{
    private array $streams = [];

    public function __construct(array $streams, private ?Pagination $pagination = null)
    {
        foreach ($streams as $stream) {
            if (!$stream instanceof Stream) {
                throw new InvalidArgumentException(
                    sprintf(
                        "item has to be %s but %s given",
                        Stream::class,
                        $stream::class
                    )
                );
            }

            $this->add($stream);
        }
    }

    public function getPagination(): ?Pagination
    {
        return $this->pagination;
    }

    public function setPagination(Pagination $pagination): void
    {
        $this->pagination = $pagination;
    }

    public function add(Stream $stream): void
    {
        $this->streams[] = $stream;
    }

    public function getStreams(): array
    {
        return $this->streams;
    }
}
