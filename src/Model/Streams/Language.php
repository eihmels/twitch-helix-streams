<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class Language
{
    /**
     * @var string
     */
    const VALUE_NAME = "language";

    public function __construct(public readonly string $language) {}
}