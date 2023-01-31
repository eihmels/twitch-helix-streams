<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

use ArrayIterator;
use IteratorAggregate;
use Traversable;
use TwitchHelixStreams\Model\Streams\Tags\Tag;

final class Tags implements IteratorAggregate
{
    const VALUE_NAME = 'tags';

    private array $tags;

    public function __construct(Tag ...$tags)
    {
        $this->tags = $tags;
    }

    public function contains(Tag $tag): bool
    {
        foreach ($this->tags as $value) {
            if ($value->isEquals($tag)) {
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