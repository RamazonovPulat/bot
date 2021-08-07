<?php

unlink(error_log);
$load = sys_getloadavg();
$API_KEY = "1900341729:AAH2athdSBetkKi8qG3Qh_HDGFZJUdqZxmA"; //TOKEN QO'YING
define('API_KEY',$API_KEY);

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
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
function numberformat($str, $sep = ',')
{
    $result = '';
    $c = 0;
    $num = strlen("$str");
    for ($i = $num - 1; $i >= 0; $i--) {
        if ($c == 3) {
            $result = $sep . $result;
            $result = $str[$i] . $result;
            $c = 0;
        } else {
            $result = $str[$i] . $result;
        }
        $c++;
    }
    return $result;
}
function sendmessage($chat_id, $text, $mode, $disable_web_page_preview){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode,
	'disable_web_page_preview'=>$disable_web_page_preview,
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
	function getFileList($folderName, $fileType = "")
{
    if (substr($folderName, strlen($folderName) - 1) != "/") {
        $folderName .= '/';
    }

	$c=0;
    foreach (glob($folderName . '*' . $fileType) as $filename) {
        if (is_dir($filename)) {
            $type = 'folder';
        } else {
            $type = 'file';
        }
        $c++;
    }
	return $c;

}

function create_zip($files = array(),$destination = '') {
    if(file_exists($destination)) { return false; }
    $valid_files = array();
    if(is_array($files)) {
        foreach($files as $file) {
            if(file_exists($file)) {
                $valid_files[] = $file;
            }
        }
    }
    if(count($valid_files)) {
        $zip = new ZipArchive();
        if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
            return false;
        }
        foreach($valid_files as $file) {
            $zip->addFile($file,$file);
        }
        $zip->close();
        return file_exists($destination);
    }
    else
    {
        return false;
    }
}
	function Forward($KojaShe,$AzKoja,$KodomMSG)
{
    bot('ForwardMessage',[
        'chat_id'=>$KojaShe,
        'from_chat_id'=>$AzKoja,
        'message_id'=>$KodomMSG
    ]);
}

function SendAudio($chatid,$audio,$keyboard,$caption,$sazande,$title){
	bot('SendAudio',[
	'chat_id'=>$chatid,
	'audio'=>$audio,
	'caption'=>$caption,
	'performer'=>$sazande,
	'title'=>$title,
	'reply_markup'=>$keyboard
	]);
	}
	function SendDocument($chatid,$document,$keyboard,$caption){
	bot('SendDocument',[
	'chat_id'=>$chatid,
	'document'=>$document,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	function SendSticker($chatid,$sticker,$keyboard){
	bot('SendSticker',[
	'chat_id'=>$chatid,
	'sticker'=>$sticker,
	'reply_markup'=>$keyboard
	]);
	}
	function SendVideo($chatid,$video,$caption,$keyboard,$duration){
	bot('SendVideo',[
	'chat_id'=>$chatid,
	'video'=>$video,
        'caption'=>$caption,
	'duration'=>$duration,
	'reply_markup'=>$keyboard
	]);
	}
	function SendVoice($chatid,$voice,$keyboard,$caption){
	bot('SendVoice',[
	'chat_id'=>$chatid,
	'voice'=>$voice,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	function SendContact($chatid,$first_name,$phone_number,$keyboard){
	bot('SendContact',[
	'chat_id'=>$chatid,
	'first_name'=>$first_name,
	'phone_number'=>$phone_number,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Chat Action */
function SendChatAction($chatid,$action){
	bot('sendChatAction',[
	'chat_id'=>$chatid,
	'action'=>$action
	]);
	}
	/* Tabee Kick Chat Member */
function KickChatMember($chatid,$user_id){
	bot('kickChatMember',[
	'chat_id'=>$chatid,
	'user_id'=>$user_id
	]);
	}
	/* Tabee Leave Chat */
function LeaveChat($chatid){
	bot('LeaveChat',[
	'chat_id'=>$chatid
	]);
	}
	/* Tabee Get Chat */
function getChat($idchat){
	$json=file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChat?chat_id=".$idchat);
	$data=json_decode($json,true);
	return $data["result"]["first_name"];
}
	/* Tabee Get Chat Members Count */
function GetChatMembersCount($chatid){
	bot('getChatMembersCount',[
	'chat_id'=>$chatid
	]);
	}
	/* Tabee Get Chat Member */
function GetChatMember($chatid,$userid){
	$truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=".$chatid."&user_id=".$userid));
	$tch = $truechannel->result->status;
	return $tch;
	}
	/* Tabee Answer Callback Query */
function AnswerCallbackQuery($callback_query_id,$text,$show_alert){
	bot('answerCallbackQuery',[
        'callback_query_id'=>$callback_query_id,
        'text'=>$text,
		'show_alert'=>$show_alert
    ]);
	}
function sendphoto($chat_id, $photo, $action){
	bot('sendphoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'action'=>$action
	]);
	}
	function objectToArrays($object)
    {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map("objectToArrays", $object);
    }
#-----------------------------API
$hosturlviewRs = "http://donyaseen.ir/seen.php"; // apitest
$hosturllike = "http://donyaseen.ir/like.php"; // hostir  
$hosturlviewRsuser = "1045203920";  // pass
$hosturlviewRspass = "yECdqhv4ZYAFwAR";  //passss2 
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$chat_id2 = $message->chat->id;
mkdir("data/$from_id");
$message_id = $message->message_id;
$from_id = $message->from->id;
$text = $update->message->text;
$oghab = file_get_contents("data/$from_id/com.txt");
$ADMIN = '1136629614'; //ADMIN ID
$user = file_get_contents("Member.txt");
$tc = $update->message->chat->type;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot1228194160:AAEIOJf4r4CwciejjeOApgtKaI-G2Y7p-C4/getChatMember?chat_id=@Reportseen&user_id=".$from_id));
$tch = $truechannel->result->status;
$first = $update->message->from->first_name;
$tedad = file_get_contents('data/'.$from_id."/golds.txt");
@$list = file_get_contents("Member.txt");
@$wait = file_get_contents("data/$from_id/wait.txt");
@$coin = file_get_contents("data/$from_id/golds.txt");
@$sof = file_get_contents("data/sofs.txt");
$channel = "@Lider_koder"; //KANAL
$on = file_get_contents("on.txt");
#-------------------------
if ($on == "off" && $from_id != "$ADMIN") {

bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"⚠️<b>UzNitroSeen bot  yangilanmoqda....
❌so'ngi bir necha soat yopiq.
⚠️Iltimos biroz o'tib harakat qilib ko'ring.</b>",
        'parse_mode'=>'html',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	 [['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]
	]
	])
	]);
	}else{
   if($text == '🔚 Bekor qilish'){
	   file_put_contents("data/$from_id/com.txt","none");
  bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>🏠 Bosh  menyudasiz!</b>",
        'parse_mode'=>'html',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	 [['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]
	]
	])
	]);
	file_put_contents("data/$from_id/com.txt","none");
  }

if($text == "🅰 Avto-ko'rish"){
	bot('sendmessage',[
	'chat_id'=>$chat_id2,
	'text'=>"
*Kerakli avto 👁 ko'rish sonini yuboring.
Savol va takliflar bo'lsa @UNS_Support-ga murojaat qilishingiz mumkin!
*",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
[['text'=>"🛍️haftalik"],['text'=>"🚀oylik"]],
 [['text'=>"🔚 Bekor qilish"]],
	]
	])
	]);
 
	}
