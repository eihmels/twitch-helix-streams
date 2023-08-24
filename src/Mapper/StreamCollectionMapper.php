<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Mapper;

use Assert\AssertionFailedException;
use TwitchHelixStreams\Model\Streams\Stream;
use TwitchHelixStreams\Model\Streams\Stream\IsMature;
use TwitchHelixStreams\Model\Streams\Stream\Language;
use TwitchHelixStreams\Model\Streams\Stream\StartedAt;
use TwitchHelixStreams\Model\Streams\Stream\StreamIdentifier;
use TwitchHelixStreams\Model\Streams\Stream\TagIdentifiers;
use TwitchHelixStreams\Model\Streams\Stream\Tags;
use TwitchHelixStreams\Model\Streams\Stream\ThumbnailUrl;
use TwitchHelixStreams\Model\Streams\Stream\Title;
use TwitchHelixStreams\Model\Streams\Stream\Type;
use TwitchHelixStreams\Model\Streams\Stream\UserIdentifier;
use TwitchHelixStreams\Model\Streams\Stream\UserLogin;
use TwitchHelixStreams\Model\Streams\Stream\UserName;
use TwitchHelixStreams\Model\Streams\Stream\ViewerCount;
use TwitchHelixStreams\Model\Streams\StreamCollection;
use TwitchHelixStreams\Validator\DataValidator;
use TwitchHelixStreams\Validator\ResponseValidator;

final class StreamCollectionMapper
{
    /**
     * @throws AssertionFailedException
     */
    public static function mapStreamFromArray(array $response): StreamCollection
    {
        ResponseValidator::validate($response);

        $streamCollection = new StreamCollection([]);

        foreach ($response[ResponseValidator::DATA] as $item) {
            DataValidator::validate($item);

            $streamCollection->add(
                new Stream(
                    new StreamIdentifier($item[StreamIdentifier::VALUE_NAME]),
                    new UserIdentifier($item[UserIdentifier::VALUE_NAME]),
                    new UserLogin($item[UserLogin::VALUE_NAME]),
                    new UserName($item[UserName::VALUE_NAME]),
                    new Type($item[Type::VALUE_NAME]),
                    new Title($item[Title::VALUE_NAME]),
                    TagMapper::mapTagsFromArray($item[Tags::VALUE_NAME]),
                    new ViewerCount($item[ViewerCount::VALUE_NAME]),
                    StartedAt::createFromString($item[StartedAt::VALUE_NAME]),
                    new Language($item[Language::VALUE_NAME]),
                    new ThumbnailUrl($item[ThumbnailUrl::VALUE_NAME]),
                    TagIdentifiersMapper::mapTagIdentifiersFromArray($item[TagIdentifiers::VALUE_NAME]),
                    new IsMature((bool)$item[IsMature::VALUE_NAME])
                )
            );
        }


        $streamCollection->setPagination(PaginationMapper::mapFromArray($response[ResponseValidator::PAGINATION]));

        return $streamCollection;
    }
}
