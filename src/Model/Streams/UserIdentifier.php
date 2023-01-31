<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class UserIdentifier
{
    /**
     * @var string
     */
    const VALUE_NAME = "user_id";

    public function __construct(public readonly string $userIdentifier) {}

    public function isEquals(string $userIdentifier): bool
    {
        return $this->userIdentifier === $userIdentifier;
    }
}