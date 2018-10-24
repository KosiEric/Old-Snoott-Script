<?php 
$now = date('h:i:s a');
$today = date('D d M Y');
$message_header = "background-color: #10bbb3;
color: #fff;
text-align: center;
border-top-left-radius: 4px;
font-size: 18px;
padding: 4px 0px;
cursor: pointer;
border-top-right-radius: 4px;
margin-top: auto;";
$confirmation_link = "
    text-decoration: none;
  display: block;
 line-height: 25px;
  border : 1px solid #10bbb3;
  background-color : #10bbb3;
  color : #fff;
  width : 200px;
  border-radius: 5px;
  margin : auto auto;
  font-weight : normal;
  font-size: 12px;
  text-align: center;
  height : 30px;
   font-family: \"Segoe UI\",Arial,sans-serif;
";

$p = "
  margin-left: 5px;
";

$link = "
  text-decoration: none;
  color : rgba(0 , 0 , 255 , 0.8);
  text-align: center;
  //display: block;
";

$a = "
   text-decoration:none;
";
$body_style =  "

    color: dimgrey;line-height: 20px;font-family: \"Segoe UI\",Arial,sans-serif;
font-size: 14px;
width: 400px;border: 1px solid rgba(220 , 220 , 220 , 0.5);word-spacing: 3px;margin: 40px auto;padding: 0px 0px 20px 0px;background-color: #f5f8fa;border-radius: 5px;
";

$body = "
<!DOCTYPE html>
<html lang = 'en-us' dir = 'ltr'>
<head>
</head>
<body>
<div id = 'body_style' style = '{$body_style}'>
<a id = 'message-header-link' href = '{$_SERVER['HTTP_HOST']}/' title = 'Snoott.com' style = '{$a}'><h2 id = 'message_header' style = '{$message_header}'>Snoott E-mail confirmation</h2></a>

 <p style = '{$p}'>Hi <b>{$username}</b></p>
 <p style = '{$p}'>
click the link below to confirm your E-mail address.<br /><br />

<a id = 'confirmation_link' style = '{$confirmation_link}' href = 'https://{$_SERVER['HTTP_HOST']}/conf/{$token}' title = 'Password confirmation Link'>confirmation your email</a><br /><br />or copy the link below to the address bar of any browser <br /><br />
<a id = 'link' style = '{$link}' href = 'https://{$_SERVER['HTTP_HOST']}/conf/{$token}' title = 'Copy confirmation Link'>
https://{$_SERVER['HTTP_HOST']}/conf/{$token}</a>
<br /><br />

Regards. Snoott, <b style = 'color : seagreen;'>New way to discover</b>

<br /><br />

$today  $now

</p></div></body></html>";
?>
