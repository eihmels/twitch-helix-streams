<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams\Stream;

use DateTimeImmutable;
use InvalidArgumentException;

final class StartedAt extends DateTimeImmutable
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "started_at";


    public static function createFromString(string $datetime): self
    {
        $datetimeTimestamp = strtotime($datetime);

        if (false === $datetimeTimestamp) {
            $datetimeTimestamp = null;
        }

        $dateTimeImmutable = DateTimeImmutable::createFromFormat(
            'Y-m-d h:i:s',
            date('Y-m-d h:i:s', $datetimeTimestamp)
        );

        if (false === $dateTimeImmutable) {
            throw new InvalidArgumentException(sprintf('create datetime exception (%s)', $datetime));
        }

        return new StartedAt(sprintf('@%d', $dateTimeImmutable->getTimestamp()));
    }
}
