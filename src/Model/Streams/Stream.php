<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

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

final class Stream
{
    public function __construct(
        public readonly StreamIdentifier $streamIdentifier,
        public readonly UserIdentifier $userIdentifier,
        public readonly UserLogin $userLogin,
        public readonly UserName $userName,
        public readonly Type $type,
        public readonly Title $title,
        public readonly Tags $tags,
        public readonly ViewerCount $viewerCount,
        public readonly StartedAt $startedAt,
        public readonly Language $language,
        public readonly ThumbnailUrl $thumbnailUrl,
        public readonly TagIdentifiers $tagIdentifiers,
        public readonly IsMature $isMature
    ) {
    }
}
