<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

final class Language
{
    public function __construct(public readonly string $language) {}
}