<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'action':
            $user = new UserController;
            $update_data = $user->user_update($_POST['name'], $_POST['lastname'], $_POST['phone_number'], $_POST['role'], $_POST['id']);
            
            header("Location: " . BASE_PATH . "my_account/" . str_replace(' ', '-', $_SESSION['user_data']['name']));
            exit; 
    }
}
class UserController
{
    public function obtener_datos()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/'.$_SESSION['user_id'].'',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 38|BlPdbiUNy96CLf3MfJ2qFzRqfMiWmgvq3CRVg9Mv'
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

    public function user_update($name, $lastname, $phone_number, $role, $id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'name='. $name .'&lastname='. $lastname .'&phone_number='. $phone_number .'&role='. $role .'&id='. $id .'',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer 38|BlPdbiUNy96CLf3MfJ2qFzRqfMiWmgvq3CRVg9Mv'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}
?>