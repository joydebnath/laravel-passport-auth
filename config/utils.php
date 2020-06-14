<?php
return [
    'web_password_grant_client' => [
        'id' => env('Web_Password_Grant_Client_ID'),
        'secret' => env('Web_Password_Grant_Client_SECRET'),
    ],
    'android_password_grant_client' => [
        'id' => env('Android_Password_Grant_Client_ID'),
        'secret' => env('Android_Password_Grant_Client_SECRET'),
    ],
    'ios_password_grant_client' => [
        'id' => env('IOS_Password_Grant_Client_ID'),
        'secret' => env('IOS_Password_Grant_Client_SECRET'),
    ],
];