<?php

declare(strict_types=1);

namespace ApplicationTests;

use Assert\AssertionFailedException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use Mockery;
use PHPUnit\Framework\TestCase;
use TwitchHelixStreams\Client\TwitchHelix;
use TwitchHelixStreams\GetStreams;
use TwitchHelixStreams\Model\Pagination\Cursor;
use TwitchHelixStreams\Model\Pagination\Pagination;
use TwitchHelixStreams\Model\Streams\IsMature;
use TwitchHelixStreams\Model\Streams\Language;
use TwitchHelixStreams\Model\Streams\StartedAt;
use TwitchHelixStreams\Model\Streams\Stream;
use TwitchHelixStreams\Model\Streams\StreamCollection;
use TwitchHelixStreams\Model\Streams\StreamIdentifier;
use TwitchHelixStreams\Model\Streams\TagIdentifiers;
use TwitchHelixStreams\Model\Streams\Tags;
use TwitchHelixStreams\Model\Streams\Tags\Tag;
use TwitchHelixStreams\Model\Streams\ThumbnailUrl;
use TwitchHelixStreams\Model\Streams\Title;
use TwitchHelixStreams\Model\Streams\Type;
use TwitchHelixStreams\Model\Streams\UserIdentifier;
use TwitchHelixStreams\Model\Streams\UserLogin;
use TwitchHelixStreams\Model\Streams\UserName;
use TwitchHelixStreams\Model\Streams\ViewerCount;

final class GetStreamsTest extends TestCase
{
    public TwitchHelix $client;

    protected function setUp(): void
    {
        $this->client = Mockery::mock(TwitchHelix::class);
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     * @throws AssertionFailedException
     */
    public function testWithoutStreams(): void
    {
        $this
            ->client
            ->expects('streamsRequest')
            ->andReturn(new Response(200, [], '{"data":[],"pagination": {}}'));

        $getStreams = new GetStreams($this->client);

        self::assertEquals(new StreamCollection([], new Pagination()), $getStreams->execute('1234'));
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     * @throws AssertionFailedException
     */
    public function testWithOneStream(): void
    {
        $this
            ->client
            ->expects('streamsRequest')
            ->andReturn(new Response(200, [], '
            {
  "data": [
    {
      "id": "id",
      "user_id": "user_id",
      "user_login": "user_login",
      "user_name": "user_name",
      "game_id": "33180",
      "game_name": "The Last of Us",
      "type": "live",
      "title": "💜FUN POSITIVE WHOLESOME STREAM OF HAPPINESS AND JOY!💜",
      "viewer_count": 13088,
      "started_at": "2023-02-16T14:08:45Z",
      "language": "en",
      "thumbnail_url": "thumbnailUrl",
      "tag_ids": [],
      "tags": [
        "OTK",
        "depression",
        "StarforgePCs",
        "Razer",
        "interracial",
        "English"
      ],
      "is_mature": false
    }
  ],
  "pagination": {
    "cursor": "cursor"
  }
}'));
        $getStreams = new GetStreams($this->client);

        self::assertEquals(
            new StreamCollection(
                [
                    new Stream(
                        new StreamIdentifier('id'),
                        new UserIdentifier('user_id'),
                        new UserLogin('user_login'),
                        new UserName('user_name'),
                        new Type('live'),
                        new Title("💜FUN POSITIVE WHOLESOME STREAM OF HAPPINESS AND JOY!💜"),
                        new Tags(
                            [
                                new Tag("OTK"),
                                new Tag("depression"),
                                new Tag("StarforgePCs"),
                                new Tag("Razer"),
                                new Tag("interracial"),
                                new Tag("English"),
                            ]
                        ),
                        new ViewerCount(13088),
                        new StartedAt('2023-02-16T14:08:45Z'),
                        new Language("en"),
                        new ThumbnailUrl("thumbnailUrl"),
                        new TagIdentifiers([]),
                        new IsMature()
                    ),
                ],
                new Pagination(
                    new Cursor(
                        "cursor"
                    )
                )
            ),
            $getStreams->execute('1234')
        );
    }
}
