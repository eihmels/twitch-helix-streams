<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

use ArrayIterator;
use InvalidArgumentException;
use IteratorAggregate;
use Traversable;
use TwitchHelixStreams\Model\Streams\Tags\TagIdentifier;

final class TagIdentifiers implements IteratorAggregate
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = 'tags';

    public array $tagIdentifiers;

    public function __construct(array $tagIdentifiers = [])
    {
        foreach ($tagIdentifiers as $tagIdentifier) {
            if (!$tagIdentifier instanceof TagIdentifier) {
                throw new InvalidArgumentException(
                    sprintf(
                        "item has to be %s but %s given",
                        TagIdentifier::class,
                        $tagIdentifier::class
                    )
                );
            }
        }

        $this->tagIdentifiers = $tagIdentifiers;
    }

    public function contains(TagIdentifier $tagIdentifier): bool
    {
        foreach ($this->tagIdentifiers as $item) {
            if ($item->isEquals($tagIdentifier)) {
                return true;
            }
        }

        return false;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->tagIdentifiers);
    }
}
