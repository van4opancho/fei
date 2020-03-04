<?
$name = $_POST['name'];
$phone = $_POST['phone'];
$ip = $_SERVER['REMOTE_ADDR'];

$post = [
    'name' => $name,
    'phone' => $phone,
    'aim' => 1,
    'productsum' => "1990",
    'hash' => 'M8nDR',
    'subid1' => 'sub1',
    'subid2' => 'sub2',
    'subid3' => 'sub3',
    'subid4' => 'sub4',
    'ip' => $ip,
];

$ch = curl_init("https://leadtrade.ru/api/send_lead");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.152 Safari/537.36");
$doc = curl_exec($ch);
curl_close($ch);

$time = date('m-d H:i');
$file = fopen("file.txt","at");
fwrite($file,"\n Дата:$time Имя:$name Телефон:$phone IP:$ip\n");
fclose($file);
header ('Location: success/success.html');