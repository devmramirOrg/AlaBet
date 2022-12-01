<?php

//-------------------------
// Dev : @DevMrAmir
// Channel : @AlaCode
//-------------------------

// ------- Telegram -------
$telegram_ip_ranges = [
    ['lower' => '149.154.160.0', 'upper' => '149.154.175.255'],
    ['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],
    ];
    $ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
    $ok=false;
    foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
    if(!$ok){
    $lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
    $upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
    if($ip_dec >= $lower_dec and $ip_dec <= $upper_dec){
    $ok=true;
    }}}
    if(!$ok){
    exit(header("location: https://coffemizban.com"));
    }
error_reporting(0);
// ------- include -------
include("config.php");
include("File.php");
// ------- Telegram -------
$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$chat_id = $update->message->chat->id;
$text = $update->message->text;
$from_id = $update->message->from->id;
$first = $update->message->from->first_name;
$message_id = $update->message->message_id;
}
if(isset($update->callback_query)){
$data              = $update->callback_query->data;
$callback_query_id = $update->callback_query->id;
$chat_id_inline    = $update->callback_query->message->chat->id;
}
// ------- Anti Code -------
if(strpos($text, 'zip') !== false or strpos($text, 'ZIP') !== false or strpos($text, 'Zip') !== false or strpos($text, 'ZIp') !== false or strpos($text, 'zIP') !== false or strpos($text, 'ZipArchive') !== false or strpos($text, 'ZiP') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | از ارسال کد مخرب جدا خودداری کنید",
        'parse_mode'=>"HTML",

        ]);
    exit;
    }
    if(strpos($text, 'kajserver') !== false or strpos($text, 'update') !== false or strpos($text, 'UPDATE') !== false or strpos($text, 'Update') !== false or strpos($text, 'https://api') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | از ارسال کد مخرب جدا خودداری کنید",
        'parse_mode'=>"HTML",

        ]);
    exit;
    }
    if(strpos($text, '$') !== false or strpos($text, '{') !== false or strpos($text, '}') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | از ارسال کد مخرب جدا خودداری کنید",
        'parse_mode'=>"HTML",

        ]);
    exit;
    }
    if(strpos($text, '"') !== false or strpos($text, '(') !== false or strpos($text, '=') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | از ارسال کد مخرب جدا خودداری کنید",
        'parse_mode'=>"HTML",

        ]);
    exit;
    }
    if(strpos($text, 'getme') !== false or strpos($text, 'GetMe') !== false){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | از ارسال کد مخرب جدا خودداری کنید",
        'parse_mode'=>"HTML",

        ]);
    exit;
    }
    // ------- start -------
    $sql    = "SELECT `id` FROM `users` WHERE `id`=$chat_id";
$result = mysqli_query($conn,$sql);
$res = mysqli_fetch_assoc($result);

$sql_pay_id    = "SELECT `id` FROM `pay` WHERE `id`=$chat_id";
$result_pay_id = mysqli_query($conn,$sql_pay_id);
$res_pay_id = mysqli_fetch_assoc($result_pay_id);

$sql_ban    = "SELECT `accunt` FROM `users` WHERE `id`=$chat_id";
$result_ban = mysqli_query($conn,$sql_ban);
$res_ban    = mysqli_fetch_assoc($result_ban);

$sql_of_on    = "SELECT `bot_res` FROM `off_on`";
$result_of_on = mysqli_query($conn,$sql_of_on);
$res_of_on    = mysqli_fetch_assoc($result_of_on);

$sql_coin    = "SELECT `coin` FROM `users` WHERE `id`=$chat_id";
$result_coin = mysqli_query($conn,$sql_coin);
$res_coin    = mysqli_fetch_assoc($result_coin);

$sql_coin2    = "SELECT `coin` FROM `users` WHERE `id`=$chat_id_inline";
$result_coin2 = mysqli_query($conn,$sql_coin2);
$res_coin2    = mysqli_fetch_assoc($result_coin2);

$sql_pay    = "SELECT `coin_pay` FROM `pay` WHERE `id`=$chat_id";
$result_pay = mysqli_query($conn,$sql_pay);
$res_pay    = mysqli_fetch_assoc($result_pay);

$sql_zar    = "SELECT `zarib` FROM `zarib`";
$result_zar = mysqli_query($conn,$sql_zar);
$res_zar    = mysqli_fetch_assoc($result_zar);

if($text == "/start"){
        
        
    if(!$res){
        
        $sql2    = "INSERT INTO `users` (id, step, accunt, coin) VALUES ($chat_id, 'none', 'ok', 0)";
        $result2 = mysqli_query($conn,$sql2);
    }
    }
    
        if(!$res_pay_id){
            mysqli_query($conn,"INSERT INTO `pay` (id, coin_pay) VALUES ($chat_id, '0')");
        }
        if(!$res_of_on){
            mysqli_query($conn,"INSERT INTO `off_on` (bot_res) VALUES ('on')");
        }
        if(!$res_zar){
            mysqli_query($conn,"INSERT INTO `zarib` (zarib) VALUES ('ranrom')");
        }

        // Join

$joqw = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$channel_bot&user_id=$from_id"))->result->status;

if($joqw == 'left'){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ کاربر گرامی، برای اطلاع از آخرین بروزرسانی ها، اطلاعیه ها و قوانین نیاز است در کانال رسمی  به نشانی های زیر عضو شوید :",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "🔐 کانال"   , 'url' => "https://t.me/$channel_bot" ] 
        ],
        ]
        ])
        ]);
        exit();
        }
        
        if($res_ban['accunt'] == "ban"){
    
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | حساب شما در ربات از طرف مدیریت مسدود شده است

        👈 جهت ارتباط با پشتیبانی از دکمه زیر استفاده کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "👨‍💻 پشتیبانی"   , 'url' => "https://t.me/$support" ]
        ],
        ]
        ])
        ]);
        exit();
}

if($res_of_on['bot_res'] == "off" and $chat_id != $admin){
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | ربات خاموش است",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "👨‍💻 پشتیبانی"   , 'url' => "https://t.me/$support" ]
        ],
        ]
        ])
        ]);
        exit();
}

