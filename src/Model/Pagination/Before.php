<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Pagination;

final class Before
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "before";

    public function __construct(public readonly string $before)
    {
    }

    public function getValue(): string
    {
        return $this->before;
    }
}
