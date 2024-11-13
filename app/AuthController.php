<?php
include_once dirname(__DIR__) . '/app/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (isset($_POST['enviar'])) {
    if ($_POST['global_token'] == $_SESSION['global_token']) {
        switch ($_POST['enviar']) {
            case 'enviar':
                $username = $_POST['username'];
                $password = $_POST['password'];

                $login = new AuthController();
                $login->validar($username, $password);
                break;
            case 'logout':
                $logout = new AuthController();
                $logout->logout($_SESSION['user_data']['email']);
                break;    
        }

    } else {
        echo 'falta el token';
    }


}

class AuthController
{
    public function validar($username, $password)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $username, 'password' => $password),
        ));

        $response = curl_exec($curl);

        $response = json_decode($response, true);

        if (isset($response['data'])) {
            $_SESSION['logeado'] = true;
            print_r(value: $response);
            $_SESSION['user_id'] = $response['data']['id'];
            $_SESSION['user_data'] = $response['data'];
            header("location: " . BASE_PATH . "home");
        } else {
            echo "credenciales no validas";
        }

        curl_close($curl);

    }

    public function logout($email)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/logout',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => ''.$email.''),
            CURLOPT_HTTPHEADER => array(
                 'Authorization: Bearer '.$_SESSION['user_data']['token'].''
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        session_destroy();
        header("location: " . BASE_PATH);
    }
}
?>