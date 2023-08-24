<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams\Stream;

final class UserName
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "user_name";

    public function __construct(public readonly string $userName)
    {
    }

    public function isEquals(string $userName): bool
    {
        return $this->userName === $userName;
    }
}
