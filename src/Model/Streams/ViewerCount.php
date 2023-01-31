<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class ViewerCount
{
    /**
     * @var string
     */
    const VALUE_NAME = "viewer_count";

    public function __construct(public readonly int $viewerCount) {}
}