//Forward message chat idsiga PM uradigan kanalingiz id qo'yasiz o'ziz
if($text == "👁 Ko'rish"){
	bot('sendmessage',[
	'chat_id'=>$chat_id2,
	'text'=>"
*Kerakli 👁 ko'rish sonini yuboring.
Sizda $tedad ta 👁 ko'rish imkoni bor.
Savol va takliflar bo'lsa @UNS_Support-ga murojaat qilishingiz mumkin!
*",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
[['text'=>"300👁️"],['text'=>"400👁️"]],
[['text'=>"500👁️"],['text'=>"600👁️"]],
[['text'=>"700👁️"],['text'=>"800👁️"]],
[['text'=>"900👁️"],['text'=>"1000👁️"]],
 [['text'=>"🔚 Bekor qilish"]],
	]
	])
	]);
 
	}
elseif($text == "400👁️" or $text == "500👁️" or $text == "600👁️" or $text == "800👁️" or $text == "1000👁️" or $text == "1100👁️"){
 if($tedad > 400){
file_put_contents("data/$from_id/com.txt","400");
 
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"Siz <b> $text </b> ta👁 ko'rish tanladingiz! 
ko'paytirish uchun kanaldan xabarni <b> forward </b>qiling",
        'parse_mode'=>'html',
         'reply_markup'=>json_encode([
 'resize_keyboard'=>true,
 'keyboard'=>[
 [['text'=>"🔚 Bekor qilish"]],
 [['text'=>""]],
 ]
 ])
 ]);
  }else{
  
  bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"⚠️<b>Sizning tanga yetarli emas!</b>
 ➕Hisobni to'ldirishr bo'limiga o'ting va tanga to'plashda davom eting.",
        'parse_mode'=>'html',
         'reply_markup'=>json_encode([
 'resize_keyboard'=>true,
 'keyboard'=>[
 [['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]
 ]
 ])
 ]);
 }
 }
 
if ($oghab == "400" && $update->message->forward_from_chat->type == "channel") {
    file_put_contents("spam/$from_id.txt",file_get_contents("spam/$from_id.txt") + 1);
    if(file_get_contents("spam/$from_id.txt") <= 1){
     file_put_contents("data/$from_id/com.txt", "none");
  $newgold = $tedad - 400;
  file_put_contents("data/$from_id/golds.txt", $newgold);
sleep(1);
bot('ForwardMessage', [
'chat_id' => "$ADMIN",
'from_chat_id' => $chat_id,
'message_id' => $message_id
]);
  bot('sendmessage', ['chat_id' => $chat_id, 'text' => "✅ Buyurtma qabul qilindi!
🚀 Maximum tezlik.
🚚 Buyurtma Unlimited ta ko'rish
🧩 Buyurtmangiz yaqin daqiqalarda amalga oshiriladi.
<b>do'stlaringizga ulashing!</b>", 'parse_mode' => 'html', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]]]) ]);
        $sofs = $sof + 2;
  file_put_contents("data/sofs.txt", $sofs);
  file_put_contents("spam/$from_id.txt",0);
}
}
if ($oghab == "400" && $update->message->forward_from_chat->type != "channel") {
  file_put_contents("data/$f uprom_id/com.txt", "none");
  bot('sendmessage', ['chat_id' => $chat_id, 'text' => "⚠️  Noto'g'ri urinish! kanaldan to'g'ri Forward qiling! ", 'parse_mode' => 'MarkDown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text'=>"🔚 Bekor qilish"]]]]) ]);
  }
