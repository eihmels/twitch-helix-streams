<?php


use GuzzleHttp\Client;
use TwitchHelixStreams\Model\Client\TwitchHelix;
use TwitchHelixStreams\Model\QueryParameters\QueryParameterCollection;
use TwitchHelixStreams\Model\Streams\UserLogin;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$client = new TwitchHelix('https://api.twitch.tv', '/helix/streams', ' 16jlv7ech4sz2w6osxlain5zlydr6w', new Client());

$result = $client->streamsRequest('a9pmq2b747hrou716efvhw2udm55us', new QueryParameterCollection([new UserLogin('bonjwa')]));


print_r($result->getBody()->getContents());

