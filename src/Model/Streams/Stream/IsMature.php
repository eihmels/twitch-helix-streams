<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams\Stream;

final class IsMature
{
    public function __construct(private readonly bool $isMature = false)
    {
    }

    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "is_mature";

    public function isMature(): bool
    {
        return $this->isMature;
    }
}
