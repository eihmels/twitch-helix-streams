<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams\Stream;

use TwitchHelixStreams\Model\Streams\QueryParameter;

final class Language implements QueryParameter
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "language";

    public function __construct(public readonly string $language)
    {
    }

    public function getValue(): string
    {
        return $this->language;
    }

    public function getValueName(): string
    {
        return self::VALUE_NAME;
    }
}
