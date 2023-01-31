<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model;

use TwitchHelixStreams\Model\Streams\Language;
use TwitchHelixStreams\Model\Streams\StartedAt;
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
        public readonly bool $isMature
    ) {}
}