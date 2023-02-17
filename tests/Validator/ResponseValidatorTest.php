<?php

declare(strict_types=1);

namespace Validator;

use Assert\AssertionFailedException;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TwitchHelixStreams\Validator\ResponseValidator;

final class ResponseValidatorTest extends TestCase
{
    /**
     * @throws AssertionFailedException
     */
    public function testEmptyResponse(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "data"');

        ResponseValidator::validate([]);
    }

    /**
     * @throws AssertionFailedException
     */
    public function testWithoutPagination(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "pagination"');

        ResponseValidator::validate(
            [
                ResponseValidator::DATA => [],
            ]
        );
    }

    /**
     * @throws AssertionFailedException
     */
    public function testSuccess(): void
    {
        $this->expectNotToPerformAssertions();

        ResponseValidator::validate(
            [
                ResponseValidator::DATA => [],
                ResponseValidator::PAGINATION => [],
            ]
        );
    }
}
