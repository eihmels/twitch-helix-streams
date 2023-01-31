<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class UserName
{
    /**
     * @var string
     */
    const VALUE_NAME = "user_name";

    public function __construct(public readonly string $userName) {}

    public function isEquals(string $userName): bool
    {
        return $this->userName === $userName;
    }
}