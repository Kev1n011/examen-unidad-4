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

if (isset($_POST['agregarUsuario'])) {
    if ($_POST['global_token'] == $_SESSION['global_token']) {
      $nuevo_usuario= new UserController;
      //$cover_imagen = $_FILES['cover'];
      $cover_nombre = $_FILES['cover']['name'];
      $cover_tmp = $_FILES['cover']['tmp_name'];
      //$cover_tamano = $_FILES['cover']['size'];
      //$cover_error = $_FILES['cover']['error'];
      //$cover_tipo = $_FILES['cover']['type'];
  
  
      $cover_extension = explode('.', $cover_nombre); //Separa el nombre y la extensión
      $cover_nombre_actual = strtolower(current($cover_extension));
      $cover_extension_actual = strtolower(end($cover_extension));//Obtiene el útlimo valor de $cover_extension(osea el formato ej: png) y lo pasa a minúsculas
      $extensiones_oermitidas = array('jpg', 'jpeg', 'png');
  
      //Validar si la extension coincidde con el de una imagen
      if (in_array($cover_extension_actual, $extensiones_oermitidas)) {
        $cover_nuevo = uniqid('', true) . '_' . $cover_nombre_actual . '.' . $cover_extension_actual; //Se le asigna un id unico al nombre del archivo para evitar que se repita
        $cover_folder = './uploads/' . $cover_nuevo;
        move_uploaded_file($cover_tmp, $cover_folder);
        $usuario = $nuevo_usuario->crear_usuario($_POST['firstName'], $_POST['lastname'], $_POST['email'], $_POST['phoneNumber'], $_POST['role_dropdown'],$_POST['password'], $cover_folder );
      } else {
        echo 'Archivo no permitido';
      }
      echo $_FILES['cover']['name'];
      header("location: " . BASE_PATH . "users/user_list/");
      exit();
  
    } else {
      echo 'El token no coincide';
      echo 'Session: ' . $_SESSION['global_token'];
      echo 'POST: ' . $_POST['global_token'];
    }
  
  }
class UserController
{
    public function obtener_datos()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/' . $_SESSION['user_id'] . '',
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
            CURLOPT_POSTFIELDS => 'name=' . $name . '&lastname=' . $lastname . '&phone_number=' . $phone_number . '&role=' . $role . '&id=' . $id . '',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer ' . $_SESSION['user_data']['token'] . ''
            ),
        ));

        $_SESSION['user_data']['name'] = $name;

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function obtener_usuarios()
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
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 971|iZMw6FU4TLrXEtIDdzuaqosqU1Piq0o14lX2Jdy3'
            ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response, true);


        if (isset($response['code']) && $response['code'] > 0) {
            return $response['data'];

        } else {
            return [];
        }



    }

    public function crear_usuario($name, $lastname, $email, $phone_number, $role, $password, $cover)
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
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('name' => $name, 'lastname' => $lastname, 'email' => $email, 'phone_number' => $phone_number, 'created_by' =>  $_SESSION['user_data']['name']." ". $_SESSION['user_data']['lastname'], 'role' => $role, 'password' => $password, 'profile_photo_file' => new CURLFILE($cover)),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['user_data']['token'] . '',
                'Cookie: XSRF-TOKEN=eyJpdiI6IkQ3NFYwbEdsNW9yQXlPb3ZnUzZvK3c9PSIsInZhbHVlIjoiR09hS05RNXJJZERWSGZBbmhNS2J5ZmxyWVpyTFpBUVMzNSttS1JxbGVEbzg0ODVOWXIzV0hRcWZLbWR5K3dOVHhKRS9wU2h6eHdSbUFkdUVTQjN0M29NS1RFWHd1dXJFVU93Rkx5TWpqRGdRNEZWbi93QW5RU3J0Z0xSSzhEQkkiLCJtYWMiOiIyMTY5M2E5N2ZiOTllZjkyNmI1OWU1ODcwZWZhODI1YzEwNTViM2U4MzRmMjFkYmJhZjBmYzdmMGNkOTllMDkxIiwidGFnIjoiIn0%3D; apicrud_session=eyJpdiI6ImJHME1nTzlvaXUzdXhlMVMzdVZrY0E9PSIsInZhbHVlIjoienhpU3BiWVNzbjBZMWw0R2hxc2xMdHNwM1RPZEorY1RnUXlYVW84MUZBTzc1b1NUcTNyZHI2b01jb09Ic29wbGxLalo2MDR4VWd0V0RqSTBQM1oyVzdpQUFZS2lGZW11SE9POEthM203d1FEYVFsalE2ZTNxQmR0QUp4WmdTaDgiLCJtYWMiOiI5OWZmZjM5OTBiYjhkZTFlZWJhYmViNDM2NTYwYjE2NmQ3MjhmNzVhNjFjYmI4NGZmMTE3NDU2ODQ5OTE5OTQzIiwidGFnIjoiIn0%3D'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }
}
?>