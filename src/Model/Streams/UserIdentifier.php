<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class UserIdentifier implements QueryParameter
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "user_id";

    public function __construct(public readonly string $userIdentifier)
    {
    }

    public function getValue(): string
    {
        return $this->userIdentifier;
    }

    public function isEquals(string $userIdentifier): bool
    {
        return $this->userIdentifier === $userIdentifier;
    }

    public function getValueName(): string
    {
        return self::VALUE_NAME;
    }
}
