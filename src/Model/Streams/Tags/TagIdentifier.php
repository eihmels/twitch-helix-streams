<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams\Tags;

final class TagIdentifier
{
    public function __construct(public readonly string $tagIdentifier)
    {
    }

    public function isEquals(self $tagIdentifier): bool
    {
        return $this->tagIdentifier === $tagIdentifier->tagIdentifier;
    }
}
