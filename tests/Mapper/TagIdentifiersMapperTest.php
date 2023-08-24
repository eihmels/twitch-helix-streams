<?php

declare(strict_types=1);

namespace Mapper;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TwitchHelixStreams\Mapper\TagIdentifiersMapper;
use TwitchHelixStreams\Model\Streams\Stream\TagIdentifiers;
use TwitchHelixStreams\Model\Streams\Tags\TagIdentifier;

final class TagIdentifiersMapperTest extends TestCase
{
    public function testEmpty(): void
    {
        $this->assertEquals(new TagIdentifiers([]), TagIdentifiersMapper::mapTagIdentifiersFromArray([]));
    }

    public function testNull(): void
    {
        $this->assertEquals(new TagIdentifiers([]), TagIdentifiersMapper::mapTagIdentifiersFromArray(null));
    }

    public function testWrongType(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Value "1" expected to be string, type integer given.');

        TagIdentifiersMapper::mapTagIdentifiersFromArray([1, 2]);
    }

    public function testSuccess(): void
    {
        $this->assertEquals(
            new TagIdentifiers(
                [
                    new TagIdentifier('123'),
                    new TagIdentifier('234'),
                ]
            ),
            TagIdentifiersMapper::mapTagIdentifiersFromArray(
                [
                    '123',
                    '234',
                ]
            )
        );
    }
}
