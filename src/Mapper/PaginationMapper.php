<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Mapper;

use Assert\Assertion;
use Assert\AssertionFailedException;
use TwitchHelixStreams\Model\Pagination\Cursor;
use TwitchHelixStreams\Model\Pagination\Pagination;

final class PaginationMapper
{
    /**
     * @codingStandardsIgnoreStart
     * @var string
     * @codingStandardsIgnoreEnd
     */
    public const VALUE_NAME = "pagination";

    /**
     * @throws AssertionFailedException
     */
    public static function mapFromArray(array $pagination): Pagination
    {
        if ([] !== $pagination) {
            return self::mapPagination($pagination);
        }

        return new Pagination();
    }

    /**
     * @throws AssertionFailedException
     */
    private static function mapPagination(array $pagination): Pagination
    {
        return new Pagination(
            self::getCursor($pagination)
        );
    }

    /**
     * @throws AssertionFailedException
     */
    private static function getCursor(array $pagination): Cursor
    {
        Assertion::keyExists($pagination, Cursor::VALUE_NAME);
        return new Cursor($pagination[Cursor::VALUE_NAME]);
    }
}
