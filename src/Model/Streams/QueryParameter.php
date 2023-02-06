<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

interface QueryParameter
{
    public function getValue(): string;

    public function getValueName(): string;
}
