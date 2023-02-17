<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Pagination;

class Pagination
{
    public function __construct(
        public readonly ?Cursor $cursor = null,
        public readonly ?After $after = null,
        public readonly ?Before $before = null,
        public readonly ?First $first = null
    ) {
    }
}
