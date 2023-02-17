<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Validator;

use Assert\Assertion;
use Assert\AssertionFailedException;

final class ResponseValidator
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const DATA = 'data';

    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const PAGINATION = 'pagination';

    /**
     * @throws AssertionFailedException
     */
    public static function validate(array $response): void
    {
        Assertion::keyExists($response, self::DATA);
        Assertion::keyExists($response, self::PAGINATION);
    }
}