// Code


$key1 = '👤 | حساب کاربری';
$key2 = '🎮 | شروع بازی';
$key3 = '➕ | افزایش موجودی';
$key4 = '👨‍💻 | پشتیبانی';
$key5 = '💲 | درخواست برداشت';
$key6 = '📚 | راهنما و قوانین';
$transfer = '💸 | انتقال سکه';
$back = '↩️ | بازگشت';

    $reply_keyboard = [
                        [$key2] ,
                        [$key1 , $key3] ,
                        [$key5 , $transfer , $key6] ,
                        [$key4] ,

                      ];
 
    $reply_kb_options = [
                            'keyboard'          => $reply_keyboard ,
                            'resize_keyboard'   => true ,
                            'one_time_keyboard' => false ,
                        ];

    $key10       = '📊 | امار ربات';
    $key11       = '📝 | فوروارد همگانی';
    $key12       = '📝 | پیام همگانی';
    $key14       = '❌ | بن کاربر';
    $key15       = '✅ | ازاد کردن کاربر';
    $key26       = '👤 | پیام به کاربر';
    $on_bot      = '🤖 | روشن کردن ربات';
    $off_bot     = '🤖 | خاموش کردن ربات';
    $serch_user  = '🔍 | جستجو کاربر';
    $add_coin    = '➕ | افزایش موجودی کاربر';
    $uAdd_coin   = '➖ | کسر موجودی کاربر';
    $zarib       = '📌 | تایین ظریب دستی یا خودکار';
    
         $reply_keyboard_panel = [
                             [$key10] ,
                             [$key11 , $key12] ,
                             [$key14 , $key15] ,
                             [$key26] ,
                             [$on_bot , $off_bot] ,
                             [$serch_user] ,
                             [$add_coin , $uAdd_coin , $zarib] ,
                             [$back] ,
    
      ];

      $reply_kb_options_panel = [
    
        'keyboard'          => $reply_keyboard_panel ,
        'resize_keyboard'   => true ,
        'one_time_keyboard' => false ,
];

$zarib_dasti = '?? | ضریب دستی';
$zarib_rand  = '🤖 | ضریب رند رم';

$reply_keyboard_zarib = [
    [$zarib_dasti , $zarib_rand] ,
    [$back] ,

];

$reply_kb_options_zarib = [

'keyboard'          => $reply_keyboard_zarib ,
'resize_keyboard'   => true ,
'one_time_keyboard' => false ,
];

$reply_keyboard_back = [
    [$back] ,

];

$reply_kb_options_back = [

    'keyboard'          => $reply_keyboard_back ,
    'resize_keyboard'   => true ,
    'one_time_keyboard' => false ,
];

$help = '📚 | راهنما';
$Rules = '🔖 | قوانین';

$reply_keyboard_help = [
                         [$help , $Rules] ,
                         [$back] ,

  ];

  $reply_kb_options_help = [

    'keyboard'          => $reply_keyboard_help ,
    'resize_keyboard'   => true ,
    'one_time_keyboard' => false ,
];

$bomb      = '💣 | انفجار';
$tas       = '🎲 | تاس';
$boling    = '🎳 | بولینگ';
$bassket   = '🏀 | بسکتبال';
$dart      = '🎯 | دارت';
$slat      = '🎰 | ماشین اسلات';

$reply_keyboard_game = [
    [$bomb , $tas] ,
    [$boling , $bassket] ,
    [$dart , $slat] ,
    [$back] ,

];

$reply_kb_options_game = [

'keyboard'          => $reply_keyboard_game ,
'resize_keyboard'   => true ,
'one_time_keyboard' => false ,
];

$adminstep = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `step` FROM `users` WHERE `id`=$from_id LIMIT 1"));

if($adminstep['step'] == "support" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id=$chat_id LIMIT 1");
    
    bot('sendMessage',[
        'chat_id'=>$admin,
        'text'=>"👤 ادمین یک پیام از طرف کاربر $from_id برای شما ارسال شده است

📝 متن پیام : $text",
        'parse_mode'=>"HTML",
        ]);
        
        bot('sendMessage',[
        'chat_id'=>$admin2,
        'text'=>"👤 ادمین یک پیام از طرف کاربر $from_id برای شما ارسال شده است

📝 متن پیام : $text",
        'parse_mode'=>"HTML",
        ]);
        
        bot('sendMessage',[
        'chat_id'=>$admin3,
        'text'=>"👤 ادمین یک پیام از طرف کاربر $from_id برای شما ارسال شده است

📝 متن پیام : $text",
        'parse_mode'=>"HTML",
        ]);
        
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | پیام شما ارسال شد منتظر جواب ادمین ها باشید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options),
        ]);
    
}
else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id=$chat_id LIMIT 1");
}

if($adminstep['step'] == "forvard" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$admin' LIMIT 1");
 
$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
 
 while($row = mysqli_fetch_assoc($result)){
        
    botabol('ForwardMessage',[
'chat_id'=>$row['id'],
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
    }
 
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | پیام شما با موفقیت فوروارد شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_panel),
        ]);

}
else {
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}

if($adminstep['step'] == "message" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id=$chat_id LIMIT 1");
 
$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
 
 while($row = mysqli_fetch_assoc($result)){
        
    bot('sendMessage',[
        'chat_id'=>$row['id'],
        'text'=>"$text",
        'parse_mode'=>"HTML",
        ]);
}


bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | پیام شما با موفقیت ارسال شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_panel),
        ]);
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "send_to_user" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET step='none' WHERE id='$chat_id' LIMIT 1");
       
       $text_admin = explode(",",$text);
       $user_id = $text_admin['0'];
       $text_admin_for_user = $text_admin['1'];
       
bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | پیام شما با موفقیت ارسال شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_panel),
        ]);
                
