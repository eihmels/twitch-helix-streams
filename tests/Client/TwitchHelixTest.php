<?php

declare(strict_types=1);

namespace Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use Mockery;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use TwitchHelixStreams\Client\TwitchHelix;
use TwitchHelixStreams\Model\Pagination\After;
use TwitchHelixStreams\Model\Pagination\Before;
use TwitchHelixStreams\Model\Pagination\First;
use TwitchHelixStreams\Model\QueryParameters\QueryParameterCollection;
use TwitchHelixStreams\Model\Streams\Stream\GameIdentifier;
use TwitchHelixStreams\Model\Streams\Stream\Language;
use TwitchHelixStreams\Model\Streams\Stream\Type;
use TwitchHelixStreams\Model\Streams\Stream\UserIdentifier;
use TwitchHelixStreams\Model\Streams\Stream\UserLogin;

final class TwitchHelixTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testWithoutParams(): void
    {
        $legacyMock = Mockery::mock(ClientInterface::class);

        $legacyMock
            ->expects('request')
            ->once()
            ->andReturnUsing(
                static function (string $method, $uri, array $options = []): ResponseInterface {
                    self::assertEquals('GET', $method);
                    self::assertEquals('twitchdomain.de/streams', $uri);
                    self::assertEquals(
                        ['headers' =>
                            [
                                'Client-ID' => '123',
                                'Authorization' => 'Bearer 1235456',
                            ],
                        ],
                        $options
                    );
                    return new Response();
                }
            );

        $twitchHelix = new TwitchHelix('twitchdomain.de', '/streams', '123', $legacyMock);
        $twitchHelix->streamsRequest('1235456');
    }

    /**
     * @throws GuzzleException
     */
    public function testWithQueryParameter(): void
    {
        $legacyMock = Mockery::mock(ClientInterface::class);

        $legacyMock->expects('request')->once()->andReturnUsing(
            static function (string $method, $uri, array $options = []): ResponseInterface {
                self::assertEquals('GET', $method);
                self::assertEquals('twitchdomain.de/streams?user_login=name', $uri);
                self::assertEquals(
                    ['headers' =>
                        [
                            'Client-ID' => '123',
                            'Authorization' => 'Bearer 1235456',
                        ],
                    ],
                    $options
                );
                return new Response();
            }
        );

        $twitchHelix = new TwitchHelix('twitchdomain.de', '/streams', '123', $legacyMock);

        $twitchHelix->streamsRequest(
            '1235456',
            new QueryParameterCollection(
                [
                    new UserLogin('name'),
                ]
            )
        );
    }

    /**
     * @throws GuzzleException
     *
     */
    public function testWithFirst(): void
    {
        $legacyMock = Mockery::mock(ClientInterface::class);

        $legacyMock->expects('request')->once()->andReturnUsing(
            static function (string $method, $uri, array $options = []): ResponseInterface {
                self::assertEquals('GET', $method);
                self::assertEquals('twitchdomain.de/streams?user_login=name&first=10', $uri);
                self::assertEquals(
                    ['headers' =>
                        [
                            'Client-ID' => '123',
                            'Authorization' => 'Bearer 1235456',
                        ],
                    ],
                    $options
                );
                return new Response();
            }
        );

        $twitchHelix = new TwitchHelix('twitchdomain.de', '/streams', '123', $legacyMock);

        $twitchHelix->streamsRequest(
            '1235456',
            new QueryParameterCollection(
                [
                    new UserLogin('name'),
                ],
                new First(10)
            )
        );

        $legacyMock->expects('request')->once()->andReturnUsing(
            static function (string $method, $uri, array $options = []): ResponseInterface {
                self::assertEquals('GET', $method);
                self::assertEquals('twitchdomain.de/streams?first=10', $uri);
                self::assertEquals(
                    ['headers' =>
                        [
                            'Client-ID' => '123',
                            'Authorization' => 'Bearer 1235456',
                        ],
                    ],
                    $options
                );
                return new Response();
            }
        );

        $twitchHelix->streamsRequest(
            '1235456',
            new QueryParameterCollection(
                [],
                new First(10)
            )
        );
    }

    /**
     * @throws GuzzleException
     *
     */
    public function testWithAfter(): void
    {
        $legacyMock = Mockery::mock(ClientInterface::class);

        $legacyMock->expects('request')->once()->andReturnUsing(
            static function (string $method, $uri, array $options = []): ResponseInterface {
                self::assertEquals('GET', $method);
                self::assertEquals('twitchdomain.de/streams?user_login=name&after=cursorAfter', $uri);
                self::assertEquals(
                    ['headers' =>
                        [
                            'Client-ID' => '123',
                            'Authorization' => 'Bearer 1235456',
                        ],
                    ],
                    $options
                );
                return new Response();
            }
        );

        $twitchHelix = new TwitchHelix('twitchdomain.de', '/streams', '123', $legacyMock);

        $twitchHelix->streamsRequest(
            '1235456',
            new QueryParameterCollection(
                [
                    new UserLogin('name'),
                ],
                null,
                new After('cursorAfter')
            )
        );

        $legacyMock->expects('request')->once()->andReturnUsing(
            static function (string $method, $uri, array $options = []): ResponseInterface {
                self::assertEquals('GET', $method);
                self::assertEquals('twitchdomain.de/streams?after=cursorAfter', $uri);
                self::assertEquals(
                    ['headers' =>
                        [
                            'Client-ID' => '123',
                            'Authorization' => 'Bearer 1235456',
                        ],
                    ],
                    $options
                );
                return new Response();
            }
        );

        $twitchHelix->streamsRequest(
            '1235456',
            new QueryParameterCollection(
                [],
                null,
                new After('cursorAfter')
            )
        );
    }

    /**
     * @throws GuzzleException
     *
     */
    public function testWithBefore(): void
    {
        $legacyMock = Mockery::mock(ClientInterface::class);

        $legacyMock->expects('request')->once()->andReturnUsing(
            static function (string $method, $uri, array $options = []): ResponseInterface {
                self::assertEquals('GET', $method);
                self::assertEquals('twitchdomain.de/streams?user_login=name&before=cursorBefore', $uri);
                self::assertEquals(
                    ['headers' =>
                        [
                            'Client-ID' => '123',
                            'Authorization' => 'Bearer 1235456',
                        ],
                    ],
                    $options
                );
                return new Response();
            }
        );

        $twitchHelix = new TwitchHelix('twitchdomain.de', '/streams', '123', $legacyMock);

        $twitchHelix->streamsRequest(
            '1235456',
            new QueryParameterCollection(
                [
                    new UserLogin('name'),
                ],
                null,
                null,
                new Before('cursorBefore')
            )
        );

        $legacyMock->expects('request')->once()->andReturnUsing(
            static function (string $method, $uri, array $options = []): ResponseInterface {
                self::assertEquals('GET', $method);
                self::assertEquals('twitchdomain.de/streams?before=cursorBefore', $uri);
                self::assertEquals(
                    ['headers' =>
                        [
                            'Client-ID' => '123',
                            'Authorization' => 'Bearer 1235456',
                        ],
                    ],
                    $options
                );
                return new Response();
            }
        );

        $twitchHelix->streamsRequest(
            '1235456',
            new QueryParameterCollection(
                [],
                null,
                null,
                new Before('cursorBefore')
            )
        );
    }

    /**
     * @throws GuzzleException
     */
    public function testWithQueryParameters(): void
    {
        $legacyMock = Mockery::mock(ClientInterface::class);

        $legacyMock->expects('request')->once()->andReturnUsing(
            static function (string $method, $uri, array $options = []): ResponseInterface {
                self::assertEquals('GET', $method);

                self::assertEquals(
                    'twitchdomain.de/streams?user_login=name&user_id=1&game_id=2&language=de&type=type',
                    $uri
                );

                self::assertEquals(
                    ['headers' =>
                        [
                            'Client-ID' => '123',
                            'Authorization' => 'Bearer 1235456',
                        ],
                    ],
                    $options
                );
                return new Response();
            }
        );

        $twitchHelix = new TwitchHelix('twitchdomain.de', '/streams', '123', $legacyMock);
        $twitchHelix->streamsRequest(
            '1235456',
            new QueryParameterCollection(
                [
                    new UserLogin('name'),
                    new UserIdentifier('1'),
                    new GameIdentifier('2'),
                    new Language('de'),
                    new Type('type'),
                ]
            )
        );
    }

    /**
     * @throws GuzzleException
     */
    public function testWithQueryParametersandPagination(): void
    {
        $legacyMock = Mockery::mock(ClientInterface::class);

        $legacyMock->expects('request')->once()->andReturnUsing(
            static function (string $method, $uri, array $options = []): ResponseInterface {
                self::assertEquals('GET', $method);
                /**  @codingStandardsIgnoreStart  */
                self::assertEquals(
                    'twitchdomain.de/streams?user_login=name&user_id=1&game_id=2&language=de&type=type&first=20&after=cursorAfter',
                    $uri
                );
                /** @codingStandardsIgnoreEnd  */
                self::assertEquals(
                    [
                        'headers' =>
                            [
                                'Client-ID' => '123',
                                'Authorization' => 'Bearer 1235456',
                            ],
                    ],
                    $options
                );
                return new Response();
            }
        );

        $twitchHelix = new TwitchHelix('twitchdomain.de', '/streams', '123', $legacyMock);
        $twitchHelix->streamsRequest(
            '1235456',
            new QueryParameterCollection(
                [
                    new UserLogin('name'),
                    new UserIdentifier('1'),
                    new GameIdentifier('2'),
                    new Language('de'),
                    new Type('type'),
                ],
                new First(20),
                new After('cursorAfter'),
            )
        );
    }

    /**
     * @throws GuzzleException
     */
    public function testWithQueryParametersandBefore(): void
    {
        $legacyMock = Mockery::mock(ClientInterface::class);

        $legacyMock->expects('request')->once()->andReturnUsing(
            static function (string $method, $uri, array $options = []): ResponseInterface {
                self::assertEquals('GET', $method);

                /** @codingStandardsIgnoreStart  */
                self::assertEquals(
                    'twitchdomain.de/streams?user_login=name&user_id=1&game_id=2&language=de&type=type&first=20&before=cursorAfter',
                    $uri
                );
                /** @codingStandardsIgnoreEnd  */

                self::assertEquals(
                    [
                        'headers' =>
                            [
                                'Client-ID' => '123',
                                'Authorization' => 'Bearer 1235456',
                            ],
                    ],
                    $options
                );
                return new Response();
            }
        );

        $twitchHelix = new TwitchHelix('twitchdomain.de', '/streams', '123', $legacyMock);
        $twitchHelix->streamsRequest(
            '1235456',
            new QueryParameterCollection(
                [
                    new UserLogin('name'),
                    new UserIdentifier('1'),
                    new GameIdentifier('2'),
                    new Language('de'),
                    new Type('type'),
                ],
                new First(20),
                null,
                new Before('cursorAfter'),
            )
        );
    }
}
