<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class StartedAt
{
    /**
     * @var string
     */
    const VALUE_NAME = "started_at";

    public function __construct(public readonly string $startedAt) {}
}