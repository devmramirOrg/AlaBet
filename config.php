<?php

//-------------------------
// Dev : @DevMrAmir
// Channel : @AlaCode
//-------------------------

//------- Sql DataBase -------
$serverName = "localhost"; // ادیت نشود
$db_name    = ""; // نام دیتابیس
$db_user    = ""; // یوزر دیتابیس
$db_pass    = ""; // پسورد دیتابیس

$conn = mysqli_connect($serverName, $db_user, $db_pass, $db_name);

if(!$conn){

    die('failed ' . mysqli_connect_error());
}
//------- Data -------
$token        = ""; // توکن ربات
$admin        = "544316811"; // عددی ادمین
$admin2       = "544316811"; // ادمین دوم
$admin3       = "544316811"; // ادمین سوم
$nitro        = "544316811"; // ایدی عددی حسابی که نیترو سین بهش واریز شه
$bot_id       = "@PvSeenRoBot"; // ایدی ربات با @
$channel_bot  = "AlaCode"; // ایدی کانال
$zarib_dasti2  = "2"; // عدد ضریب دستی
$chanel_id    = "-100";
//------- Function -------
    
    function bot($method, $user = []){
        global $token;
    $url = "https://api.telegram.org/bot$token"."/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $user);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

function botabol($method,$datas=[]){
    global $token;
$url = "https://api.telegram.org/bot$token/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
    
    
    
    
    
?>