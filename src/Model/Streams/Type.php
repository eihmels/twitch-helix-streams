<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class Type
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = 'type';

    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    private const LIVE = 'live';

    public function __construct(public readonly string $type)
    {
    }

    public function isLive(): bool
    {
        return self::LIVE === $this->type;
    }
}
