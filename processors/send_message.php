<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
$request_method = $_SERVER['REQUEST_METHOD'];
//header('Content-type:application/json');
//error_reporting(false);
if($request_method != "POST") {
  die();
}
  class sendMessage  {
private $fullname;
private $from;
private $phone;
private $message;
private $id;
private $to;
private $username;
private $ID;
public function __toString() {
if($this->isReady() AND $this->isToken()) {
if($this->insertMessage()) {

$report_array = Array("success" => 1 , "error" => "message sent");
return json_encode($report_array);
}

else {
$report_array = Array("success" => 0 , "error" => "sending failed");
return json_encode($report_array);

}
}
else {
$report_array = Array("success" => 0 , "error" => "sending failed");
return json_encode($report_array);
}
}

private function isReady() {

  if(isset($_POST['data']) AND !empty($_POST['data'])) {
    $data = json_decode($_POST['data'] , true);
    $this->fullname = $data['fullname'];
    $this->from = $data['from'];
    $this->phone = $data['phone'];
    $this->message = $data['message'];
    $this->id = $data['id'];
    $this->to = $data['to'];
    $this->username = $data['username'];
    return true;
  }
  else {
    return false;
  }
}
private function generateID () {

  $letters = Array("A" , "B" , "C" , "D" , "E" , "F" , "G" , "H" ,  "I" , "J" , "K" ,"L" ,"M" ,"N" ,"O" ,"P" ,"Q" ,"R" ,"S" , "T" ,
"U" ,"V" ,"W" ,"X" ,"Y" ,"Z" ,"a" ,"b" ,"c" ,"d" ,"e" ,"f" ,"g" ,"h" ,"i" ,"j" ,"k" ,"l" ,"m" ,"n" ,"o" ,
"p" ,"q" ,"r" ,"s" ,"t" ,"u" ,"v" ,"w" ,"x" ,"y" ,"z" ,"0" ,"1" ,"2" ,"3" ,"4" ,"5" ,"6" ,"7" ,"8"
, "9" , "-" , "_");

$random_string = "";
$string_length = count($letters);
for($i = 0; $i < 15; $i++) {
$random_string.= $letters[rand(0 , $string_length-1)];

}

return $random_string;
}


private function  isToken () {

   $token = $this->generateID();
    $this->ID = $token;
    //return ($token == $this->token);
    $conn = mysqli_init();
    if(mysqli_real_connect ($conn , HOST , USER , PASSWORD , DB )){

        $query = "SELECT message_id FROM messages WHERE message_id = '{$token}'";
        if($run = mysqli_query($conn , $query)) {

            $num_rows = mysqli_num_rows($run);

            if($num_rows == 0){
                 return true;

            }

            else {

                $this->isToken();

            }
        }
    }

}
private function insertMessage () {
  $time = time();
  $today = date('D d M Y h:i:s a');
  $conn = mysqli_init();
  if(mysqli_real_connect($conn , HOST , USER , PASSWORD , DB)) {
    $message = mysqli_real_escape_string($conn , $this->message);
     $fullname = mysqli_real_escape_string($conn , ucfirst($this->fullname));
      $sql = "INSERT INTO messages (`message_id` , `read_status` , `message_from` , `message_to` , `message` , `username` , `fullname` , `phone` , `message_time` , `message_date` , `ad_id`)
      VALUES ('{$this->ID}' , 'unread' , '{$this->from}' , '{$this->to}' , '{$this->message}' , '{$this->username}' , '{$this->fullname}' , '{$this->phone}' ,
      '{$time}' , '{$today}' , '{$this->id}')";
    if($query = mysqli_query($conn , $sql)) {
return true;

    }

    else {
      return false;
    }
  }

}

}

$send_message = new sendMessage();
echo $send_message;
 ?>
