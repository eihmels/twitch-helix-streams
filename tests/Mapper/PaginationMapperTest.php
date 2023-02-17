<?php

declare(strict_types=1);

namespace Mapper;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use TwitchHelixStreams\Mapper\PaginationMapper;
use TwitchHelixStreams\Model\Pagination\After;
use TwitchHelixStreams\Model\Pagination\Before;
use TwitchHelixStreams\Model\Pagination\Cursor;
use TwitchHelixStreams\Model\Pagination\First;
use TwitchHelixStreams\Model\Pagination\Pagination;

final class PaginationMapperTest extends TestCase
{
    /**
     * @throws AssertionFailedException
     */
    public function testEmptyArray(): void
    {
        $this::assertEquals(new Pagination(), PaginationMapper::mapFromArray([]));
    }

    /**
     * @throws AssertionFailedException
     */
    public function testWithCursor(): void
    {
        $this->expectNotToPerformAssertions();

        PaginationMapper::mapFromArray([Cursor::VALUE_NAME => 'cursor']);
    }

    /**
     * @throws AssertionFailedException
     */
    public function testWithAll(): void
    {
        $this->expectNotToPerformAssertions();

        PaginationMapper::mapFromArray(
            [
                Cursor::VALUE_NAME => 'cursor',
                First::VALUE_NAME => 10,
                After::VALUE_NAME => 'after',
                Before::VALUE_NAME => 'before',
            ]
        );
    }
}
