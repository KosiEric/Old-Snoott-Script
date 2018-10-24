<?php

session_start();


if(isset($_POST['data']) AND !empty($_POST['data'])){

  $data = json_decode($_POST['data'] , true);
  $_SESSION['new_ad'] = $data;

echo "ok";

}

else {
  echo "shit";
}
?>
