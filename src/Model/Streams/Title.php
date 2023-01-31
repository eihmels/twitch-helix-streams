<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class Title
{
    /**
     * @var string
     */
    const VALUE_NAME = "title";

    public function __construct(public readonly string $title) {}
}