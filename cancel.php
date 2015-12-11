<?php

$token = "e2985d91341c059600f7546c5577f5b4a6b767e5"; // replace this with your token key
$url = 'http://test.delhivery.com/api/p/edit';

$params = array(); // this will contain request meta and the package feed
$package_data = array(); // package data feed

$package_data['cancellation'] = true;
//$package_data['phone'] = "9510358934";
//$package_data['address'] = "asdd";
$package_data['waybill'] =  '328410030133';
///$package_data['name'] = "Test";


$data['format'] = 'json'; // input data format
$data['data'] = ($package_data);

$params=json_encode($package_data);
//print_r($params);
//$header[] = "Content�Type: application/json";
$header[] = "Authorization: Token ".$token."";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt( $ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data['data']));
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 curl_setopt($ch, CURLOPT_PROXYPORT, '8080');
                            curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
                            curl_setopt($ch, CURLOPT_PROXY, '192.168.10.5');

$result = curl_exec($ch);
print_r(curl_error($ch));
print_r($result);exit;
curl_close($ch);
//print_r(curl_error($ch));