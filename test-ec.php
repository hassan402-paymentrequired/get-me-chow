<?php
$key = openssl_pkey_new([
    "private_key_type" => OPENSSL_KEYTYPE_EC,
    "curve_name" => "prime256v1"
]);

if ($key === false) {
    echo "Failed to create EC key\n";
    print_r(openssl_error_string());
} else {
    echo "EC key generated successfully\n";
}