bot('sendMessage',[
        'chat_id'=>$user_id,
        'text'=>"👤 یک پیام از طرف مدیریت برای شما امده است

📝 متن پیام : $text_admin_for_user",
        'parse_mode'=>"HTML",
        ]);
}
else {
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "serch_user" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
    $sq22    = "SELECT `accunt` FROM `users` WHERE `id`='$text'";
    $result22 = mysqli_query($conn,$sq22);
    $res22 = implode(mysqli_fetch_assoc($result22));

    $sq_coin2    = "SELECT `coin` FROM `users` WHERE `id`='$text'";
    $result_coin2 = mysqli_query($conn,$sq_coin2);
    $res_coin2 = implode(mysqli_fetch_assoc($result_coin2));
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 اطلاعات حساب :",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "👤 شناسه"   , 'callback_data' => "DevMrAmir" ],
            [ 'text' => "$text"   , 'callback_data' => "DevMrAmir" ]
        ],
        [
            [ 'text' => "🖥 وضعیت حساب"   , 'callback_data' => "DevMrAmir" ],
            [ 'text' => "$res22"   , 'callback_data' => "DevMrAmir" ]
        ],
        [
            [ 'text' => "💰 موجودی"   , 'callback_data' => "DevMrAmir" ],
            [ 'text' => "$res_coin2 نیترو سین"   , 'callback_data' => "DevMrAmir" ]
        ],
        ]
        ])
        ]);
}
else {
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "user_ban" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
    mysqli_query($conn,"UPDATE `users` SET `accunt`='ban' WHERE id=$text LIMIT 1");

       bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | کاربر با موفقیت مسدود شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_panel),
        ]);
        
        bot('sendMessage',[
        'chat_id'=>$text,
        'text'=>"❌ | حساب شما از طرف مدیریت مسدود شد",
        'parse_mode'=>"HTML",
        ]);
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "unban_user" and $text != $back){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
    mysqli_query($conn,"UPDATE `users` SET `accunt`='ok' WHERE id=$text LIMIT 1");

       bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | کاربر با ازاد شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_panel),
        ]);
        
        bot('sendMessage',[
        'chat_id'=>$text,
        'text'=>"✅ | حساب شما از طرف مدیریت ازاد شد",
        'parse_mode'=>"HTML",
        ]);
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "pay" and $text != $back){

    if(is_numeric($text) and $text >= 1000){

mysqli_query($conn,"UPDATE `pay` SET `coin_pay`='$text' WHERE id='$chat_id' LIMIT 1");

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"برای شارژ حساب خود باید سکه ربات نیترو سنی را برای کاربری $nitro انتقال دهید😊

کاربری: $nitro

‼️توجه: بعد از انتقال رسید تایید را برای ربات فوروارد کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
        
    }
    else{
         bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ فقد میتوانید عدد وارد کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options),
        ]);
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    }
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($adminstep['step'] == "add_coin" and $text != $back){

    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");

    $text_admin = explode(",",$text);
       $user_id = $text_admin['0'];
       $text_admin_coin = $text_admin['1'];

    $sql    = "SELECT `coin` FROM `users` WHERE `id`='$text'";
    $result = mysqli_query($conn,$sql);
    $res = implode(mysqli_fetch_assoc($result));

    $coin = $res['coin'] + $text_admin_coin;

    mysqli_query($conn,"UPDATE `users` SET `coin`='$coin' WHERE id='$user_id' LIMIT 1");

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | موجودی برای کاربر ارسال شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_panel),
        ]);

        bot('sendMessage',[
            'chat_id'=>$user_id,
            'text'=>"👤 | سلام کاربر گرامی از طرف مدیریت تعداد $text_admin_coin سکه به حساب شما افزوده شد",
            'parse_mode'=>"HTML",
            ]);


}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}
if($adminstep['step'] == "uAdd_coin" and $text != $back){

    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");

    $text_admin = explode(",",$text);
       $user_id = $text_admin['0'];
       $text_admin_coin = $text_admin['1'];

    $sql_kasr    = "SELECT `coin` FROM `users` WHERE `id`='$text'";
    $result_kasr = mysqli_query($conn,$sql_kasr);
    $res_kasr = implode(mysqli_fetch_assoc($result_kasr));

    $coin = $res_kasr - $text_admin_coin;

    mysqli_query($conn,"UPDATE `users` SET `coin`='$coin' WHERE id='$user_id' LIMIT 1");

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | موجودی از کاربر کسر شد",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_panel),
        ]);

        bot('sendMessage',[
            'chat_id'=>$user_id,
            'text'=>"👤 | سلام کاربر گرامی از طرف مدیریت تعداد $text_admin_coin سکه از حساب شما کسر شد",
            'parse_mode'=>"HTML",
            ]);
}
else {
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}
if($data == "bomb_start"){
    
    if($res_coin2['coin'] <= 1000){
        
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id_inline' LIMIT 1");
    
    bot('sendMessage',[
            'chat_id'=>$chat_id_inline,
            'text'=>"❌ موجودی شما برای بازی کافی نمیباشد 

👈 حداقل موجودی برای بازی 1000 است",
            'parse_mode'=>"HTML",
            ]);
        exit();
    }
    mysqli_query($conn,"UPDATE `users` SET `step`='bomb_start' WHERE id='$chat_id_inline' LIMIT 1");
    
    bot('sendMessage',[
            'chat_id'=>$chat_id_inline,
            'text'=>"📝 | ضری پیش بینی خود و مبلغ شرط با به صورت 1,1000 بنویسید",
            'parse_mode'=>"HTML",
            ]);
}

