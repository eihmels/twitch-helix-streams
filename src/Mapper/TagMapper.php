<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Mapper;

use Assert\AssertionFailedException;
use Assert\Assertion;
use TwitchHelixStreams\Model\Streams\Tags;
use TwitchHelixStreams\Model\Streams\Tags\Tag;

final class TagMapper
{
    /**
     * @throws AssertionFailedException
     */
    public static function mapTagsFromArray(?array $tags): Tags
    {
        if (null === $tags) {
            return new Tags();
        }

        $tagCollection = new Tags();

        foreach ($tags as $tag) {
            Assertion::string($tag);

            $tagCollection->add(new Tag($tag));
        }

        return $tagCollection;
    }
}
