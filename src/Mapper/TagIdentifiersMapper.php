<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Mapper;

use Assert\Assertion;
use TwitchHelixStreams\Model\Streams\TagIdentifiers;
use TwitchHelixStreams\Model\Streams\Tags\TagIdentifier;

final class TagIdentifiersMapper
{
    public static function mapTagIdentifiersFromArray(?array $tagIdentifiers): TagIdentifiers
    {
        if (null === $tagIdentifiers) {
            return new TagIdentifiers();
        }

        $tagIdentifiersCollection = new TagIdentifiers();

        foreach ($tagIdentifiers as $tagIdentifier) {
            Assertion::string($tagIdentifier);

            $tagIdentifiersCollection->add(new TagIdentifier($tagIdentifier));
        }

        return $tagIdentifiersCollection;
    }
}
