<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Validator;

use Assert\Assertion;
use Assert\AssertionFailedException;
use TwitchHelixStreams\Model\Streams\GameIdentifier;
use TwitchHelixStreams\Model\Streams\GameName;
use TwitchHelixStreams\Model\Streams\Language;
use TwitchHelixStreams\Model\Streams\StartedAt;
use TwitchHelixStreams\Model\Streams\StreamIdentifier;
use TwitchHelixStreams\Model\Streams\TagIdentifiers;
use TwitchHelixStreams\Model\Streams\Tags;
use TwitchHelixStreams\Model\Streams\ThumbnailUrl;
use TwitchHelixStreams\Model\Streams\Title;
use TwitchHelixStreams\Model\Streams\Type;
use TwitchHelixStreams\Model\Streams\UserIdentifier;
use TwitchHelixStreams\Model\Streams\UserLogin;
use TwitchHelixStreams\Model\Streams\ViewerCount;

final class DataValidator
{
    /**
     * @throws AssertionFailedException
     */
    public static function validate(array $data = []): void
    {
        if ([] === $data) {
            return;
        }

        Assertion::keyExists($data, StreamIdentifier::VALUE_NAME);
        Assertion::keyExists($data, UserIdentifier::VALUE_NAME);
        Assertion::keyExists($data, UserLogin::VALUE_NAME);
        Assertion::keyExists($data, GameIdentifier::VALUE_NAME);
        Assertion::keyExists($data, GameName::VALUE_NAME);
        Assertion::keyExists($data, Type::VALUE_NAME);
        Assertion::keyExists($data, Title::VALUE_NAME);
        Assertion::keyExists($data, Tags::VALUE_NAME);
        Assertion::keyExists($data, ViewerCount::VALUE_NAME);
        Assertion::keyExists($data, StartedAt::VALUE_NAME);
        Assertion::keyExists($data, Language::VALUE_NAME);
        Assertion::keyExists($data, ThumbnailUrl::VALUE_NAME);
        Assertion::keyExists($data, TagIdentifiers::VALUE_NAME);
    }
}
