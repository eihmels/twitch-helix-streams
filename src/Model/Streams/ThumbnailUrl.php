<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class ThumbnailUrl
{
    /**
     * @var string
     */
    const VALUE_NAME = "thumbnail_url";

    public function __construct(public readonly string $tumbnailUrl) {}
}