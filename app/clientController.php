<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'add_client':
            $client = new ClientController;
            $add_client = $client->add_client($_POST['name'], $_POST['email'], $_POST['password'], $_POST['phone_number'], "1", "1");

            header("refresh: 0");

            exit;
        case 'update_client':
            $client = new ClientController;
            $update_client = $client->update_client($_POST['name'], $_POST['email'], $_POST['phone_number'], "1", $_POST['level_id'], $_POST['client_id']);

            header("refresh: 0");
            exit;
        case 'delete_client':
            $client = new ClientController;
            $delete_client = $client->delete_client($_POST['client_id']);

            header("refresh: 0");
            exit;
        case 'client_details':
            header("Location: " . BASE_PATH . "clients/client_details/" . $_POST['client_id']);
            exit;

    }
}

class ClientController
{
    public function get_clients()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['user_data']['token'] . ''
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

    public function add_client($name, $email, $password, $phone_number, $is_suscribed, $level_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('name' => ''.$name.'','email' => ''.$email.'','password' => ''.$password.'','phone_number' => ''.$phone_number.'','is_suscribed' => ''.$is_suscribed.'','level_id' => ''.$level_id.''),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $_SESSION['user_data']['token'] . ''
        ),
        ));

        $response = curl_exec($curl);

        return $response;
    }

    public function update_client($name, $email, $phone_number, $is_subscribed, $level_id, $client_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 'name='.$name.'&email='.$email.'&phone_number='.$phone_number.'&is_suscribed='.$is_subscribed.'&level_id='.$level_id.'&id='.$client_id.'',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer ' . $_SESSION['user_data']['token'] . ''
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function delete_client($client_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/'.$client_id.'',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $_SESSION['user_data']['token'] . ''
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function client_details($client_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/'.$client_id.'',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $_SESSION['user_data']['token'] . '',
            'Cookie: XSRF-TOKEN=eyJpdiI6IkpDUjZqMTh1Z2JsVWZ2N3JaSElob1E9PSIsInZhbHVlIjoiSTUxVlduWkc5TGVEWmkycVBUaDRQcE1HcklyczQ0VFVCNmtHbHhUY0F5eFlET1pUUFNudFNwM0MxTW56dXI5NFJZdktsWGhRRGw0bDVNRlQySGIxcjlxeVlZR1g4c3Voa3BGWUVQSnYrKy91T2JPS0VWVFo4TGxrU0l1NUdzQ1MiLCJtYWMiOiJmMTgwMjkwY2FjY2U4NjgwYmFkMDFiMjBlZDdhZGEwOWFhYjNjZTA5MDcxMDkzMDdlYjk1ZjAyNDRhNDZhNzI5IiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6Ii9ORG02SG9qZThjOUU3K1F6SmZOUkE9PSIsInZhbHVlIjoiVUNZbG5wUFB5dndjRDI5MlQ3bkxiZ3FvOFZFM0xFR0hKNzN2RWs0ckRKbXRwWE51Y2FkU0tadGpVL3MvTHdTY29zQUdlN0ZPOXpPbDFwUGtSOEYwM1FzeUVuRWtnSDVqeGdlOTd5M1l2UDM5R0xES2lXbnQ4QU5BbDAxZ2JqSkkiLCJtYWMiOiJiOTgwMDdmNDg1ZWMyNTI1NzJjMzg5YmNiYmU1ZDg0NzgxNGQ1NzMzNTIyMmIxYjNiZThjYTEzYzdlM2Y1OGE0IiwidGFnIjoiIn0%3D'
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