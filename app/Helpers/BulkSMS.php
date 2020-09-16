 <?php

if (!function_exists('send_sms_to_officer_concerd')) {

    function send_sms_to_officer_concerd($numbers, $message)
    {

        //Prepare you post parameters
        $postData = [
            'username' => env('BULKSMS_USERNAME'),
            'password' => env('BULKSMS_PASSWORD'),
            'message' => $message,
            'sid' => env('BULKSMS_SENDER_ID'),
            'type' => env('BULKSMS_TYPE'),
            'mno' => $numbers,
            'dcs' => env('BULKSMS_DCS')
        ];

        $data_string = json_encode($postData);
        
        // init the resource
        $channel = curl_init();

        curl_setopt_array($channel, [
            CURLOPT_URL => env('BULKSMS_SEND_URL'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
            CURLOPT_POSTFIELDS => $data_string
        ]);

        //Ignore SSL certificate verification
        curl_setopt($channel, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, 0);

        //get response
        $output = curl_exec($channel);



        if (curl_errno($channel)) {

            return ['error' => curl_error($channel), 'has_error'=> true];
        }

        curl_close($channel);

        return ['response'=> $output, 'has_error'=>false];

    }
}

if (!function_exists('get_sms_deliver_report')) {

    function get_sms_deliver_report($smscid)
    {

        // init the resource
        $channel = curl_init();

        curl_setopt_array($channel, [
            CURLOPT_URL => env('BULKSMS_DELIVERY_URL').'?smscid='.$smscid,
            CURLOPT_RETURNTRANSFER => true,
        ]);

        //Ignore SSL certificate verification
        curl_setopt($channel, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, 0);

        //get response
        $output = curl_exec($channel);

        if (curl_errno($channel)) {

            return ['error' => curl_error($channel), 'has_error'=> true];
        }

        curl_close($channel);

        return ['response'=> $output, 'has_error'=> false];

    }
}
