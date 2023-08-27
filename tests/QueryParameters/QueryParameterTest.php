<?php

declare(strict_types=1);

namespace QueryParameters;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use TwitchHelixStreams\Model\Pagination\After;
use TwitchHelixStreams\Model\Pagination\Before;
use TwitchHelixStreams\Model\Pagination\First;
use TwitchHelixStreams\Model\QueryParameters\QueryParameterCollection;
use TwitchHelixStreams\Model\Streams\QueryParameter;
use TwitchHelixStreams\Model\Streams\Stream\GameIdentifier;
use TwitchHelixStreams\Model\Streams\Stream\Language;
use TwitchHelixStreams\Model\Streams\Stream\Type;
use TwitchHelixStreams\Model\Streams\Stream\UserIdentifier;
use TwitchHelixStreams\Model\Streams\Stream\UserLogin;

final class QueryParameterTest extends TestCase
{
    public function testAfterThrowsException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('please dont use after and before. Use just one of it');

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
            new Before('cursorBefore')
        );
    }

    public function testToMuchParameters(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('to much queryParameters. just 100 are allowed');

        $queryParameter = [];

        for ($i = 0; $i <= 100; ++$i) {
            $queryParameter[] = new UserLogin((string)$i);
        }

        new QueryParameterCollection(
            $queryParameter,
            new First(20),
            new After('cursorAfter')
        );
    }

    public function testStringParameter(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(
            'item has to be TwitchHelixStreams\Model\Streams\QueryParameter but string given'
        );

        $queryParameter = ['string'];

        new QueryParameterCollection(
            $queryParameter,
            new First(20),
            new After('cursorAfter')
        );
    }

    public function testObjeczParameter(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(
            sprintf(
                'item has to be %s but %s given',
                QueryParameter::class,
                QueryParameterCollection::class
            )
        );

        $queryParameter = [new QueryParameterCollection([])];

        new QueryParameterCollection(
            $queryParameter,
            new First(20),
            new After('cursorAfter')
        );
    }
}