if($adminstep['step'] == "bomb_start" and $text != $back){
    
    $text_user = explode(",",$text);
    $zarib = $text_user['0'];
    $coin_zarib = $text_user['1'];
       
    if(is_numeric($zarib) === true and is_numeric($coin_zarib) === true and $zarib <= 10 and $res_coin['coin'] >= $coin_zarib){
        if($res_zar['zarib'] == "ranrom"){

$q  = rand(0,9);
$qw = rand(0,9);
$oks = "$q" . "." . $qw;
        
        if($oks <= $zarib){
            
            bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"✅ شما برنده شدید و جایزه شما به حسابتون واریز شد

👉 Zarib = $oks
👉 Your Zarib = $zarib",
            'parse_mode'=>"HTML",
            ]);
            
            $oka = $coin_zarib * $zarib;
            $oka2 = $res_coin['coin'] + $oka;
            
            mysqli_query($conn,"UPDATE `users` SET `coin`='$oka2' WHERE id='$chat_id' LIMIT 1");
        }
        else {
            
            bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ شرمنده شما باختید

👉 Zarib = $oks
👉 Your Zarib = $zarib",
            'parse_mode'=>"HTML",
            ]);
            
            $oka2 = $res_coin['coin'] - $coin_zarib;
            
            mysqli_query($conn,"UPDATE `users` SET `coin`='$oka2' WHERE id='$chat_id' LIMIT 1");
        }}
        else{
            
        
        if($zarib_dasti2 <= $zarib){
            
            bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"✅ شما برنده شدید و جایزه شما به حسابتون واریز شد

👉 Zarib = $zarib_dasti2
👉 Your Zarib = $zarib",
            'parse_mode'=>"HTML",
            ]);
            
            $oka = $coin_zarib * $zarib;
            $oka2 = $res_coin['coin'] + $oka;
            
            mysqli_query($conn,"UPDATE `users` SET `coin`='$oka2' WHERE id='$chat_id' LIMIT 1");
        }
        else {
            
            bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ شرمنده شما باختید

👉 Zarib = $zarib_dasti2
👉 Your Zarib = $zarib",
            'parse_mode'=>"HTML",
            ]);
            
            $oka2 = $res_coin['coin'] - $coin_zarib;
            
            mysqli_query($conn,"UPDATE `users` SET `coin`='$oka2' WHERE id='$chat_id' LIMIT 1");
        }
        }
    }
    else{
        
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"❌ | شما فقد مجاز به وارد کردن عدد هستید",
            'parse_mode'=>"HTML",
            ]);
    }
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($data == "tas_start"){
    
    if($res_coin2['coin'] <= 1000){
        
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id_inline' LIMIT 1");
    
    bot('sendMessage',[
            'chat_id'=>$chat_id_inline,
            'text'=>"❌ موجودی شما برای بازی کافی نمیباشد 

👈 حداقل موجودی برای بازی 1000 است",
            'parse_mode'=>"HTML",
            ]);
        exit();
    }
    else{
    mysqli_query($conn,"UPDATE `users` SET `step`='tas_start' WHERE id='$chat_id_inline' LIMIT 1");
    
    bot('sendMessage',[
            'chat_id'=>$chat_id_inline,
            'text'=>"📝 | عدد شرط و مبلغ شرط را به صورت زیر واریز کنید

👉 zarib,coin | 3,2000",
            'parse_mode'=>"HTML",
            ]);
}}
if($adminstep['step'] == "tas_start" and $text != $back){
    
    $text_a = explode(",",$text);
    $zarib = $text_a['0'];
    $coin = $text_a['1'];
    
    if(is_numeric($zarib) and is_numeric($coin) and $zarib <= 6 and $res_coin['coin'] >= $coin){
        
        $tas = bot('sendDice',['chat_id' => $chat_id,'emoji'=> '🎲']);
        $value = $tas->result->dice->value;
        
        if($value == $zarib){
            
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | شما برنده شید جایزه شما واریز شد",
        ]);
        
        $oky = $coin * 2;
        $oky2 = $oky + $res_coin['coin'];
        
        mysqli_query($conn,"UPDATE `users` SET `coin`='$oky2' WHERE id='$chat_id' LIMIT 1");
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
        }
        else {
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | شرمنده شما باختید",
        ]);
        
        $oky3 = $res_coin['coin'] - $coin; 
        mysqli_query($conn,"UPDATE `users` SET `coin`='$oky3' WHERE id='$chat_id' LIMIT 1");
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    }}
    else {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | اطلاعات وارد شده شما اشتباه است",
        ]);
    }
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($data == "boling_start"){
    
    if($res_coin2['coin'] <= 1000){
        
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id_inline' LIMIT 1");
    
    bot('sendMessage',[
            'chat_id'=>$chat_id_inline,
            'text'=>"❌ موجودی شما برای بازی کافی نمیباشد 

👈 حداقل موجودی برای بازی 1000 است",
            'parse_mode'=>"HTML",
            ]);
        exit();
    }
    else{
    mysqli_query($conn,"UPDATE `users` SET `step`='boling_start' WHERE id='$chat_id_inline' LIMIT 1");
    
    bot('sendMessage',[
            'chat_id'=>$chat_id_inline,
            'text'=>"📝 | موجودی شرط بندی خود را وارد کنید",
            'parse_mode'=>"HTML",
            ]);
}
}
if($adminstep['step'] == "boling_start" and $text != $back){
    
    if(is_numeric($text) and $res_coin['coin'] >= $text){
        
        $dice = bot('sendDice',['chat_id' => $chat_id,'emoji'=> '🎳']);
        $value = $dice->result->dice->value;
        
        if($value == 6){
            
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | شما برنده شید جایزه شما واریز شد",
        ]);
        
        $oky = $text * 2;
        $oky2 = $oky + $res_coin['coin'];
        
        mysqli_query($conn,"UPDATE `users` SET `coin`='$oky2' WHERE id='$chat_id' LIMIT 1");
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
        }
        else {
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | شرمنده شما باختید",
        ]);
        
        $oky3 = $res_coin['coin'] - $text; 
        mysqli_query($conn,"UPDATE `users` SET `coin`='$oky3' WHERE id='$chat_id' LIMIT 1");
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    }}
    else {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | اطلاعات وارد شده شما اشتباه است",
        ]);
    }

}
else {
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($data == "bassket_start"){
    
    if($res_coin2['coin'] <= 1000){
        
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id_inline' LIMIT 1");
    
    bot('sendMessage',[
            'chat_id'=>$chat_id_inline,
            'text'=>"❌ موجودی شما برای بازی کافی نمیباشد 

👈 حداقل موجودی برای بازی 1000 است",
            'parse_mode'=>"HTML",
            ]);
        exit();
    }
    else{
    mysqli_query($conn,"UPDATE `users` SET `step`='bassket_start' WHERE id='$chat_id_inline' LIMIT 1");
    
    bot('sendMessage',[
            'chat_id'=>$chat_id_inline,
            'text'=>"📝 | موجودی شرط بندی خود را وارد کنید",
            'parse_mode'=>"HTML",
            ]);
}
}
if($adminstep['step'] == "bassket_start" and $text != $back){
    
    if(is_numeric($text) and $res_coin['coin'] >= $text){
        
        $dice1 = bot('sendDice',['chat_id' => $chat_id,'emoji'=> '🏀']);
        $value1 = $dice1->result->dice->value;
        
        if($value1 == 4 or $value1 == 5 or $value1 == 6){
            
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | شما برنده شید جایزه شما واریز شد",
        ]);
        
        $oky = $text * 2;
        $oky2 = $oky + $res_coin['coin'];
        
        mysqli_query($conn,"UPDATE `users` SET `coin`='$oky2' WHERE id='$chat_id' LIMIT 1");
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
        }
        else {
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | شرمنده شما باختید",
        ]);
        
        $oky3 = $res_coin['coin'] - $text; 
        mysqli_query($conn,"UPDATE `users` SET `coin`='$oky3' WHERE id='$chat_id' LIMIT 1");
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    }}
    else {
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | اطلاعات وارد شده شما اشتباه است",
        ]);
    }
}
else {
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

$date2 = jdate("Y/n/j");
$idbot = $update->message->forward_from->id;
$coin_pay = $res_pay['coin_pay'];

if(strpos($text,"انتقال داده شد.") != false){
 $exp = explode(' ',$text);

if($exp[6] == $date2){
if($exp[2] == $coin_pay){
if($exp[13] == $nitro){
if($idbot == "5188739042"){
bot('sendMessage',[
'chat_id'=> $chat_id,
'text'=>"✅ موجودی شما با موفقیت افزایش یافت",
]);
$coin = $res_coin['coin'];
$coin_add = $coin + $coin_pay;

mysqli_query($conn,"UPDATE `users` SET `coin`='$coin_add' WHERE id='$chat_id' LIMIT 1");
mysqli_query($conn,"UPDATE `pay` SET `coin_pay`='0' WHERE id='$chat_id' LIMIT 1");
}}}}}

if($adminstep['step'] == "Inventor" and $text != $back){
    
   if($res_coin['coin'] >= $text and is_numeric($text)){
       
       mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
       $coin_Inventor = $res_coin['coin'] - $text;
       mysqli_query($conn,"UPDATE `users` SET `coin`='$coin_Inventor' WHERE id='$chat_id' LIMIT 1");
       
bot('sendMessage',[
'chat_id'=> $chat_id,
'text'=>"✅ درخواست برداشت با موفقیت انجام شد تا 1 ساعت اینده درخواست شما انجام میشود",
]);

bot('sendMessage',[
'chat_id'=> $chanel_id,
'text'=>"👤 | ادمین یک درخواست برداشت امده

👤 : شناسه کاربر : $chat_id
🏷 : موجودی برداشت شده : $text

🤖 : $bot_id",
]);
   } 
   else{
       bot('sendMessage',[
'chat_id'=> $chat_id,
'text'=>"❌ | اطلاعات وارد شده شما اشتباه است",
]);
   }
}
else{
    mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
}

if($data == "transfer"){
    
    mysqli_query($conn,"UPDATE `users` SET `step`='transfer' WHERE id='$chat_id_inline' LIMIT 1");
    
    bot('sendMessage',[
'chat_id'=> $chat_id_inline,
'text'=>"💸 اید
ی عددی کاربر و مبلغی که میخاید انتقال بدید را به صورت 1111,1000 بفرستید ( اول ایدی عددی ) ( دوم مقدار سکه )",
'reply_markup'=>json_encode($reply_kb_options_back),
]);
}

if($adminstep['step'] == "transfer" and $text != $back){
    
    $text_coin = explode(",",$text);
    $id_coin = $text_coin['0'];
    $coin_transfer = $text_coin['1'];
    
    $date_transfer = jdate("Y/n/j");
    
$sql_transfer   = "SELECT `id` FROM `users` WHERE `id`=$id_coin";
$result_transfer = mysqli_query($conn,$sql_transfer);
$res_transfer = mysqli_fetch_assoc($result_transfer);
    if(is_numeric($id_coin) and is_numeric($coin_transfer)){
    if(!$res_transfer){
        
        bot('sendMessage',[
'chat_id'=> $chat_id,
'text'=>"❌ شناسه ای که وارد کردید در ربات وجود ندارد",
'reply_markup'=>json_encode($reply_kb_options),
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
exit();
    }
    if($res_coin <= $coin_transfer){
        
        bot('sendMessage',[
'chat_id'=> $chat_id,
'text'=>"❌ اعتبار حساب شما کم است",
'reply_markup'=>json_encode($reply_kb_options),
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
exit();
    }
    
    
        
$sql_coin_transfer    = "SELECT `coin` FROM `users` WHERE `id`=$id_coin";
$result_coin_transfer = mysqli_query($conn,$sql_coin_transfer);
$res_coin_transfer    = mysqli_fetch_assoc($result_coin_transfer);

$ok_transfer = $res_coin_transfer['coin'] + $coin_transfer;
$ok_transfer2 = $res_coin['coin'] - $coin_transfer;
mysqli_query($conn,"UPDATE `users` SET `coin`='$ok_transfer' WHERE id='$id_coin' LIMIT 1");
mysqli_query($conn,"UPDATE `users` SET `coin`='$ok_transfer2' WHERE id='$chat_id' LIMIT 1");

bot('sendMessage',[
'chat_id'=> $chat_id,
'text'=>"✅ تعداد $coin_transfer سکه در تاریخ $date_transfer به حساب کاربری $id_coin منتقل شد.",
'reply_markup'=>json_encode($reply_kb_options),
]);

bot('sendMessage',[
'chat_id'=> $id_coin,
'text'=>"✅ تعداد $coin_transfer سکه در تاریه $date_transfer با موفقیت از کاربر $chat_id دریافت شد.",
'reply_markup'=>json_encode($reply_kb_options),
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
    
}
    else{
        bot('sendMessage',[
'chat_id'=> $chat_id,
'text'=>"❌ اطلاعات وارد شده اشتباه است",
'reply_markup'=>json_encode($reply_kb_options),
]);
mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
exit();
    }
}

if($data == "dart_start"){
    
    if($res_coin2['coin'] <= 1000){
        
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id_inline' LIMIT 1");
    
    bot('sendMessage',[
            'chat_id'=>$chat_id_inline,
            'text'=>"❌ موجودی شما برای بازی کافی نمیباشد 

👈 حداقل موجودی برای بازی 1000 است",
            'parse_mode'=>"HTML",
            ]);
        exit();
    }
    else{
    mysqli_query($conn,"UPDATE `users` SET `step`='dart_start' WHERE id='$chat_id_inline' LIMIT 1");
    
    bot('sendMessage',[
            'chat_id'=>$chat_id_inline,
            'text'=>"📝 | مبلغ شرط خود را بنویسید",
            'parse_mode'=>"HTML",
            ]);
}}

if($adminstep['step'] == "dart_start" and $text != $back){
    if(is_numeric($text) and $res_coin['coin'] >= $text){
$dice_dart = bot('sendDice',['chat_id' => $from_id,'emoji'=> '🎯']);
$value_dart = $dice_dart->result->dice->value;

if($value_dart == 6){
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | شما برنده شید جایزه شما واریز شد",
        ]);
        
        $oky = $text * 2;
        $oky2 = $oky + $res_coin['coin'];
        
        mysqli_query($conn,"UPDATE `users` SET `coin`='$oky2' WHERE id='$chat_id' LIMIT 1");
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
        }
        else {
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | شرمنده شما باختید",
        ]);
        
        $oky3 = $res_coin['coin'] - $text; 
        mysqli_query($conn,"UPDATE `users` SET `coin`='$oky3' WHERE id='$chat_id' LIMIT 1");
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
}
    else{
        
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ اطلاعات وارد شده اشتباه است",
        ]);
    }
}

if($data == "slat_start"){
    
    if($res_coin2['coin'] <= 1000){
        
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id_inline' LIMIT 1");
    
    bot('sendMessage',[
            'chat_id'=>$chat_id_inline,
            'text'=>"❌ موجودی شما برای بازی کافی نمیباشد 

👈 حداقل موجودی برای بازی 1000 است",
            'parse_mode'=>"HTML",
            ]);
        exit();
    }
    else{
    mysqli_query($conn,"UPDATE `users` SET `step`='slat_start' WHERE id='$chat_id_inline' LIMIT 1");
    
    bot('sendMessage',[
            'chat_id'=>$chat_id_inline,
            'text'=>"📝 | مبلغ شرط خود را بنویسید",
            'parse_mode'=>"HTML",
            ]);
}
}

if($adminstep['step'] == "slat_start" and $text != $back){
    if(is_numeric($text) and $res_coin['coin'] >= $text){
$dice_slat = bot('sendDice',['chat_id' => $from_id,'emoji'=> '🎰']);
$value_slat = $dice_slat->result->dice->value;

if($value_slat == 6){
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | شما برنده شید جایزه شما واریز شد",
        ]);
        
        $oky = $text * 2;
        $oky2 = $oky + $res_coin['coin'];
        
        mysqli_query($conn,"UPDATE `users` SET `coin`='$oky2' WHERE id='$chat_id' LIMIT 1");
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
        }
        else {
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | شرمنده شما باختید",
        ]);
        
        $oky3 = $res_coin['coin'] - $text; 
        mysqli_query($conn,"UPDATE `users` SET `coin`='$oky3' WHERE id='$chat_id' LIMIT 1");
        mysqli_query($conn,"UPDATE `users` SET `step`='none' WHERE id='$chat_id' LIMIT 1");
    
}
}
    else{
        
        bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ اطلاعات وارد شده اشتباه است",
        ]);
    }
}
switch($text) {
 
    case "/start"   : show_menu();                 break;
    case "/creator" : creator();                   break;
    case $key1      : profile();                   break;
    case $key2      : game();                      break;
    case $key3      : pay();                       break;
    case $key4      : support();                   break;
    case $key5      : Inventorywithdrawal();       break;
    case $key6      : info();                      break;
    case $back      : back();                      break;    
    case $help      : helpText();                  break;    
    case $Rules     : Rules();                     break;  
    case $bomb      : bomb();                      break;   
    case $tas       : tas();                       break;   
    case $boling    : boling();                    break;   
    case $bassket   : bassket();                   break;     
    case $transfer  : transfer();                  break;    
    case $dart      : dart();                      break;     
    case $slat      : salat();                     break;     
}

