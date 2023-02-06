<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class GameIdentifier implements QueryParameter
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "game_id";

    public function __construct(public readonly string $gameIdentifier)
    {
    }

    public function getValue(): string
    {
        return $this->gameIdentifier;
    }

    public function isEquals(string $gameIdentifier): bool
    {
        return $this->gameIdentifier === $gameIdentifier;
    }

    public function getValueName(): string
    {
        return self::VALUE_NAME;
    }
}
