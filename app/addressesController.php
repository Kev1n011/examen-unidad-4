<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'add_client':
            $address = new AddressesController;
            $add_address = $address->add_address($_POST['first_name'], $_POST['last_name'], $_POST['street_and_use_number'], $_POST['postal_code'], $_POST['city'], $_POST['province'], $_POST['phone_number'], "1", $_POST['client_id']);

            header("refresh: 0");

            exit;

    }
}

class AddressesController
{
    public function add_address($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('first_name' => 'juanito','last_name' => 'leon','street_and_use_number' => '16 de septiembre #123','postal_code' => '23000','city' => 'La Paz','province' => 'Baja California Sur','phone_number' => '6120000000','is_billing_address' => '1','client_id' => '8'),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $_SESSION['user_data']['token'] . ''
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

}
?>