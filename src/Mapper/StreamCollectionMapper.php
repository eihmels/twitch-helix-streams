<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Mapper;

use Assert\AssertionFailedException;
use TwitchHelixStreams\Model\Streams\IsMature;
use TwitchHelixStreams\Model\Streams\Language;
use TwitchHelixStreams\Model\Streams\StartedAt;
use TwitchHelixStreams\Model\Streams\Stream;
use TwitchHelixStreams\Model\Streams\StreamCollection;
use TwitchHelixStreams\Model\Streams\StreamIdentifier;
use TwitchHelixStreams\Model\Streams\TagIdentifiers;
use TwitchHelixStreams\Model\Streams\Tags;
use TwitchHelixStreams\Model\Streams\ThumbnailUrl;
use TwitchHelixStreams\Model\Streams\Title;
use TwitchHelixStreams\Model\Streams\Type;
use TwitchHelixStreams\Model\Streams\UserIdentifier;
use TwitchHelixStreams\Model\Streams\UserLogin;
use TwitchHelixStreams\Model\Streams\UserName;
use TwitchHelixStreams\Model\Streams\ViewerCount;
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
                    new StartedAt($item[StartedAt::VALUE_NAME]),
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
