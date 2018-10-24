<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/Web_Data/incs/config.php';
session_start();

if($_SERVER['REQUEST_METHOD'] != 'POST'){

    exit('ok');
}
class Logout {
    public function isReady(){
if(isset($_POST['logout']) && !empty($_POST['logout'])){

return  true;

}

else {

    return false;
}

    }

    public function LogUserOut() {
if(session_destroy()){

    return true;
}
else {

    return false;
}

    }

    public function Processor () {

        if($this->isReady()){

            if($this->LogUserOut()){

                return true;
            }
            else {

                return false;
            }
        }
    }
}

$logout = new Logout;

echo $logout->Processor();

?>