elseif($text == "300👁️" or $text == "101"){
 if($tedad > 300){
file_put_contents("data/$from_id/com.txt","300");
 
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"Siz <b> $text </b> ta👁 ko'rish tanladingiz! 
ko'paytirish uchun kanaldan xabarni <b> forward </b>qiling",
        'parse_mode'=>'html',
         'reply_markup'=>json_encode([
 'resize_keyboard'=>true,
 'keyboard'=>[
 [['text'=>"🔚 Bekor qilish"]],
 [['text'=>""]],
 ]
 ])
 ]);
  }else{
  
  bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"⚠️<b>Sizning tanga yetarli emas!</b>
 ➕Hisobni to'ldirishr bo'limiga o'ting va tanga to'plashda davom eting.",
        'parse_mode'=>'html',
         'reply_markup'=>json_encode([
 'resize_keyboard'=>true,
 'keyboard'=>[
 [['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]
 ]
 ])
 ]);
 }
 }
 
if ($oghab == "300" && $update->message->forward_from_chat->type == "channel") {
    file_put_contents("spam/$from_id.txt",file_get_contents("spam/$from_id.txt") + 1);
    if(file_get_contents("spam/$from_id.txt") <= 1){
     file_put_contents("data/$from_id/com.txt", "none");
  $newgold = $tedad - 300;
  file_put_contents("data/$from_id/golds.txt", $newgold);
sleep(1);
bot('ForwardMessage', [
'chat_id' => "-1001309369274",
'from_chat_id' => $chat_id,
'message_id' => $message_id
]);
  bot('sendmessage', ['chat_id' => $chat_id, 'text' => "✅ Buyurtma qabul qilindi!
🚀 Maximum tezlik.
🚚 Buyurtma 300👁️ ta ko'rish
🧩 Buyurtmangiz yaqin daqiqalarda amalga oshiriladi.
<b>do'stlaringizga ulashing!</b>", 'parse_mode' => 'html', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]]]) ]);
        $sofs = $sof + 2;
  file_put_contents("data/sofs.txt", $sofs);
  file_put_contents("spam/$from_id.txt",0);
}
}
if ($oghab == "300" && $update->message->forward_from_chat->type != "channel") {
  file_put_contents("data/$f uprom_id/com.txt", "none");
  bot('sendmessage', ['chat_id' => $chat_id, 'text' => "⚠️  Noto'g'ri urinish! kanaldan to'g'ri Forward qiling! ", 'parse_mode' => 'MarkDown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text'=>"🔚 Bekor qilish"]]]]) ]);
  }

elseif($text == "200👁️" or $text == "101"){
 if($tedad > 200){
file_put_contents("data/$from_id/com.txt","200");
 
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"Siz <b> $text </b> ta👁 ko'rish tanladingiz! 
ko'paytirish uchun kanaldan xabarni <b> forward </b>qiling",
        'parse_mode'=>'html',
         'reply_markup'=>json_encode([
 'resize_keyboard'=>true,
 'keyboard'=>[
 [['text'=>"🔚 Bekor qilish"]],
 [['text'=>""]],
 ]
 ])
 ]);
  }else{
  
  bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"⚠️<b>Sizning tanga yetarli emas!</b>
 ➕Hisobni to'ldirishr bo'limiga o'ting va tanga to'plashda davom eting.",
        'parse_mode'=>'html',
         'reply_markup'=>json_encode([
 'resize_keyboard'=>true,
 'keyboard'=>[
 [['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]
 ]
 ])
 ]);
 }
 }
 
if ($oghab == "200" && $update->message->forward_from_chat->type == "channel") {
    file_put_contents("spam/$from_id.txt",file_get_contents("spam/$from_id.txt") + 1);
    if(file_get_contents("spam/$from_id.txt") <= 1){
     file_put_contents("data/$from_id/com.txt", "none");
  $newgold = $tedad - 200;
  file_put_contents("data/$from_id/golds.txt", $newgold);
sleep(1);
bot('ForwardMessage', [
'chat_id' => "-1001460691336",
'from_chat_id' => $chat_id,
'message_id' => $message_id
]);
  bot('sendmessage', ['chat_id' => $chat_id, 'text' => "✅ Buyurtma qabul qilindi!
🚀 Maximum tezlik.
🚚 Buyurtma 200👁️ ta ko'rish
🧩 Buyurtmangiz yaqin daqiqalarda amalga oshiriladi.
<b>do'stlaringizga ulashing!</b>", 'parse_mode' => 'html', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]]]) ]);
        $sofs = $sof + 2;
  file_put_contents("data/sofs.txt", $sofs);
  file_put_contents("spam/$from_id.txt",0);
}
}
if ($oghab == "200" && $update->message->forward_from_chat->type != "channel") {
  file_put_contents("data/$f uprom_id/com.txt", "none");
  bot('sendmessage', ['chat_id' => $chat_id, 'text' => "⚠️  Noto'g'ri urinish! kanaldan to'g'ri Forward qiling! ", 'parse_mode' => 'MarkDown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text'=>"🔚 Bekor qilish"]]]]) ]);
  }

