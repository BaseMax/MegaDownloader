<?php
$id='GF9mCC5A';
$key='yrZMIgVlNok_wE6Vl2130sTJKOGTKgvxpPjSVOwVz1Y';

$param=[];
$param['a']='g';
$param['g']='1';
$param['ssl']='2';
$param['v']='2';
$param['p']=$id;

function base64url_encode($data) {
  return strtr(rtrim(base64_encode($data), '='), '+/', '-_');
}

function str_to_a32($b) {
  // Add padding, we need a string with a length multiple of 4
  $b = str_pad($b, 4 * ceil(strlen($b) / 4), "\0");
  return array_values(unpack('N*', $b));
}

function base64url_decode($data) {
  if (($s = (2 - strlen($data) * 3) % 4) < 2) $data .= substr(',,', $s);
  return base64_decode(strtr($data, '-_,', '+/='));
}



$key_plain = base64url_decode($key);
$key=str_to_a32($key_plain);

function a32_to_str($hex) {
  return call_user_func_array('pack', array_merge(array('N*'), $hex));
}
function dec_attr($attr, $key) {
  $b = trim(aes128_cbc_decrypt($attr, a32_to_str($key)));
  if (substr($b, 0, 6) != 'MEGA{"') return false;
  return json_decode(substr($b, 4),1);
}
function aes128_cbc_decrypt($raw, $key) {
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = str_repeat("\0",$ivlen);
    return openssl_decrypt($raw,$cipher, $key,OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, $iv);
}
function aes128_cbc_decrypt1($raw, $key,$iv) {
  $ivlen = openssl_cipher_iv_length($cipher="AES-128-CTR");
  //$iv = str_repeat("\0",$ivlen);
  return openssl_decrypt($raw,$cipher, $key,OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, $iv);
}

print_r($key);

//var_dump(openssl_get_cipher_methods());

$m=mega('',json_encode([$param]));
print_r($m);
$enc=$m[0]->at;
echo  $enc;
$enc=base64url_decode($enc);

$iv = array($key[4], $key[5], 0, 0);
if (count($key) != 4) {
  $key = array($key[0] ^ $key[4], $key[1] ^ $key[5], $key[2] ^ $key[6], $key[3] ^ $key[7]);
}
/*
$attributes = dec_attr($enc, $key);

var_dump($attributes);
exit;
*/

$url = $m[0]->g;
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$enc = curl_exec($curl);
curl_close($curl);
echo $enc;
var_dump($key);
//$rr=aes128_cbc_decrypt($enc,a32_to_str($key));
//var_dump($rr);

$iv = a32_to_str($iv);
$rr=aes128_cbc_decrypt1($enc,a32_to_str($key),$iv);
var_dump($rr);


exit;
$ky=a32_to_str($key);
var_dump($ky);
echo SODIUM_CRYPTO_SECRETBOX_KEYBYTES;
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
$o=sodium_crypto_secretbox_open ( $enc,$nonce , $ky.str_repeat("\0",16));
var_dump($o);

exit;

$r=mcrypt_decrypt(MCRYPT_RIJNDAEL_128, a32_to_str($key), $enc, MCRYPT_MODE_CBC, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0");
var_dump($r);
exit;
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);

var_dump($key_plain);

/*
$k = sodium_crypto_secretbox_keygen();
var_dump($k);

$secret_key = sodium_crypto_secretbox_keygen();
$message = 'Sensitive information';
var_dump($secret_key);
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
$encrypted_message = sodium_crypto_secretbox($message, $nonce, $secret_key);


$decrypted_message = sodium_crypto_secretbox_open($encrypted_message, $nonce, $secret_key);


echo $decrypted_message;
*/
$key_plain=a32_to_str($key);
$o=sodium_crypto_secretbox_open ( $enc,$nonce ,$key_plain );
var_dump($o);
$o = openssl_decrypt($enc, 'AES-128-CBC', $key_plain, OPENSSL_RAW_DATA, $nonce);
var_dump($o);
function mega($path,$paramm)
{
$curl = curl_init('https://g.api.mega.co.nz/cs');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HEADER, 0);
if($paramm)
{
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $paramm);
}

$response = curl_exec($curl);
$code = curl_getinfo($curl);
curl_close($curl);
print_r($code);
echo $response;
echo $paramm;
return json_decode($response);
}

exit;

if (count($key) != 4) {
    $key = array($key[0] ^ $key[4], $key[1] ^ $key[5], $key[2] ^ $key[6], $key[3] ^ $key[7]);
  }

  $attributes = dec_attr($enc_at, $key);



// https://mega.nz/#!GF9mCC5A!yrZMIgVlNok_wE6Vl2130sTJKOGTKgvxpPjSVOwVz1Y

