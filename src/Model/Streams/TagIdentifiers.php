<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

use ArrayIterator;
use Traversable;
use TwitchHelixStreams\Model\Streams\Tags\TagIdentifier;

final class TagIdentifiers
{
    const VALUE_NAME = 'tags';

    private array $tags;

    public function __construct(TagIdentifier ...$tags)
    {
        $this->tags = $tags;
    }

    public function contains(TagIdentifier $tagIdentifier): bool
    {
        foreach ($this->tags as $value) {
            if ($value->isEquals($tagIdentifier)) {
                return true;
            }
        }

        return false;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->tags);
    }
}