elseif($text == "100👁️" or $text == "101"){
 if($tedad > 100){
file_put_contents("data/$from_id/com.txt","100");
 
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"Siz <b> $text </b> ta👁 ko'rish tanladingiz! 
ko'paytirish uchun kanaldan xabarni <b> forward </b>qiling",
        'parse_mode'=>'html',
         'reply_markup'=>json_encode([
 'resize_keyboard'=>true,
 'keyboard'=>[
 [['text'=>"🔚 Bekor qilish"]],
 [['text'=>""]],
 ]
 ])
 ]);
  }else{
  
  bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"⚠️<b>Sizning tanga yetarli emas!</b>
 ➕Hisobni to'ldirishr bo'limiga o'ting va tanga to'plashda davom eting.",
        'parse_mode'=>'html',
         'reply_markup'=>json_encode([
 'resize_keyboard'=>true,
 'keyboard'=>[
 [['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]
 ]
 ])
 ]);
 }
 }
 
if ($oghab == "100" && $update->message->forward_from_chat->type == "channel") {
    file_put_contents("spam/$from_id.txt",file_get_contents("spam/$from_id.txt") + 1);
    if(file_get_contents("spam/$from_id.txt") <= 1){
     file_put_contents("data/$from_id/com.txt", "none");
  $newgold = $tedad - 100;
  file_put_contents("data/$from_id/golds.txt", $newgold);
sleep(1);
bot('ForwardMessage', [
'chat_id' => "-1001259412621",
'from_chat_id' => $chat_id,
'message_id' => $message_id
]);
  bot('sendmessage', ['chat_id' => $chat_id, 'text' => "✅ Buyurtma qabul qilindi!
🚀 Maximum tezlik.
🚚 Buyurtma 100👁️ ta ko'rish
🧩 Buyurtmangiz yaqin daqiqalarda amalga oshiriladi.
<b>do'stlaringizga ulashing!</b>", 'parse_mode' => 'html', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]]]) ]);
        $sofs = $sof + 2;
  file_put_contents("data/sofs.txt", $sofs);
  file_put_contents("spam/$from_id.txt",0);
}
}
if ($oghab == "100" && $update->message->forward_from_chat->type != "channel") {
  file_put_contents("data/$f uprom_id/com.txt", "none");
  bot('sendmessage', ['chat_id' => $chat_id, 'text' => "⚠️  Noto'g'ri urinish! kanaldan to'g'ri Forward qiling! ", 'parse_mode' => 'MarkDown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text'=>"🔚 Bekor qilish"]]]]) ]);
  }


elseif($text == "50👁️" or $text == "101"){
 if($tedad > 50){
file_put_contents("data/$from_id/com.txt","50");
 
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"Siz <b> $text </b> ta👁 ko'rish tanladingiz! 
ko'paytirish uchun kanaldan xabarni <b> forward </b>qiling",
        'parse_mode'=>'html',
         'reply_markup'=>json_encode([
 'resize_keyboard'=>true,
 'keyboard'=>[
 [['text'=>"🔚 Bekor qilish"]],
 [['text'=>""]],
 ]
 ])
 ]);
  }else{
  
  bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"⚠️<b>Sizning tanga yetarli emas!</b>
 ➕Hisobni to'ldirishr bo'limiga o'ting va tanga to'plashda davom eting.",
        'parse_mode'=>'html',
         'reply_markup'=>json_encode([
 'resize_keyboard'=>true,
 'keyboard'=>[
 [['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]
 ]
 ])
 ]);
 }
 }
 
if ($oghab == "50" && $update->message->forward_from_chat->type == "channel") {
    file_put_contents("spam/$from_id.txt",file_get_contents("spam/$from_id.txt") + 1);
    if(file_get_contents("spam/$from_id.txt") <= 1){
     file_put_contents("data/$from_id/com.txt", "none");
  $newgold = $tedad - 50;
  file_put_contents("data/$from_id/golds.txt", $newgold);
sleep(1);
bot('ForwardMessage', [
'chat_id' => "-1001259412621",
'from_chat_id' => $chat_id,
'message_id' => $message_id
]);
  bot('sendmessage', ['chat_id' => $chat_id, 'text' => "✅ Buyurtma qabul qilindi!
🚀 Maximum tezlik.
🚚 Buyurtma 50👁️ ta ko'rish
🧩 Buyurtmangiz yaqin daqiqalarda amalga oshiriladi.
<b>do'stlaringizga ulashing!</b>", 'parse_mode' => 'html', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]]]) ]);
        $sofs = $sof + 2;
  file_put_contents("data/sofs.txt", $sofs);
  file_put_contents("spam/$from_id.txt",0);
}
}
if ($oghab == "50" && $update->message->forward_from_chat->type != "channel") {
  file_put_contents("data/$f uprom_id/com.txt", "none");
  bot('sendmessage', ['chat_id' => $chat_id, 'text' => "⚠️  Noto'g'ri urinish! kanaldan to'g'ri Forward qiling! ", 'parse_mode' => 'MarkDown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text'=>"🔚 Bekor qilish"]]]]) ]);
  }

