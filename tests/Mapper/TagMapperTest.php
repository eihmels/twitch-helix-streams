<?php

declare(strict_types=1);

namespace Mapper;

use Assert\AssertionFailedException;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TwitchHelixStreams\Mapper\TagMapper;
use TwitchHelixStreams\Model\Streams\Stream\Tags;
use TwitchHelixStreams\Model\Streams\Tags\Tag;

final class TagMapperTest extends TestCase
{
    /**
     * @throws AssertionFailedException
     */
    public function testEmptyArray(): void
    {
        $this->assertEquals(new Tags(), TagMapper::mapTagsFromArray([]));
    }

    /**
     * @throws AssertionFailedException
     */
    public function testNull(): void
    {
        $this->assertEquals(new Tags(), TagMapper::mapTagsFromArray(null));
    }

    /**
     * @throws AssertionFailedException
     */
    public function testWrongType(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Value "1" expected to be string, type integer given.');

        TagMapper::mapTagsFromArray([1, 2]);
    }

    /**
     * @throws AssertionFailedException
     */
    public function testSuccess(): void
    {
        $this->assertEquals(
            new Tags(
                [
                    new Tag('english'),
                    new Tag('game'),
                ]
            ),
            TagMapper::mapTagsFromArray(['english', 'game'])
        );
    }
}
