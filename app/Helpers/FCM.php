<?php

function sendNotificateion($notification, $to)
    {
        $api_key = "AAAAN1ZC7h4:APA91bH1LbHWfJHOda-WPoFbcluxcNsYQkG330e0bRlqxeCVkSfKZfnWvEWlde9dM7dzj397M9XERxktvFa4LdlsE9WzsYmSi60bvN1RH-lgLZ1QHNsbvIPEcGCbs5AziRENjHF8Y8OL";
        $url = "https://fcm.googleapis.com/fcm/send";
        $fields = json_encode(array('to' => $to, 'notification' => $notification));
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ($fields));

        $headers = array();
        $headers[] = 'Authorization: key=' . $api_key;
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);


        return "Notification has been send.";
    }