elseif($text == "40👁️" or $text == "101"){
 if($tedad > 40){
file_put_contents("data/$from_id/com.txt","25");
 
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"Siz <b> $text </b> ta👁 ko'rish tanladingiz! 
ko'paytirish uchun kanaldan xabarni <b> forward </b>qiling",
        'parse_mode'=>'html',
         'reply_markup'=>json_encode([
 'resize_keyboard'=>true,
 'keyboard'=>[
 [['text'=>"🔚 Bekor qilish"]],
 [['text'=>""]],
 ]
 ])
 ]);
  }else{
  
  bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"⚠️<b>Sizning tanga yetarli emas!</b>
 ➕Hisobni to'ldirishr bo'limiga o'ting va tanga to'plashda davom eting.",
        'parse_mode'=>'html',
         'reply_markup'=>json_encode([
 'resize_keyboard'=>true,
 'keyboard'=>[
 [['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]
 ]
 ])
 ]);
 }
 }
 
if ($oghab == "25" && $update->message->forward_from_chat->type == "channel") {
    file_put_contents("spam/$from_id.txt",file_get_contents("spam/$from_id.txt") + 1);
    if(file_get_contents("spam/$from_id.txt") <= 1){
     file_put_contents("data/$from_id/com.txt", "none");
  $newgold = $tedad - 40;
 file_put_contents("data/$from_id/golds.txt", $newgold);
sleep(1);
bot('ForwardMessage', [
'chat_id' => "-1001259412621",
'from_chat_id' => $chat_id,
'message_id' => $message_id
]);
  bot('sendmessage', ['chat_id' => $chat_id, 'text' => "✅ Buyurtma qabul qilindi!
🚀 Maximum tezlik.
🚚 Buyurtma 40👁️ ta ko'rish
🧩 Buyurtmangiz yaqin daqiqalarda amalga oshiriladi.
<b>do'stlaringizga ulashing!</b>", 'parse_mode' => 'html', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]]]) ]);
        $sofs = $sof + 2;
  file_put_contents("data/sofs.txt", $sofs);
  file_put_contents("spam/$from_id.txt",0);
}
}
if ($oghab == "25" && $update->message->forward_from_chat->type != "channel") {
  file_put_contents("data/$f uprom_id/com.txt", "none");
  bot('sendmessage', ['chat_id' => $chat_id, 'text' => "⚠️  Noto'g'ri urinish! kanaldan to'g'ri Forward qiling! ", 'parse_mode' => 'MarkDown', 'reply_markup' => json_encode(['resize_keyboard' => true, 'keyboard' => [[['text'=>"🔚 Bekor qilish"]]]]) ]);
  }
elseif($text == "👥 Referal"){

    $caption = "✋Xush kelibsiz!🤚
🤔Ushbu bot nima qila oladi?
Bu yerda siz quydagilarga ega bo'lasiz!
┌🚀Kanalingiz tez o'sishi.
├👁️Tashriflar sonini oshirish
├🏆Xoxlganacha tashrif👁️
├🅰️Avtomatik tashrif
├🔥 Ball Sotib olish!
└💠Yordam: @UNS_Support
🥰OMAD TILAYMIZ!
kirish uchun linkni bosing👇

🤖: http://t.me/Uz_NitroSeenbot?start=$chat_id";
       bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>new CURLFile('mem.jpg'),
 'caption'=>$caption
 ]);
        
bot('sendmessage', [
            
'chat_id' => $chat_id,
            
'text' => " 🤝Hurmatli foydalanuvchi, siz bu yuqoridagi Xabarni do'stlaringizga, kanallaringizga, guruhlaringizga yuborasiz va shu link orqali kirgan har bir do'stingiz uchun
100 ta 👁 ko'rish olasiz.
Faol bo'ling do'stlarga ulashing",
'reply_to_message_id'=>$bot
        ]);
  
 }

if($text == "➕Hisobni to'ldirish"){
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"*Hisobingizni bepul to'ldirish uchun
👥 Referal tugmasini bosing!
Tezroq ishonchli tanga olish uchun 
💳 Sotib olish tugmasini bosing! *",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
		[['text'=>"💳 Sotib olish"],
	['text'=>"👥 Referal"]],[['text'=>"🔚 Bekor qilish"]],
	]
	])
	]);
 
	
}