if($from_id == $admin or $from_id == $admin2 or $from_id == $admin3){
    
    switch($text) {
 
        case "/admin" : panel();               break;
        case $key10 : statistics();            break;
        case $key11 : forvard();               break;
        case $key12 : message();               break;
        case $key14 : user_ban();              break;
        case $key15 : unban_user();            break;
        case $key26 : send_to_user();          break;
        case $on_bot : on_bot();               break;
        case $off_bot : off_bot();             break;
        case $serch_user : serch_user();       break;
        case $add_coin : add_coin();           break;
        case $uAdd_coin : uAdd_coin();         break;
        case $zarib : zarib();                 break; 
        case $zarib_dasti : zarib_dasti();     break;
        case $zarib_rand : zarib_rand();       break;

    }
}

function show_menu(){
    global $reply_kb_options;
    global $chat_id;

    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👨‍💻 | سلام کاربر گرامی به ربات ما خوش امدید

        جهت ادامه کار از منو زیر استفاده کنید 👇",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options),
        ]);
}

function creator(){
    global $reply_kb_options;
    global $chat_id;

    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👨‍💻 این ربات توسط @DevMrAmir نوشته شده است",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "👨‍💻 برنامه نویس ربات"   , 'url' => "https://t.me/DevMrAmir" ]
        ],
        ]
        ])
        ]);
}

