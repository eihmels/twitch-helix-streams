<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Pagination;

final class Cursor
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "cursor";

    public function __construct(public readonly string $cursor)
    {
    }
}
