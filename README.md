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

**Key ID:** yrZMIgVlNok_wE6Vl2130sTJKOGTKgvxpPjSVOwVz1Y1

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
