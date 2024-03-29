<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams\Stream;

use TwitchHelixStreams\Model\Streams\QueryParameter;

final class UserLogin implements QueryParameter
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "user_login";

    public function __construct(public readonly string $userLogin)
    {
    }

    public function isEquals(string $userLogin): bool
    {
        return $this->userLogin === $userLogin;
    }

    public function getValue(): string
    {
        return $this->userLogin;
    }

    public function getValueName(): string
    {
        return self::VALUE_NAME;
    }
}
