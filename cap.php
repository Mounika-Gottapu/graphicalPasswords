<?php

$curlx = curl_init();

curl_setopt($curlx, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($curlx, CURLOPT_HEADER, 0);
curl_setopt($curlx, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlx, CURLOPT_POST, 1);

$post_data =
    [
        'secret' => '6LdyCKkjAAAAADnUQe0e1LWsLT_bwu6rz0bdReVn',
        //<--- your reCaptcha secret key
        'response' => $_POST['g-recaptcha-response']
    ];

curl_setopt($curlx, CURLOPT_POSTFIELDS, $post_data);

$resp = json_decode(curl_exec($curlx));

curl_close($curlx);

if ($resp->success) {
    //success!
} else {
    // failed
    echo "error";
    exit;
}