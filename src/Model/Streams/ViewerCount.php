<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class ViewerCount
{
    public function __construct(public readonly int $viewerCount) {}
}