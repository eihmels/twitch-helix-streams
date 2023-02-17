<?php

declare(strict_types=1);

namespace Validator;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use TwitchHelixStreams\Model\Streams\GameIdentifier;
use TwitchHelixStreams\Model\Streams\GameName;
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
use TwitchHelixStreams\Model\Streams\ViewerCount;
use TwitchHelixStreams\Validator\DataValidator;

final class DataValidatorTest extends TestCase
{
    /**
     * @throws AssertionFailedException
     */
    public function testEmptyArray(): void
    {
        $this->expectNotToPerformAssertions();

        DataValidator::validate([]);
    }

    public function testWithoutStreamIdentifier(): void
    {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "id"');

        DataValidator::validate(
            [
                UserIdentifier::VALUE_NAME => '1',
                UserLogin::VALUE_NAME => 'user_login',
                GameIdentifier::VALUE_NAME => '2',
                GameName::VALUE_NAME => 'valorant',
                Type::VALUE_NAME => 'type',
                Title::VALUE_NAME => 'special Title',
                Tags::VALUE_NAME => ["game", "english"],
                ViewerCount::VALUE_NAME => 123,
                StartedAt::VALUE_NAME => 1676023517,
                Language::VALUE_NAME => 'de',
                ThumbnailUrl::VALUE_NAME => 'www.thumbnail.de',
                TagIdentifiers::VALUE_NAME => ['1', '2'],
            ]
        );
    }

    public function testWithoutUseridentifier(): void
    {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "user_id"');

        DataValidator::validate(
            [
                StreamIdentifier::VALUE_NAME => '123',
                UserLogin::VALUE_NAME => 'user_login',
                GameIdentifier::VALUE_NAME => '2',
                GameName::VALUE_NAME => 'valorant',
                Type::VALUE_NAME => 'type',
                Title::VALUE_NAME => 'special Title',
                Tags::VALUE_NAME => ["game", "english"],
                ViewerCount::VALUE_NAME => 123,
                StartedAt::VALUE_NAME => 1676023517,
                Language::VALUE_NAME => 'de',
                ThumbnailUrl::VALUE_NAME => 'www.thumbnail.de',
                TagIdentifiers::VALUE_NAME => ['1', '2'],
            ]
        );
    }

    public function testWithoutUserLogin(): void
    {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "user_login"');

        DataValidator::validate(
            [
                StreamIdentifier::VALUE_NAME => '123',
                UserIdentifier::VALUE_NAME => '1',
                GameIdentifier::VALUE_NAME => '2',
                GameName::VALUE_NAME => 'valorant',
                Type::VALUE_NAME => 'type',
                Title::VALUE_NAME => 'special Title',
                Tags::VALUE_NAME => ["game", "english"],
                ViewerCount::VALUE_NAME => 123,
                StartedAt::VALUE_NAME => 1676023517,
                Language::VALUE_NAME => 'de',
                ThumbnailUrl::VALUE_NAME => 'www.thumbnail.de',
                TagIdentifiers::VALUE_NAME => ['1', '2'],
            ]
        );
    }

    public function testWithoutGameIdentifier(): void
    {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "game_id"');

        DataValidator::validate(
            [
                StreamIdentifier::VALUE_NAME => '123',
                UserIdentifier::VALUE_NAME => '1',
                UserLogin::VALUE_NAME => 'user_login',
                GameName::VALUE_NAME => 'valorant',
                Type::VALUE_NAME => 'type',
                Title::VALUE_NAME => 'special Title',
                Tags::VALUE_NAME => ["game", "english"],
                ViewerCount::VALUE_NAME => 123,
                StartedAt::VALUE_NAME => 1676023517,
                Language::VALUE_NAME => 'de',
                ThumbnailUrl::VALUE_NAME => 'www.thumbnail.de',
                TagIdentifiers::VALUE_NAME => ['1', '2'],
            ]
        );
    }

