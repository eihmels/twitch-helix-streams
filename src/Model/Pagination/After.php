<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Pagination;

final class After
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "after";

    public function __construct(public readonly string $after)
    {
    }

    public function getValue(): string
    {
        return $this->after;
    }

    public function getValueName(): string
    {
        return self::VALUE_NAME;
    }
}
