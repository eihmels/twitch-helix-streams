<?php


use GuzzleHttp\Client;
use TwitchHelixStreams\Client\TwitchHelix;
use TwitchHelixStreams\GetStreams;
use TwitchHelixStreams\Model\Pagination\After;
use TwitchHelixStreams\Model\Pagination\First;
use TwitchHelixStreams\Model\QueryParameters\QueryParameterCollection;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$client = new TwitchHelix('https://api.twitch.tv', '/helix/streams', '<yourClientId>', new Client());

$application = new GetStreams($client);

var_dump(
    $application->execute(
        '<yourToken>',
        new QueryParameterCollection(
            [],
            new First(2),
            new After('eyJiIjp7IkN1cnNvciI6ImV5SnpJam95TURRNU5qWXVPREF6TWpJNE1qSTVMQ0prSWpwbVlXeHpaU3dpZENJNmRISjFaWDA9In0sImEiOnsiQ3Vyc29yIjoiZXlKeklqbzFOVGMwTXk0ME1EVTFNamsxTkRnMU56UXNJbVFpT21aaGJITmxMQ0owSWpwMGNuVmxmUT09In19')
        )
    ));

