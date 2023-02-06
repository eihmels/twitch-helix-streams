<?php

declare(strict_types=1);

namespace TwitchHelixStreams\Model\Streams;

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
    ) {
    }
}
