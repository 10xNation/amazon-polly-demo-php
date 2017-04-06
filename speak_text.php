<?php


$speech = [

  'Text' => 'Hi! My name is Emma. Welcome to the Amazon Polly demo at PHP Las Vegas.',
  'OutputFormat' => 'mp3',
  'TextType' => 'text',
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
file_put_contents('text.mp3', $response['AudioStream']);

// DEBUG
//print_r($response); exit;
