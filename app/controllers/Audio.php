<?php
class cAudio{
    function tts($string) {

        if( load('Utils')->accessCount() > 4 ): 
            die(json_encode([
                'status' => 'error',
                'message' => 'Limit Count Reached.',
                'data' => "null"
            ]));
        endif;

        // Set your API key and endpoint
        $api_key = config('openai_api_key');
        $endpoint = 'https://api.openai.com/v1/audio/speech';
    
        // Prepare the request data for speech generation
        $data = [
            'model' => 'tts-1',
            'input' => $string,
            'voice' => 'alloy'
        ];
    
        // Initialize cURL session for speech generation
        $ch = curl_init($endpoint);
    
        // Set cURL options for speech generation
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $api_key",
            "Content-Type: application/json",
        ]);
    
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        // Make the request to generate speech
        $response = curl_exec($ch);
        curl_close($ch);

        if(is_array(json_decode($response, true))){
            exit(
                json_encode([
                    'status' => 'error',
                    'message' => 'Unable to generate speech at this time. Please try again later.',
                    'data' => "null"
                ])
            );
        }
        
        exit(
            json_encode([
                'status' => 'success',
                'message' => 'Speech generated successfully.',
                'data' => base64_encode($response)
            ])
        );
    }
}