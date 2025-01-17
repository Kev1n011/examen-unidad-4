<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class LevelController
{
    public function get_levels()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/levels/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['user_data']['token'].'',
            'Cookie: XSRF-TOKEN=eyJpdiI6ImZiM2wwTUF3VzFTeTdudTk5MUlsd2c9PSIsInZhbHVlIjoiQmhTa0pJTWcyWjZ3dGNRaXhnQmkzdG1hZStZSUZUekx1dnREMTdEZ2k4M3FiOUhha0x2QjhGMHJlWlVnUG1ueDBRbGJ2NEM4OFVGUDBUaUhieVR3VTJsbnJLSndpL2tkMTlIbll2RnBqTzFvZk9aZzdwNDRIeTdmc0lSUThFVlIiLCJtYWMiOiJjN2UxMzg0OTA3NDE2ODE0YThiM2Y5YmRlNzk1MWM0NjUxNTYxN2I5MDcxM2M4ZmQxMGExYWE0YTc2YThhMmQ2IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6ImZFWkxOR0JmT2NoRzZWOVZqbUhiU2c9PSIsInZhbHVlIjoidjBWTHpDRmk3RHFPdFFBZzhic3ZmcFl0TUdENjZwRVU2STM5WXNwelpjN0h4VXVXU0ZkUGQrcDl2RlVEV01KL1lWY3UvYkhyNENycWlIbmZMZ2VibERybDU4VktRTHVkUGtFa1FIdmhjVE5hMUFEWVI3UmxqWGtmUjBMN3JIK3QiLCJtYWMiOiIwMDI1OGU0YmI5ODlmZWNhNGMzN2JmODMwMDgyZTQzOGM1MTdkMGE5NmI1OGFkZmVmMDExM2E0OTQ5OGRkNDMyIiwidGFnIjoiIn0%3D'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response, true);

        if (isset($response['code']) && $response['code'] > 0) {


            return $response['data'];

        } else {
            return [];
        }
    }
}

?>