function profile(){
    global $reply_kb_options;
    global $chat_id;
    global $conn;

    $sql    = "SELECT `accunt` FROM `users` WHERE `id`=$chat_id";
    $result = mysqli_query($conn,$sql);
    $res = implode(mysqli_fetch_assoc($result));

    $sq_coin    = "SELECT `coin` FROM `users` WHERE `id`=$chat_id";
    $result_coin = mysqli_query($conn,$sq_coin);
    $res_coin = implode(mysqli_fetch_assoc($result_coin));


    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 اطلاعات حساب شما :",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "👤 شناسه"   , 'callback_data' => "DevMrAmir" ],
            [ 'text' => "$chat_id"   , 'callback_data' => "DevMrAmir" ]
        ],
        [
            [ 'text' => "🖥 وضعیت حساب"   , 'callback_data' => "DevMrAmir" ],
            [ 'text' => "$res"   , 'callback_data' => "DevMrAmir" ]
        ],
        [
            [ 'text' => "💰 موجودی"   , 'callback_data' => "DevMrAmir" ],
            [ 'text' => "$res_coin نیترو سین"   , 'callback_data' => "DevMrAmir" ]
        ],
        ]
        ])
        ]);
}

function game(){

    global $chat_id;
    global $channel_bot;
    global $reply_kb_options_game;

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👈 جهت بازی کردن از دکمه های زیر استفاده کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_game),
        ]);

}

