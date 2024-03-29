<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams\Stream;

final class StreamIdentifier
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "id";

    public function __construct(public readonly string $streamIdentifier)
    {
    }

    public function isEquals(string $streamIdentifier): bool
    {
        return $this->streamIdentifier === $streamIdentifier;
    }
}
