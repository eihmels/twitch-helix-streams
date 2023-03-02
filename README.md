![example workflow](https://github.com/eihmels/twitch-helix-streams/actions/workflows/phpUnit.yml/badge.svg)

# twitch-helix-streams
implements the Twitch Api "GET https://api.twitch.tv/helix/streams"

you can find a complete Documentation of this Api [here](https://dev.twitch.tv/docs/api/reference/#get-streams)

# requirements

* ```>= PHP 8.1```

# Get Started

please take a look into the examples folder. change your credentials and tryit.

you will get a StreamCollection from the GetStreams class, looks like  this:

```
StreamCollection:
    Streams[] streams;
    Pagination pagination
```

## Streams

a Representation of one single stream with all Information from The Api. looks like this:

```
        Stream:
            StreamIdentifier streamIdentifier,
            UserIdentifier userIdentifier,
            UserLogin userLogin,
            UserName userName,
            Type type,
            Title title,
            Tags tags,
            ViewerCount viewerCount,
            StartedAt startedAt,
            Language language,
            ThumbnailUrl thumbnailUrl,
            TagIdentifiers tagIdentifiers,
            IsMature isMature
```

please take a look in the [Twitch Streams Documentation](https://dev.twitch.tv/docs/api/reference/#get-streams) about this.

## Querys

you can Query the Streams with the Queryparameters in a QueryParameterCollection:

Available QueryParameters:

* Language
* GameIdentifiers
* UserIdentifier
* UserLogin
* Type