if($text == "💳 Sotib olish"){
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"

<b>Xech qanday ovoragarchilik qilmay tanga sotib oling!</b>
<b>📌 Sotib olish:</b>
🇷🇺 5 rubl = 100 ta ko'rish👁
🇷🇺 50 rubl = 1000 ta ko'rish👁
<b>👥 Referal:</b>
☑️1 referal = 10 ta ko'rish👁
<b>💳To'lov turlari: </b>
<b>💰click, 🥝qiwi, 🔵paynet,</b>
<i>Admin: @UNS_Support</i>",
        'parse_mode'=>'html',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
 [['text'=>""]],
	]
	])
	]);
 
	}
if($text == " 525tssggsgzvvs"){
	SendMessage($chat_id2,"
😉Ushbu bo'lim hozircha mavjud emas.
🚀tez kunda...","html","true");
	}
if($text == "🅰 Avto-ko'rish"){
	SendMessage($chat_id,"<b>🅰️ Avto-ko'rish tizimi vaqtincha tamirda</b>","html","true");
	}

  #--------------------------------
  
   if(preg_match('/^\/([Ss]tart)(.*)/',$text)){
   
	preg_match('/^\/([Ss]tart)(.*)/',$text,$match);
	$match[2] = str_replace(" ","",$match[2]);
	$match[2] = str_replace("\n","",$match[2]);
	if($match[2] != null){
	if (strpos($user , "$from_id") == false){
	if($match[2] != $from_id){
	if (strpos($tedad , "$from_id") == false){
	$txxt = file_get_contents('data/'.$match[2]."/golds.txt");
    $pmembersid= explode("\n",$txxt);
    if (!in_array($from_id,$pmembersid)){
      $deee = file_get_contents('data/'.$match[2]."/golds.txt");
		file_put_contents('data/'.$match[2]."/golds.txt",$deee+100);
		
		bot('sendmessage',[
	'chat_id'=>$match[2],
	'text'=>"🎉<i> Siz do'stingizni taklif etingiz,
Sizga 100 ta tanga taqdim etildi!</i>
<b>Davom eting!</b>",
        'parse_mode'=>'html',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	 [['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]
	]
	])
	]);
    }
	}
	}
	}
	}
  
if (!file_exists("data/$from_id/com.txt")) {
        mkdir("data/$from_id");
        file_put_contents("data/$from_id/com.txt","none");
        file_put_contents("data/$from_id/golds.txt","25");
        $myfile2 = fopen("Member.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
		file_put_contents("data/$from_id/com.txt","none");
		file_put_contents("data/$from_id/golds.txt","25");
		}
    
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"✋<b>Xush kelibsiz!</b>🤚
<i>🤔Ushbu bot nima qila oladi?
Bu yerda siz quydagilarga ega bo'lasiz!</i>
┌🚀Kanalingiz tez o'sishi.
├👁️Tashriflar sonini oshirish
├🏆Xoxlganacha tashrif👁️
├🅰️Avtomatik tashrif
├🔥 Ball Sotib olish!
└💠Yordam: @UNS_Support
<b>🥰OMAD TILAYMIZ!</b>
📡<b>Yangiliklar kanali:</b>✅ @Uz_NitroSeen💬",
        'parse_mode'=>'html',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	 [['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]
	]
	])
	]);
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>🏠 Bosh  menyudasiz</b>",
        'parse_mode'=>'html',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
		 [['text'=>"👁 Ko'rish"],['text'=>"🅰 Avto-ko'rish"]],
 [['text'=>"➕Hisobni to'ldirish"],['text'=>"👤 Mening hisobim"]],
 [['text'=>"📋Qo'llanma"]],
 [['text'=>"🆘 Yordam"],['text'=>"📊 Statistika"]]
	]
	])
	]);
 
	}
	
	elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
	SendMessage($chat_id,"<b>⚠️ 
Xurmatli foydalanuvchi avval botimizning Rasmiy kanaliga obuna bo'ling!
 so'ng qayta /start bosing👇</b>
<b>⚠️ @LIDER_KODER ⚠️

🏆 @REPORTSEEN 🔑</b>","html","true");
	}
  
if($text == "🔚 bek$or"){
	
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"Quydagi mavjud operatsialardan keraklisinj tanlang:
💎5 olmos= 5 ta ko'rish👁️
💎1000 olmos= 1000 ta ko'rish👁️
Olmos kerak bo'lsa (pulik)
@UNS_Support ga murojaat eting
*To'lovlar ishonchli va xafsiz*",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
[['text'=>"25👁️"],['text'=>"50👁️"]],
[['text'=>"100👁️"],['text'=>"200👁️"]],
[['text'=>"300👁️"],['text'=>"400👁️"]],
[['text'=>"500👁️"],['text'=>"600👁️"]],
[['text'=>"800👁️"],['text'=>"1000👁️"]],
 [['text'=>"🔚 Bekor qilish"]]
	]
	])
	]);
 
	}
  

