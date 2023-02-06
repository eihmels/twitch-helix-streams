<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Pagination;

final class First
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "first";

    public function __construct(private readonly int $first)
    {
    }

    public function getValue(): string
    {
        return (string)$this->first;
    }
}
