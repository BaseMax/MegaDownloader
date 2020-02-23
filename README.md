# MEGA Downloader

MEGA.nzmega.nz

We make secure cloud storage simple. Create an account and get 50 GB free on MEGA's end-to-end encrypted cloud collaboration platform today!


# Mega.n Downloader Script

A script to download file from Mega.n and read it. (Using PHP)

## Features

- Get file details and information
- Download the file
- Read file and Decrypt it

## Tasks

**step 1:**
make api call to mega api server get info about the file with download link
api return filename,filesize,download link
filename is encrypted string

**step 2:**
we download the encrypted file using the url returned in step 1 api response

**step 3:**
after download decrypt the file

## Sample MEGA Link

https://mega.nz/#!GF9mCC5A!yrZMIgVlNok_wE6Vl2130sTJKOGTKgvxpPjSVOwVz1Y1

**File ID:** GF9mCC5A

**File decrypt key:** yrZMIgVlNok_wE6Vl2130sTJKOGTKgvxpPjSVOwVz1Y1

### Sample API Response

```
[0] => stdClass Object
(
    [s] => 4
    [at] => gELEbMQ0rg3kEyC9sUtlORwYuQ_Kp19OMXm0Ju-u_enARPeJSc0DleBpdw_GjBIcFt8YHP_Jr_-r2Q7kywUt0w
    [msd] => 1
    [tl] => 0
    [g] => https://gfs270n062.userstorage.mega.co.nz/dl/NcL3FDKCLMnG7gLizKAJNyhehZe5cNgHTl5h0ceS0DHL8okSJCeRPnbvBWgz63oA1m-PTVG24rSrAK5U47pPuFcxMXbVvHpwXvSiuhUyfHnXvu9vI_pHLBYUZfsbJA
)
```

File link at top object is expired!

## MEGA API Structure

- at=attributes means contains filename etc
- s=size of file
- g=dl link
- at=file attributes it may contain other info also not only filename

## Call API Using CURL

**File ID:** GF9mCC5A

**API URL:** https://g.api.mega.co.nz/cs

```
curl -X POST -d '[{"a":"g","v":2,"p":"GF9mCC5A","ssl":2,"g":1}]'  -v https://g.api.mega.co.nz/cs
```

Response:

```
* About to connect() to g.api.mega.co.nz port 443 (#0)
*   Trying 31.216.147.135...
* Connected to g.api.mega.co.nz (31.216.147.135) port 443 (#0)
* Initializing NSS with certpath: sql:/etc/pki/nssdb
*   CAfile: /etc/pki/tls/certs/ca-bundle.crt
  CApath: none
* SSL connection using TLS_ECDHE_RSA_WITH_AES_256_GCM_SHA384
* Server certificate:
* 	subject: CN=*.api.mega.co.nz,OU=PremiumSSL Wildcard,O=Mega Limited,STREET="15, Pwc Tower, 188 Quay Street,",L=Auckland,ST=Auckland,postalCode=1010,C=NZ
* 	start date: Dec 11 00:00:00 2017 GMT
* 	expire date: Dec 10 23:59:59 2020 GMT
* 	common name: *.api.mega.co.nz
* 	issuer: CN=COMODO RSA Organization Validation Secure Server CA,O=COMODO CA Limited,L=Salford,ST=Greater Manchester,C=GB
> POST /cs HTTP/1.1
> User-Agent: curl/7.29.0
> Host: g.api.mega.co.nz
> Accept: */*
> Content-Length: 46
> Content-Type: application/x-www-form-urlencoded
> 
* upload completely sent off: 46 out of 46 bytes
< HTTP/1.1 200 OK
< Content-Type: application/json
< Access-Control-Allow-Origin: *
< Access-Control-Allow-Headers: Content-Type, MEGA-Chrome-Antileak
< Access-Control-Expose-Headers: Original-Content-Length
< Access-Control-Max-Age: 86400
< Original-Content-Length: 296
< Content-Length: 296
< Connection: keep-alive
< 
* Connection #0 to host g.api.mega.co.nz left intact
[{"s":4,"at":"gELEbMQ0rg3kEyC9sUtlORwYuQ_Kp19OMXm0Ju-u_enARPeJSc0DleBpdw_GjBIcFt8YHP_Jr_-r2Q7kywUt0w","msd":1,"tl":0,"g":"https://gfs270n062.userstorage.mega.co.nz/dl/_MNd6LXuuwPdJgIu2rQoEGaEeQBxvOiof03QMtKqbzrlny9BYGFfn9iaqMK2ubLMWbrNhFz11YEu1_Wdm7MAXXaKyu3__FA11XeCLrhQeh3LyIDdzN0EJIsOnrSbNw"}]
```

## Tools

- libopenssl
- libsodium

## Help

### OpenSSL

- openssl_cipher_iv_length
- openssl_decrypt
- aes128_cbc_decrypt

### Sodium

- SODIUM_CRYPTO_SECRETSTREAM_XCHACHA20POLY1305_HEADERBYTES
- sodium_crypto_secretbox_open
- sodium_crypto_secretstream_xchacha20poly1305_init_pull

---------

# Max Base

My nickname is Max, Programming language developer, Full-stack programmer. I love computer scientists, researchers, and compilers. ([Max Base](https://maxbase.org/))

## Asrez Team

A team includes some programmer, developer, designer, researcher(s) especially Max Base.

[Asrez Team](https://www.asrez.com/)
