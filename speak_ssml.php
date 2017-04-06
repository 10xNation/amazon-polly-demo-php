<?php


$speech = [

  'Text' => '
    <speak>
    Hi! My name is Emma.
    Welcome to the Amazon Polly demo at <say-as interpret-as="spell-out">PHP</say-as> <w role="ivona:NN">Las Vegas</w>.
    Today is <say-as interpret-as="date">????0406</say-as>
    </speak>',

  'OutputFormat' => 'mp3',
  'TextType' => 'ssml',
  'VoiceId' => 'Emma'

];

$config = [
  'version' => 'latest',
  'region' => 'us-west-2',
  'credentials' => [ // PHP_Demo
    'key' => 'XXXXXXXXXXXXXXXXXXXX',
    'secret' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
  ]
];


require(__DIR__.'/vendor/autoload.php');

use Aws\Polly\PollyClient;


// get service handle
try {$client = new PollyClient($config);}
catch(Exception $e) {print_r($e); exit;}

// get speech
$response = $client->synthesizeSpeech($speech);

// save response file
file_put_contents('ssml.mp3', $response['AudioStream']);

// DEBUG
//print_r($response); exit;
