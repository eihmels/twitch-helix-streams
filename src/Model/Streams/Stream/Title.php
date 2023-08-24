<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams\Stream;

final class Title
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "title";

    public function __construct(public readonly string $title)
    {
    }
}
