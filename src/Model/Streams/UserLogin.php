<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class UserLogin
{
    const VALUE_NAME = "user_login";

    public function __construct(public readonly string $userLogin) {}

    public function isEquals(string $userLogin): bool
    {
        return $this->userLogin === $userLogin;
    }
}