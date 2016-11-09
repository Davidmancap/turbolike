<?php
/*

Made by David Mancap
David Mancap tidak bertanggung jawab atas segala penggunaan script ini, sepenuhnya script ini adalah tanggung jawab pengguna.
David Mancap tidak bertanggung jawab atas dosa yang mungkin terjadi akibat script ini
Script ini dibuat untuk pembelajaran, penyalah gunaan script ini bukanlah tanggung jawab David Mancap
*/
error_reporting(0);
set_time_limit(360);
$id = "";
$mac = "";

$mac = urlencode($mac);
$mancap = ambil($id);

// Random shuffle
shuffle($mancap);
$mediaidnya = $mancap[0]['id'];
$hasil = tambah($mediaidnya, $id);
print_r($hasil['meta']['balance']);
function ambil($id){
	global $mac;
	$url = 'http://www.boost4social.com/ig/getmedias';
$myvars = 'appID=4682288570826752&deviceAdsID=205aad4e8-57fa-4337-bf4e-3988d6b6cec6&deviceCategory=2&deviceIMEI=&deviceMAC='. $mac .'&deviceNativeID1=0022FBA3FFCE0200&deviceSerialNumber=nox&timestamp=1478599926&trackAppVersion=2.11&userID=' . $id;

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
  $result = json_decode($response, true);
return $result['data'];
}

function tambah($medid, $id){
	global $mac;
	$url = 'http://www.boost4social.com/ig/addlike';
$myvars = 'appID=4682288570826752&deviceAdsID=205aa4e8-57fa-4337-bf4e-3988d6b6cec6&deviceCategory=2&deviceIMEI=&deviceMAC='. $mac .'&deviceNativeID1=0022FBA8FFCE0000&deviceSerialNumber=nox&mediaID=' . $medid . '&timestamp=1478599926&trackAppVersion=2.11&userID=' . $id;

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
  $result = json_decode($response, true);
return $result;
}
?>