if($text == "📋Qo'llanma"){
	SendMessage($chat_id,"
<b>📌Botdan Foydalanish Qo'llanmasi</b>
<i>1️⃣ Botga kirib 👁ko'rish ko'paytish uchun kanaldan to'g'ri forward qiling
2️⃣ Referal orqali do'stingizni taklif eting va 10 tangaga ega bo'ling.
3️⃣ Botda Foydalanish Kursi</i>
<b>Xech qanday ovoragarchilik qilmay tanga sotib oling.</b>
<b>📌 Sotib olish:</b>
🇷🇺 5 rubl = 100 ta ko'rish👁
🇷🇺 50 rubl = 1000 ta ko'rish👁
<b>👥 Referal:</b>
☑️1 referal = 100 ta ko'rish👁
<b>💳To'lov turlari: </b>
<b>💰click, 🥝qiwi, 🔵paynet,</b>
4️⃣ <i>Avto ko'rish Sozlash
Botni kanalingizga to'liq admin qiling va botga qaytib kanaldan xabaringizni Forward qiling so'ng o'rtacha doimiy ko'rish Soni yuboring.
</i>
✅ @UNS_Support ✅","html","true");
	}
/*
KANAL : LIDER_KODER
bot : @Uz_Nitroseenbot
*/
	if($text == "🆘 Yordam"){
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"*🏦Siz yordam bo'limidasiz.
┌👤Bot admini @UNS_Support
├📡Info Kanal: @Uz_Nitroseen
├👥Bizning chat: @Nitroseen_Chat
├💾 Xosting: UzXost.ru
├🚀Dasturchilar: @LIDER_KODER
└🛍️Dasturchi: @PRO_KODER*",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
 [['text'=>"🔚 Bekor qilish"]]
	]
	])
	]);
 
	}
	
	
	elseif($text == "👤 Mening hisobimjy"){
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"O'zbekiston: 👤Hisobingizni boshqarishingiz mumkin..

Eslatma: har bir olmos raqami bilan siz tijoratga imzo chekishingiz mumkin.

Sotib olish yoki subdividing tomonidan sizning olmos oshirish, yoki qolgan qolgan qolgan ma'lum bor.",'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>""]],
	[['text'=>""]],
	[['text'=>""]],
	[['text'=>"🔚 Bekor qilish"]]
	]
	])
	]);
	}
	
	elseif($text == "👤 Mening hisobim"){
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"<b>Sizning botimizdagi xisobingiz</b>

┌👤Ismingiz: $first
├🆔Id raqamingiz: $chat_id
├💰Tangalaringiz $tedad ta
├👥Do'stlaringizni taklif eting!
├🔥Tanga Sotib oling!
└💠Yordam: @UNS_Support
",'parse_mode'=>'html',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"💳 Sotib olish"]],
	[['text'=>"🔚 Bekor qilish"]]
	]
	])
	]);
	}
	
	

#--- PANEL ADMIN ---


elseif($text == "/admin" && $chat_id == $ADMIN){

file_put_contents("data/$from_id/com.txt","none");

        
bot('sendmessage', [
                'chat_id' =>$chat_id,
                
'text' =>"Admin paneliga xush kelibsiz!",
               'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	  [['text'=>"😋 50 tanga bonus"],
	['text'=>"📊 Statistika"]],
		[['text'=>"🙆🏻‍♂️barchaga xabar yubor"],
			['text'=>"🗣forward xabar"]],
			[['text'=>"🎁 hammaga tanga sovg'a"]],
			[['text'=>"❌botni o'chirish"],
	['text'=>"✅ botni yoqish"]],
	]
	])
	]);
	}
elseif($text == "Admin menu" && $chat_id == $ADMIN){

file_put_contents("data/$from_id/com.txt","none");

        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"Admin paneliga xush kelibsiz!",
               'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	  [['text'=>"😋 10 tanga bonus"],
	['text'=>"📊 Statistika"]],
		[['text'=>"🙆🏻‍♂️barchaga xabar yubor"],
			['text'=>"🗣forward xabar"]],
			[['text'=>"🎁 hammaga tanga sovg'a"]],
			[['text'=>"❌botni o'chirish"],
	['text'=>"✅ botni yoqish"]],
	]
	])
	]);
	}
		elseif($text == "🎁 hammaga tanga sovg'a" && $from_id == $ADMIN){
file_put_contents("data/$from_id/com.txt","coin to all");
SendMessage($chat_id,"🔢 qancha tanga tarqatasiz? :",'HTML',$back_admin,$message_id);
}

elseif($text == "❌botni o'chirish" && $from_id == $ADMIN){
file_put_contents("on.txt","off");
SendMessage($chat_id,"☑️ OFLINE",'HTML',$back_admin,$message_id);
}

elseif($text == "✅ botni yoqish" && $from_id == $ADMIN){
file_put_contents("on.txt","on");
SendMessage($chat_id,"✅ONLINE",'HTML',$back_admin,$message_id);
}