    public function testWithoutGameName(): void
    {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "game_name"');

        DataValidator::validate(
            [
                StreamIdentifier::VALUE_NAME => '123',
                UserIdentifier::VALUE_NAME => '1',
                UserLogin::VALUE_NAME => 'user_login',
                GameIdentifier::VALUE_NAME => '2',
                Type::VALUE_NAME => 'type',
                Title::VALUE_NAME => 'special Title',
                Tags::VALUE_NAME => ["game", "english"],
                ViewerCount::VALUE_NAME => 123,
                StartedAt::VALUE_NAME => 1676023517,
                Language::VALUE_NAME => 'de',
                ThumbnailUrl::VALUE_NAME => 'www.thumbnail.de',
                TagIdentifiers::VALUE_NAME => ['1', '2'],
            ]
        );
    }

    public function testWithoutType(): void
    {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "type"');

        DataValidator::validate(
            [
                StreamIdentifier::VALUE_NAME => '123',
                UserIdentifier::VALUE_NAME => '1',
                UserLogin::VALUE_NAME => 'user_login',
                GameIdentifier::VALUE_NAME => '2',
                GameName::VALUE_NAME => 'valorant',
                Title::VALUE_NAME => 'special Title',
                Tags::VALUE_NAME => ["game", "english"],
                ViewerCount::VALUE_NAME => 123,
                StartedAt::VALUE_NAME => 1676023517,
                Language::VALUE_NAME => 'de',
                ThumbnailUrl::VALUE_NAME => 'www.thumbnail.de',
                TagIdentifiers::VALUE_NAME => ['1', '2'],
            ]
        );
    }

    public function testWithoutTitle(): void
    {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "title"');

        DataValidator::validate(
            [
                StreamIdentifier::VALUE_NAME => '123',
                UserIdentifier::VALUE_NAME => '1',
                UserLogin::VALUE_NAME => 'user_login',
                GameIdentifier::VALUE_NAME => '2',
                GameName::VALUE_NAME => 'valorant',
                Type::VALUE_NAME => 'type',
                Tags::VALUE_NAME => ["game", "english"],
                ViewerCount::VALUE_NAME => 123,
                StartedAt::VALUE_NAME => 1676023517,
                Language::VALUE_NAME => 'de',
                ThumbnailUrl::VALUE_NAME => 'www.thumbnail.de',
                TagIdentifiers::VALUE_NAME => ['1', '2'],
            ]
        );
    }

    public function testWithoutTags(): void
    {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "tags"');

        DataValidator::validate(
            [
                StreamIdentifier::VALUE_NAME => '123',
                UserIdentifier::VALUE_NAME => '1',
                UserLogin::VALUE_NAME => 'user_login',
                GameIdentifier::VALUE_NAME => '2',
                GameName::VALUE_NAME => 'valorant',
                Type::VALUE_NAME => 'type',
                Title::VALUE_NAME => 'special Title',
                ViewerCount::VALUE_NAME => 123,
                StartedAt::VALUE_NAME => 1676023517,
                Language::VALUE_NAME => 'de',
                ThumbnailUrl::VALUE_NAME => 'www.thumbnail.de',
                TagIdentifiers::VALUE_NAME => ['1', '2'],
            ]
        );
    }

    public function testWithoutViewerCount(): void
    {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "viewer_count"');

        DataValidator::validate(
            [
                StreamIdentifier::VALUE_NAME => '123',
                UserIdentifier::VALUE_NAME => '1',
                UserLogin::VALUE_NAME => 'user_login',
                GameIdentifier::VALUE_NAME => '2',
                GameName::VALUE_NAME => 'valorant',
                Type::VALUE_NAME => 'type',
                Title::VALUE_NAME => 'special Title',
                Tags::VALUE_NAME => ["game", "english"],
                StartedAt::VALUE_NAME => 1676023517,
                Language::VALUE_NAME => 'de',
                ThumbnailUrl::VALUE_NAME => 'www.thumbnail.de',
                TagIdentifiers::VALUE_NAME => ['1', '2'],
            ]
        );
    }

