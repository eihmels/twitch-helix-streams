<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class StreamIdentifier
{
    const VALUE_NAME = "id";

    public function __construct(public readonly string $streamIdentifier) {}

    public function isEquals(string $streamIdentifier): bool
    {
        return $this->streamIdentifier === $streamIdentifier;
    }
}