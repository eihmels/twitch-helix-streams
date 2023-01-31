<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class GameIdentifier
{
    /**
     * @var string
     */
    const VALUE_NAME = "game_id";

    public function __construct(public readonly string $gameIdentifier) {}

    public function isEquals(string $gameIdentifier): bool
    {
        return $this->gameIdentifier === $gameIdentifier;
    }
}