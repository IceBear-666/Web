<?php
function encode_rsa($src){
 $public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDGEAT86w6ekz89AZpMl8prZL5g
zj+68nLZKI/J4JBLxoy9EYXNT8fczxb9SUJ78cDCtoN1zVhextTnCs6aIr2M6RU4
AcCyAYx5BjMTmgpjdYmNOyU9urLRqUrvjiOcDmDS6qQARxE+4N7S1zOgApqtFeL3
ByZo3V4MBiJ4BN5fEQIDAQAB
-----END PUBLIC KEY-----';

//echo $private_key;
$pu_key = openssl_pkey_get_public($public_key);//这个函数可用来判断公钥是否是可用的	
    $ret =	openssl_public_encrypt($src,$encrypted,$pu_key);//公钥加密
	$encrypted = base64_encode($encrypted);
         
        return $encrypted;

}


function decode_rsa($encrypted){
$private_key = '-----BEGIN RSA PRIVATE KEY-----
MIICeAIBADANBgkqhkiG9w0BAQEFAASCAmIwggJeAgEAAoGBAMYQBPzrDp6TPz0B
mkyXymtkvmDOP7ryctkoj8ngkEvGjL0Rhc1Px9zPFv1JQnvxwMK2g3XNWF7G1OcK
zpoivYzpFTgBwLIBjHkGMxOaCmN1iY07JT26stGpSu+OI5wOYNLqpABHET7g3tLX
M6ACmq0V4vcHJmjdXgwGIngE3l8RAgMBAAECgYEAm3yN/eOmKXUdKw5sDH8JSL/g
+OxRebjF0pcWMnyZqvMnH3J3IRPlqgHlYVg22kiSdAmGMF/RZS4gi3Sfdr+ZH3ld
kMA3yCj+9PBmnRapPUeDKQK8ED3z+0XRlC/Btx54SsR/vUTSG0NhKIf/LYRKmxT5
bzV5MQAyGsZ3NhTYZXECQQDnDFKG02UzWXidiv9cgLmI4etD/iMw0zlIAKsaQyiL
1yaLkSADHL5Y82LFgu2gHlpMsA9K6kfdrPi/mqVqyCCNAkEA23PC2D7WKyWITRfE
uIIQ5l5BxM/sOoxPJGgtSeLvTAadUM47JUrWN3+pkE+WJlFQ0Ah0q5vWCVMHHywK
kcZhlQJAfRKhlhTXgr2bWoVFCTkxtpS9u9fWCvc82epqtVPHnjPAzOqpzqV/sT1H
qa3fnr7vmPXxwVcjwi+BlI9NnolpfQJBAJnr7Psdv7wNnDdud2VunQnnjLvNloRO
S2hexX0wdeVeMlMuA2AZyHyuxzDYEZmYqVTwyVxgdlSd7r3XdyZd/a0CQQDNAi8W
rF23CYmk/2CYrfQOO5fol8ORVqgqUBXVb+hrq4Or9NXuYXBIKWjTVT9vo8hexrRp
uGpVbN9rFxHyJ0dt
-----END RSA PRIVATE KEY-----';

$pi_key =  openssl_pkey_get_private($private_key);//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id


openssl_private_decrypt(base64_decode($encrypted),$decrypted,$pi_key);//私钥解密

return $decrypted;
}