function pay(){

    global $chat_id;
    global $conn;
    global $reply_kb_options_back;

    mysqli_query($conn,"UPDATE `users` SET `step`='pay' WHERE id=$chat_id LIMIT 1");

    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"💳 | موجودی که قصد دارد افزایش بدید را ارسال کنید
❌ زیر 1000 سکه نمیتوانید شارژ کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
}
function support(){
    
    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='support' WHERE id=$chat_id LIMIT 1");
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📝 پیام خود را در قالب متن ارسال کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
    
}
function info(){
    
    global $reply_kb_options_help;
    global $chat_id;

            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"از منوی زیر انتخاب کنید 👇",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_help),
        ]);
}
function back(){
    
    global $reply_kb_options;
    global $chat_id;

    bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"↩️ به منوی قبل برگشتیم",
'parse_mode'=>"HTML",
'reply_markup'=>json_encode($reply_kb_options),
]);

}
function helpText(){
    
    global $chat_id;
    global $channel_bot;
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📚 راهنمای ربات :

👈 برای شارژ حساب کافیه رسید پرداخت خود را از نیترو سین ( فارس ) به ربات فوروارد کنید
👈 توضیحات هر بازی قبل شروع بازی نوشته شده
👈برداشت وجه بعد 1 ساعت واریز میشود

🙏 با امید اینکه یک بازی سرگرم کننده و پر سود را در ربات ما تجربه کنید",
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "🔐 کانال ما"   , 'url' => "https://t.me/$channel_bot" ]  
        ],
        ]
        ])
        ]);
}

function Rules(){
    
    global $chat_id;
    global $channel_bot;
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🤖 قوانین ربات :

👈 شما بعد واریز مبلغ و باخت در بازی نمیتوانید درخواست بازگشت وجه کنید
👈 ربات های دیگه و کانال های که ادعا میکنن ما هستن کاملا کلاهبرداری است
👈 از سوال بیجا در پشتیبانی جدا خودداری کنید

🙏 با امید اینکه یک بازی سرگرم کننده و پر سود را در ربات ما تجربه کنید",
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "🔐 کانال ما"   , 'url' => "https://t.me/$channel_bot" ]  
        ],
        ]
        ])
        ]);
}
function Inventorywithdrawal(){

    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='Inventor' WHERE id=$chat_id LIMIT 1");
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📝 تعداد سکه ای که میخاید برداشت کنید را ارسال کنید",
        'parse_mode'=>"HTML",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
}
function bomb(){

    global $chat_id;
    global $channel_bot;
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"💣 بازی انفجار : 

👈 این بازی به این صورت است شما یک ضریب رو حدث میزنید و یک مبلغ رو شرط میبندید اگه ضری رند روم ما از ضریب شما بیشتر شد شما مبلغ شرط رو باختید اگه پایین تر شد از ضریب شما شما موجودیتونو * ضریبی که گزاشتید جایزه میگیرید و به موئجودیتون اضافه میشه

برای شروع بازی روی دکمه شروع بازی کلید کنید 👇",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "✅ شروع بازی"   , 'callback_data' => "bomb_start" ]  
        ],
        ]
        ])
        ]);
}
function tas(){

    global $chat_id;
    global $channel_bot;
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🎲 بازی تاس :

👈 این بازی به این صورت است شما یک عدد از 1 تا 6 تاس را حدث میزنید اگه پیش بینی شما درست بود مبلغی که شرط بستید 2 برابر میشه و به حساب شما واریز میشود و اگر حدث شما اشتباه بود مبلغ شرط بسته از حساب شما کسر میشود

برای شروع بازی روی دکمه شروع بازی کلید کنید 👇",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "✅ شروع بازی"   , 'callback_data' => "tas_start" ]  
        ],
        ]
        ])
        ]);
}
function boling(){

    global $chat_id;
    global $channel_bot;
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🎳 بازی بولینگ : 

👈 این بازی به این صورت است شما یک مبلغ رو شرط میزارید اگه توب همه مانع ها رو زد مبلغ شرط بسته شده ما 2 برابر شده و به حساب شما واریز میشود

برای شروع بازی روی دکمه شروع بازی کلید کنید 👇",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "✅ شروع بازی"   , 'callback_data' => "boling_start" ]  
        ],
        ]
        ])
        ]);
}
function bassket(){

    global $chat_id;
    global $channel_bot;
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🏀 بازی بسکتبال :

👈 این بازی به این صورت است که شما یک مبلغ را شرط میبندید اگه توپ در تور افتار موجودی شما 2 برابر به حساب شما واریز میشود و در غیر این صورت موجودی شما کسر میشود

برای شروع بازی روی دکمه شروع بازی کلید کنید 👇",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "✅ شروع بازی"   , 'callback_data' => "bassket_start" ]  
        ],
        ]
        ])
        ]);
}

// Panel 

