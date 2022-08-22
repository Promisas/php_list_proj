<?php
 $public_key = "6LeXYO4ZAAAAAMB26mKH2i_eTIfsp8efTc_C0Pgf";
 $private_key = "6LeXYO4ZAAAAACnokPa0XnW5z7gqWFbLG3MS65_a";
 $url = "https://www.google.com/recaptcha/api/siteverify";

 if(array_key_exists('submit_form',$_POST)) {
   $response_key = $_POST['g-recaptcha-response'];
   $response = file_get_contents($url,'?secret='.$private_key.'&response='.$response_key.'&remoteip='.$_SERVER['REMOTE_ADDR']);
   $response = json_decode($response);

   if($response->success == 1) {
     echo "string";
   } else {
     echo "not valid";
   }
 }

// echo "<pre>";print_r($response);echo "</pre>";


 ?>
<form class="" action="index.html" method="post">

  <input type="text" name="name" value="yourname">
    <input type="text" name="name2" value="yourname">
      <div class="g-recaptcha" data-sitekey="">

      </div>
</form>
