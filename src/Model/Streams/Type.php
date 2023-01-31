<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class Type
{
    const VALUE_NAME = 'type';

    const LIVE = 'live';

    public function __construct(public readonly string $type) {}

    public function isEquals(string $type): bool
    {
        return $this->type === $type;
    }

    public function isLive(): bool
    {
        return $this->type === self::LIVE;
    }
}