elseif($oghab == "coin to all"){
if(preg_match('/^([0-9])/',$text)){
file_put_contents("data/$from_id/wait.txt",$text);
file_put_contents("data/$from_id/com.txt","coin to all 2");
SendMessage($chat_id,"siz rostdan ham $text tadan tangani hammaga tarqatmoqchimisiz?

Ha yoki yo'q?",'HTML',json_encode(['resize_keyboard'=>true,'keyboard'=>[[['text'=>"Admin menu"]],[['text'=>"ha"],['text'=>"yo'q"]]]]),$message_id);
}else{
SendMessage($chat_id,"⚠️Jovobingiz xato!
Ha yoki Yo'q deng.",'HTML',$back_admin,$message_id);
}}
elseif($oghab == "coin to all 2"){
if($text == "yo'q"){
unlink("data/$from_id/wait.txt");
file_put_contents("data/$from_id/com.txt",'none');
SendMessage($chat_id,"✅ Muvaffaqiyatli bekor qilinadi. !",'html',$admin_keyboard,$message_id);
}
elseif($text == "ha"){
$Member = explode("\n",$list);
$count = count($Member)-2;
file_put_contents("data/$from_id/com.txt",'none');
for($z = 0;$z <= $count;$z++){
$user = $Member[$z];
if($user != "\n" && $user != " "){
$coin = file_get_contents("data/$user/golds.txt");
file_put_contents("data/$user/golds.txt",$coin + $wait);
SendMessage($user,"🎊Tabriklaymiz!
sizning xisobingizga $wait tanga Admin tomonidan qo'shildi.", "html","true");
}}
unlink("data/$from_id/wait.txt");
SendMessage($chat_id,"✅ muofaqiyatli hammaga $wait  yubordim!
✅tanga $memeber_count ta odamga yetkazildi!",'html',"true",$admin_keyboard,$message_id);
}else{
SendMessage($chat_id,"Iltimos, faqat quyidagi klaviaturadan tanlang.:",'HTML',json_encode(['resize_keyboard'=>true,'keyboard'=>[[['text'=>"Admin menu"]],[['text'=>"ha"],['text'=>"yo'q"]]]]),$message_id);    
}}


		
elseif($text == "😋 50 tanga bonus" && $chat_id == $ADMIN){
			file_put_contents("data/$from_id/com.txt","sendauto");
  bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"Kerakli foydalanuvchi IDsini yuboring :",'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"Admin menu"]],
	[['text'=>""]]
	]
	])
	]);
	}

	elseif($oghab == "sendauto" && $chat_id == $ADMIN){
	
	$teee = file_get_contents('data/'.$text."/golds.txt");
file_put_contents('data/'.$text."/golds.txt",$teee+50);

bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"10 tanga foydalanuvchiga yuborildi. ✅",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>"😋 10 tanga bonus"],
	['text'=>"📊 Statistika"]],
		[['text'=>"🙆🏻‍♂️barchaga xabar yubor"],
			['text'=>"🗣forward xabar"]],
			[['text'=>"🎁 hammaga tanga sovg'a"]],
			[['text'=>"❌botni o'chirish"],
	['text'=>"✅ botni yoqish"]],
      ],'resize_keyboard'=>true])
  ]);
  
  file_put_contents("data/$from_id/com.txt","none");
  
	}

elseif($text == "📊 Statistika"){
    $user = file_get_contents("Member.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
	sendmessage($chat_id , "
📊<b>Uz Nitroseen boti Hisoboti</b>

👥 Foydalanuvchi soni: $member_count ta

🚚 Buyurtmalar ️soni:   $sof ta

🚀 Ping-server:  $load[0]
<b>Do'stlaringizga ulashinig</b>
", "html","true");
}
elseif($text == "🙆🏻‍♂️barchaga xabar yubor" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/com.txt","send");
	
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"xabaringizni matn shaklida yuboring:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'Admin menu']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($oghab == "send" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/com.txt","no");
    
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"✅  xabaringiz $member_count ta foydalanuvchiga yetkazildi.",
  ]);
		$all_member = fopen( "Member.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			if($sticker_id != null){
			SendSticker($user,$sticker_id);
			}
			elseif($video_id != null){
			SendVideo($user,$video_id,$caption);
			}
			elseif($voice_id != null){
			SendVoice($user,$voice_id,'',$caption);
			}
			elseif($file_id != null){
			SendDocument($user,$file_id,'',$caption);
			}
			elseif($music_id != null){
			SendAudio($user,$music_id,'',$caption);
			}
			elseif($photo2_id != null){
			SendPhoto($user,$photo2_id,'',$caption);
			}
			elseif($photo1_id != null){
			SendPhoto($user,$photo1_id,'',$caption);
			}
			elseif($photo0_id != null){
			SendPhoto($user,$photo0_id,'',$caption);
			}
			elseif($text != null){
			SendMessage($user,$text,"html","true");
			}
		}
}
elseif($text == "🗣forward xabar" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/com.txt","fwd");
	
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"xabaringizni kiriting",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'Admin menu']],
      ],'resize_keyboard'=>true])
  ]);
}

elseif($oghab == "fwd" && $chat_id == $ADMIN){
    file_put_contents("data/$from_id/com.txt","no");
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"yuborilmoqda.....",
  ]);
$forp = fopen( "Member.txt", 'r'); 
while( !feof( $forp)) { 
$fakar = fgets( $forp); 
Forward($fakar, $chat_id,$message_id); 
  } 
   bot('sendMessage',[ 
   'chat_id'=>$chat_id, 
   'text'=>"✅Forward xabaringiz yetkazildi.", 
   ]);
}
}
?>