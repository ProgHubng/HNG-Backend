<?php
$visitor_name = isset($_GET['visitor_name']) ? htmlspecialchars($_GET['visitor_name']) : 'Heliphem';
$client_ip = $_SERVER['REMOTE_ADDR'];
// $location = "New York";
$temperature = 11;

$query = @unserialize(file_get_contents('http://ip-api.com/php/' . $client_ip));
if ($query && $query['status'] == 'success') {
    $location =  $query['city'];
}


$response = [
    'client_ip' => $client_ip,
    'location' => $location,
    'greeting' => "Hello, $visitor_name!, the temperature is $temperature degrees Celsius in $location"
];
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

echo json_encode($response);
