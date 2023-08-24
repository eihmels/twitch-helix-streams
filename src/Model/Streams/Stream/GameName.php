<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams\Stream;

final class GameName
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "game_name";

    public function __construct(public readonly string $gameName)
    {
    }

    public function isEquals(string $gameName): bool
    {
        return $this->gameName === $gameName;
    }
}
