<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class GameName
{
    /**
     * @var string
     */
    const VALUE_NAME = "game_name";

    public function __construct(public readonly string $gameName) {}

    public function isEquals(string $gameName): bool
    {
        return $this->gameName === $gameName;
    }

}