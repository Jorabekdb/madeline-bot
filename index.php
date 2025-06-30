<?php 
declare(strict_types=1);
use danog\MadelineProto\EventHandler\Attributes\Handler;
use danog\MadelineProto\EventHandler\Message;
use danog\MadelineProto\ParseMode;
use danog\MadelineProto\EventHandler\SimpleFilter\IsNotEdited;
use danog\MadelineProto\EventHandler\Message\ChannelMessage;
use danog\MadelineProto\EventHandler\SimpleFilter\Incoming;
use danog\MadelineProto\EventHandler\SimpleFilter\Outgoing;
use danog\MadelineProto\EventHandler\Message\PrivateMessage;
use danog\MadelineProto\SimpleEventHandler;
if (file_exists('vendor/autoload.php')) {
    require_once 'vendor/autoload.php';
} else {
    if (!file_exists('madeline.php')) {
        copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
    }
    require_once 'madeline.php';
}
class BasicEventHandler extends SimpleEventHandler
{
    public const ADMIN = "@Uhladiz_brat";
    
    public function getReportPeers()
{ 
return '@Bug_report_user'; 
}
        #[Handler]
    public function makeComment(Incoming&ChannelMessage&IsNotEdited $message): void
    {
        $text = Amp\File\read("0");
    if ($text === "on") {
        $coment =  Amp\File\read("1");
        $message->getDiscussion()->reply(
            message: "$coment",
            parseMode: ParseMode::MARKDOWN
        );
    }}       

#[Handler]
public function autorepliymass(IsNotEdited & PrivateMessage & Incoming $message): void 
{
$deletmassage = $message->reply("🧑🏻‍💻...");
$deletmassage->editText("```𝑩𝒆𝒌𝒐
🌠 𝙰𝚔𝚊𝚞𝚗𝚝 𝙴𝚐𝚊𝚜𝚒 𝙷𝚘𝚣𝚒𝚛𝚌𝚑𝚊 𝙱𝚊𝚗𝚝, 𝚈𝚘𝚔𝚒 𝙾𝚗𝚕𝚊𝚒𝚗 𝙴𝚖𝚊𝚜 𝙷𝚊𝚋𝚊𝚛𝚒𝚗𝚐𝚒𝚣𝚗𝚒 𝙸𝚖𝚔𝚘𝚗𝚚𝚊𝚍𝚊𝚛 𝚃𝚎𝚣𝚛𝚘𝚚 𝙾ʻ𝚚𝚒𝚋 𝙹𝚊𝚟𝚘𝚋 𝚈𝚘𝚣𝚊𝚍𝚒.\```

[𝙱𝚎𝚔𝚘 𝙰𝚋𝚘𝚞𝚝](t.me/beko_bio)
[𝙱𝚎𝚔𝚘 𝙸𝚗𝚜𝚝𝚊𝚐𝚛𝚊𝚖 ](instagram.com/beko.0.07?igsh=MThqYXZoY3h6aGNhcQ==)");
$deletmassage->addReaction('👨‍💻');
$this->sleep(30);
$deletmassage->delete();
}

        #[Handler]
    public function funksya(Message&Outgoing&IsNotEdited $message): void
    {
$text = $message->message;
if($text == ".coment_on"){
	        $texi = Amp\File\read("0");
	if($texi == 'on'){
		$message->editText("⚠️ Auto Kamment Allaqachon Yoniq.");
		return;
		}
Amp\File\write("0",'on');
$message->editText("✅ Auto Kamment Yoqildi.");
}
if($text == ".coment_off"){
	        $texi = Amp\File\read("0");
	if($texi == 'off'){
		$message->editText("⚠️ Auto Kamment Allaqachon Oʻchiq.");
		return;
		}
Amp\File\write("0",'off');
$message->editText("❌ Auto Kamment Oʻchrildi.");
}
if (strpos($text, '.koment') !== false) {
$text = str_replace(".koment", "", $text);
Amp\File\write("1","$text");
$message->editText("📝( $text ) Soʻzi Saqlandi.");
}
if($text == ".help"){
    $start_time = round(microtime(true) * 1000);
	$realtime = date("Y.m.d. H:i:s");
	$text = Amp\File\read("0");
	$text = str_replace("on", "Yoniq", $text);
	$text = str_replace("off", "Oʻchiq", $text);
	$coment =  Amp\File\read("1");
	if ($coment == null) {
    $coment = 'Boʻsh';
    }
    $end_time = round(microtime(true) * 1000);
$tmt = $end_time - $start_time;
$message->editText("
.coment_on - ✅ Auto Camentni Yoqish.
.coment_off - ❌ Auto Camentni Oʻchrish.
.coment SOʻZ  - 📝 Izohni Taxrirlash.
.restart - ♻️ Botni Qayta Yuklash.
.help - 🗞️ Buyruqlar Boʻlmi.
----------------------------------------------
➡️ Komentdagi Soʻz ($coment)
➡️ Bot Holati ($text)
➡️ Vaqt ($realtime)
➡️ Bot Tezlgi ($tmt ms)");
}
if($text == ".restart"){
$message->editText("♻️ Userbot Qayta Yuklandi.");
$this->restart();
}}}
BasicEventHandler::startAndLoop('madeline.session');
?>