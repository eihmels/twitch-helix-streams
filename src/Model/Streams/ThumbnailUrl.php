<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class ThumbnailUrl
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "thumbnail_url";

    public function __construct(public readonly string $thumbnailUrl)
    {
    }
}
