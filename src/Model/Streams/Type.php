<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class Type implements QueryParameter
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

    public function getValue(): string
    {
        return $this->type;
    }

    public function getValueName(): string
    {
        return self::VALUE_NAME;
    }
}
