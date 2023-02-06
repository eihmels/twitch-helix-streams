<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams\Tags;

final class Tag
{
    public function __construct(public readonly string $tag)
    {
    }

    public function isEquals(self $tag): bool
    {
        return $this->tag === $tag->tag;
    }
}