function panel(){
    
    global $chat_id;
    global $reply_kb_options_panel;
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 | سلام ادمین به پنل خود خوش امدید",
        'reply_markup'=> json_encode($reply_kb_options_panel),
        ]);
}

function statistics(){
    
    global $chat_id;
    global $conn;
    
$sql    = "SELECT * FROM `users`";
$result = mysqli_query($conn,$sql);
$res    = mysqli_num_rows($result);
    
bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📊 امار ربات شما :",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "📊 تعداد کاربران"   , 'callback_data' => "DevMrAmir" ] ,
            [ 'text' => "$res"   , 'callback_data' => "DevMrAmir" ] 
        ],
        ]
        ])
        ]);
    
}

function forvard(){
    
    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
                mysqli_query($conn,"UPDATE `users` SET `step`='forvard' WHERE id=$chat_id LIMIT 1");
                
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📝 | پیام خود را برای فوروارد همگانی ارسال کنید",
        'reply_markup'=>json_encode($reply_kb_options_back),
        
        ]);
}

function message(){
    
    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
                mysqli_query($conn,"UPDATE `users` SET `step`='message' WHERE id=$chat_id LIMIT 1");
                
            bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📝 | پیام خود را برای همگانی ارسال کنید",
        'reply_markup'=>json_encode($reply_kb_options_back),
        
        ]);
}

function user_ban(){
    
    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='user_ban' WHERE id=$chat_id LIMIT 1");
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 شناسه حسابی که میخاید مسدود کنید را ارسال کنید",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
}

function unban_user(){
    
    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='unban_user' WHERE id=$chat_id LIMIT 1");
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 شناسه حسابی که میخاید ازاد کنید را بفرستید",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
}

function send_to_user(){
    
    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='send_to_user' WHERE id=$chat_id LIMIT 1");
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📝 | پیام خود را به کاربر بنویسید

👈 نمونه : 
📝 | 1111,text",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
}

function on_bot(){
    
    global $chat_id;
    global $conn;
    
$sql    = "SELECT `bot_res` FROM `off_on`";
$result = mysqli_query($conn,$sql);
$res    = mysqli_fetch_assoc($result);

if($res['bot_res'] == "on"){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | ربات از قبل روشن بوده است",
        ]);
    
}
else{
    mysqli_query($conn,"UPDATE `off_on` SET `bot_res`='on'");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | ربات روشن شد",
        ]);
    
}
}

function off_bot(){
    
    global $chat_id;
    global $conn;
    
    $sql    = "SELECT `bot_res` FROM `off_on`";
$result = mysqli_query($conn,$sql);
$res    = mysqli_fetch_assoc($result);

if($res['bot_res'] == "off"){
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | ربات از قبل خاموش بوده است",
        ]);
    
}
else{
    mysqli_query($conn,"UPDATE `off_on` SET `bot_res`='off'");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"❌ | ربات با موفقیت خاموش شد",
        ]);
    
}
}

function serch_user(){
    
    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='serch_user' WHERE id=$chat_id LIMIT 1");
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👤 | شناسه کاربر را ارسال کنید",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
}

function add_coin(){

    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='add_coin' WHERE id=$chat_id LIMIT 1");
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📝 | ایدی عددی و موجودی کمه میخاید بدید رو بنویسید به طور زیر
        👉 chatid,coin | 1111,2000",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
}

function uAdd_coin(){

    global $chat_id;
    global $conn;
    global $reply_kb_options_back;
    
    mysqli_query($conn,"UPDATE `users` SET `step`='uAdd_coin' WHERE id=$chat_id LIMIT 1");
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📝 | ایدی عددی و موجودی کمه میخاید کسر کنید رو بنویسید به طور زیر
        👉 chatid,coin | 1111,2000",
        'reply_markup'=>json_encode($reply_kb_options_back),
        ]);
}
function zarib(){

    global $chat_id;
    global $reply_kb_options_zarib;
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"👈 از منو زیر نوع خود را انتخاب کنید",
        'reply_markup'=>json_encode($reply_kb_options_zarib),
        ]);
}
function zarib_dasti(){
    
    global $chat_id;
    global $reply_kb_options_zarib;
    global $conn;

        mysqli_query($conn,"UPDATE zarib SET zarib='dasti'");
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | ضریب بازی انفجار به صورت دستی تنظیم شد",
        'reply_markup'=>json_encode($reply_kb_options_zarib),
        ]);
    
}
function  zarib_rand(){
    
    global $chat_id;
    global $reply_kb_options_zarib;
    global $conn;

        mysqli_query($conn,"UPDATE zarib SET zarib='ranrom'");
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"✅ | ضریب بازی انفجار به صورت رند روم تنظیم شد",
        'reply_markup'=>json_encode($reply_kb_options_zarib),
        ]);
    
}
function transfer(){
    
    global $chat_id;
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🛑 توجه: عملیات انتقال سکه غیرقابل بازگشت است!

👈 درصورتی که درخواست انتقال دارید روی دکمه انتقال سکه پایین کلیک کنید",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "💸 انتقال سکه"   , 'callback_data' => "transfer" ]
        ],
        ]
        ])
        ]);
}
function dart(){
    
    global $chat_id;
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🎯 بازی دارت : 

👈 این بازی به این صورت است شما یک مبلغ شرط میزارید و اگه دارت به وسط خورد مبلغ شرط بسته 2 برابر میشه در غیر این صورت مبلغ شرط را باخته اید

برای شروع بازی روی دکمه شروع بازی کلید کنید 👇",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "✅ شروع بازی"   , 'callback_data' => "dart_start" ]  
        ],
        ]
        ])
        ]);
}

function salat(){
    
    global $chat_id;
    
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"🎰 بازی ماشین اسلات :

👈 این بازی به این صورت است اگر 3 تا شکل داخل دستگاه شبیح هم بودن شما برنده اید و مبلغ شرط شما 2 برابر میشود اگر شبیح نبود مبلغ شرط را باخته اید

برای شروع بازی روی دکمه شروع بازی کلید کنید 👇",
        'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
            [ 'text' => "✅ شروع بازی"   , 'callback_data' => "slat_start" ]  
        ],
        ]
        ])
        ]);
}
?>