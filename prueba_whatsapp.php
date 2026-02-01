<?php
    //https://unicab.org/prueba_whatsapp.php?text=Hola esto es una prueba&phone=573158895275
    //https://app.chat-api.com/login
    
    /*if(!isset($_GET['text']) or !isset($_GET['phone'])){ die('Not enough data');}
    
    $APIurl = 'https://eu16.chat-api.com/instance222348/';
    $token = 'y6bspww2qp0udy4v';
    //echo $APIurl;
    
    $message = $_GET['text'];
    $phone = $_GET['phone'];
    
    $data = json_encode(
        array(
            'chatId'=>$phone.'@c.us',
            'body'=>$message
        )
    );*/
    
    //Esto es para enviar imágenes
    /*$data = json_encode(
        array(
            'chatId'=>$phone.'@c.us',
            'body'=>"https://unicab.org/images/admisiones.png",
            'filename'=>"admisiones.png"
        )
    );*/
    
    /*$url = $APIurl.'sendMessage?token='.$token;
    echo "<br>url=".$url;
    $options = stream_context_create(
        array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/json',
                'content' => $data
            )
        )
    );*/
    
    //$response = file_get_contents($APIurl.'sendMessage?token='.$token,false,$options);
    
    //Esto es para enviar imágenes
    //$response = file_get_contents($APIurl.'sendFile?token='.$token,false,$options);
    
    //echo "<br>respuesta ->".$response;
    
    
    
    //**************************************************************************************** ultrasmg
    //https://unicab.org/prueba_whatsapp.php
    //https://user.ultramsg.com/signin.php?lang=es
    //https://github.com/ultramsg/whatsapp-php-sdk
    
    $curl = curl_init();
    //$image="https://unicab.org/images/admisiones.png";
    $image="https://unicab.org/assets/img/slider/matriculas_unicab_2022.jpg";
    
    //Esto es para texto
    /*curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.ultramsg.com/instance2169/messages/chat",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "token=huvfxg8u4m3nbpqu&to=+573145175317&body=Prueba de envío de mensaje dos...&priority=1&referenceId=",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded"
      ),
    ));*/
    
    //Esto es para imágenes
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.ultramsg.com/instance2169/messages/image",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "token=huvfxg8u4m3nbpqu&to=+573184004412&image=".$image."&caption=Prueba envío de whatsapp con imagen desde Registro Académico&referenceId=",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }

?>