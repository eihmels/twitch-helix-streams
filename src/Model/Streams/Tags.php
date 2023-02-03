<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

use ArrayIterator;
use InvalidArgumentException;
use IteratorAggregate;
use Traversable;
use TwitchHelixStreams\Model\Streams\Tags\Tag;

final class Tags implements IteratorAggregate
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = 'tags';

    private array $tags;

    public function __construct(array $tags = [])
    {
        foreach ($tags as $tag) {
            if (!$tag instanceof Tag) {
                throw new InvalidArgumentException(sprintf("item has to be %s but %s given", Tag::class, $tag::class));
            }
        }

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