    public function testWithoutStartedAt(): void
    {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "started_at"');

        DataValidator::validate(
            [
                StreamIdentifier::VALUE_NAME => '123',
                UserIdentifier::VALUE_NAME => '1',
                UserLogin::VALUE_NAME => 'user_login',
                GameIdentifier::VALUE_NAME => '2',
                GameName::VALUE_NAME => 'valorant',
                Type::VALUE_NAME => 'type',
                Title::VALUE_NAME => 'special Title',
                Tags::VALUE_NAME => ["game", "english"],
                ViewerCount::VALUE_NAME => 123,
                Language::VALUE_NAME => 'de',
                ThumbnailUrl::VALUE_NAME => 'www.thumbnail.de',
                TagIdentifiers::VALUE_NAME => ['1', '2'],
            ]
        );
    }

    public function testWithoutLanguage(): void
    {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "language"');

        DataValidator::validate(
            [
                StreamIdentifier::VALUE_NAME => '123',
                UserIdentifier::VALUE_NAME => '1',
                UserLogin::VALUE_NAME => 'user_login',
                GameIdentifier::VALUE_NAME => '2',
                GameName::VALUE_NAME => 'valorant',
                Type::VALUE_NAME => 'type',
                Title::VALUE_NAME => 'special Title',
                Tags::VALUE_NAME => ["game", "english"],
                ViewerCount::VALUE_NAME => 123,
                StartedAt::VALUE_NAME => 1676023517,
                ThumbnailUrl::VALUE_NAME => 'www.thumbnail.de',
                TagIdentifiers::VALUE_NAME => ['1', '2'],
            ]
        );
    }

    public function testWithoutThumbnailUrl(): void
    {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "thumbnail_url"');

        DataValidator::validate(
            [
                StreamIdentifier::VALUE_NAME => '123',
                UserIdentifier::VALUE_NAME => '1',
                UserLogin::VALUE_NAME => 'user_login',
                GameIdentifier::VALUE_NAME => '2',
                GameName::VALUE_NAME => 'valorant',
                Type::VALUE_NAME => 'type',
                Title::VALUE_NAME => 'special Title',
                ViewerCount::VALUE_NAME => 123,
                Tags::VALUE_NAME => ["game", "english"],
                StartedAt::VALUE_NAME => 1676023517,
                Language::VALUE_NAME => 'de',
                TagIdentifiers::VALUE_NAME => ['1', '2'],
            ]
        );
    }

    public function testWithoutTagIdentifiers(): void
    {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage('Array does not contain an element with key "tag_ids"');

        DataValidator::validate(
            [
                StreamIdentifier::VALUE_NAME => '123',
                UserIdentifier::VALUE_NAME => '1',
                UserLogin::VALUE_NAME => 'user_login',
                GameIdentifier::VALUE_NAME => '2',
                GameName::VALUE_NAME => 'valorant',
                Type::VALUE_NAME => 'type',
                Title::VALUE_NAME => 'special Title',
                Tags::VALUE_NAME => ["game", "english"],
                ViewerCount::VALUE_NAME => 123,
                StartedAt::VALUE_NAME => 1676023517,
                Language::VALUE_NAME => 'de',
                ThumbnailUrl::VALUE_NAME => 'www.thumbnail.de',
            ]
        );
    }

    /**
     * @throws AssertionFailedException
     */
    public function testSuccess(): void
    {
        $this->expectNotToPerformAssertions();
        DataValidator::validate(
            [
                StreamIdentifier::VALUE_NAME => '123',
                UserIdentifier::VALUE_NAME => '1',
                UserLogin::VALUE_NAME => 'user_login',
                GameIdentifier::VALUE_NAME => '2',
                GameName::VALUE_NAME => 'valorant',
                Type::VALUE_NAME => 'type',
                Title::VALUE_NAME => 'special Title',
                Tags::VALUE_NAME => ["game", "english"],
                ViewerCount::VALUE_NAME => 123,
                StartedAt::VALUE_NAME => 1676023517,
                Language::VALUE_NAME => 'de',
                ThumbnailUrl::VALUE_NAME => 'www.thumbnail.de',
                TagIdentifiers::VALUE_NAME => ['1', '2'],
            ]
        );
    }
}
