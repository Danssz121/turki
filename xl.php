<?php
function getnumber(){
	echo "önek kullanmalı 62\n";
	echo "örnek : 628195328718\n";
	echo "msisdn : ";
	$msisdn = trim(fgets(STDIN));
	return $msisdn;
}
function getotp(){
	echo "OTP'yi girin :";
	$otp = trim(fgets(STDIN));
	return $otp;
}

function getserviceid(){
	echo "KAYIT PAKETİ\n";
	$list=array(
		'1 waze ve 1 günlük sohbet',
  		'2 waze ve 3 günlük sohbet',
  		'3 waze ve 7 günlük sohbet',
  		'4 Sınırsız Instagram ve 1 günlük yemek',
  		'5 Sınırsız Instagram ve 3 günlük yemek',
  		'6 Sınırsız Instagram ve 7 günlük yemek',
  		'7 Sınırsız Instagram ve 1 günlük abonelik',
  		'8 Sınırsız Instagram ve 3 günlük abonelik',
  		'9 Sınırsız Instagram ve 7 günlük abonelik',
  		'10 Unli facebook ve 1 günlük yemek',
  		'11 Unli facebook ve 3 günlük yemek',
  		'12 Unli facebook ve 7 günlük yemek',
  		'13 Unli facebook ve 1 günlük blog',
  		'14 Unli facebook ve 3 günlük blog',
  		'15 Unli facebook ve 7 günlük blog',
  		'16 Ekstra Kuota Streaming & Sohbet Sahur 1 gün',
  		'17 Ekstra Kuota Streaming & Sohbet Sahur 3 gün',
  		'18 Ekstra Kuota Streaming & Sohbet Sahur 7 gün',
  		'19 Ekstra Kuota Streaming & 1 gün boyunca sohbet et',
  		'20 Ekstra Kuota Streaming & 3 gün boyunca sohbet et',
  		'21 Ekstra Kuota Streaming & 7 gün boyunca sohbet et',
          '22 Ekstra Kuota 30GB 30 Day', 
          '23 Ekstra Kuota Mobile Analog 10GB',
                '24 Manuel servis kimliği');

  		
	foreach($list as $lists){
		echo "$lists\n";
	}

	echo "\nPilih Paket : ";
	$a = trim(fgets(STDIN));

	switch($a){
		case '1' :
			$serviceid = 8211369;
			break;
		case '2' :
			$serviceid = 8211370;
			break;
		case '3' :
			$serviceid = 8211371;
			break;
		case '4' :
			$serviceid = 8211372;
			break;
		case '5' :
			$serviceid = 8211373;
			break;
		case '6' :
			$serviceid = 8211374;
			break;
		case '7' :
			$serviceid = 8211375;
			break;
		case '8' :
			$serviceid = 8211376;
			break;
		case '9' :
			$serviceid = 8211377;
			break;
		case '10' :
			$serviceid = 8211378;
			break;
		case '11' :
			$serviceid = 8211379;
			break;
		case '12' :
			$serviceid = 8211380;
			break;
		case '13' :
			$serviceid = 8211381;
			break;
		case '14' :
			$serviceid = 8211382;
			break;
		case '15' :
			$serviceid = 8211383;
			break;
		case '16' :
			$serviceid = 8211384;
			break;
		case '17' :
			$serviceid = 8211385;
			break;
		case '18' :
			$serviceid = 8211386;
			break;
		case '19' :
			$serviceid = 8211387;
			break;
		case '20' :
			$serviceid = 8211388;
			break;
		case '21' :
			$serviceid = 8211389;
	    case '22' :
			$serviceid = 8110671;
			break;
		case '23' :
			$serviceid = 8110813;
			break;
                case '24' :
	                echo "\nservice id : ";
	                $serviceid = trim(fgets(STDIN));
                        break;
		}
	return $serviceid;
}

function mintaotp($msisdn,$ReqID,$imei){
	$bod = array( 
		"Header"=>null,
 		"Body"=>[
  			"Header"=>[
   				"ReqID"=>"$ReqID054410",
   				"IMEI"=>"$imei"],
  			"LoginSendOTPRq"=>[
   			"msisdn"=>"$msisdn"]],
   		"sessionId"=>null,
 		"onNet"=>"True",
 		"platform"=>"02",
 		"serviceId"=>"",
 		"packageAmt"=>"",
 		"reloadType"=>"",
 		"reloadAmt"=>"",
 		"packageRegUnreg"=>"",
 		"appVersion"=>"3.8.2",
 		"sourceName"=>"Others",
 		"sourceVersion"=>"",
 		"screenName"=>"login.enterLoginNumber");
	$body = json_encode($bod);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://my.xl.co.id/pre/LoginSendOTPRq');
	$header = array(
		'Content-Type: application/json',
  		'Keep-Alive: true');
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
	$hasil = curl_exec($ch);
	$hasil1 = explode(',', $hasil);
	echo '{{'. $hasil1[1];
}

function login($msisdn,$otp,$ReqID,$imei){
	$bod1 = array(
		"Header"=>null,
	 "Body"=>[
	  "Header"=>[
	   "ReqID"=>"$ReqID054636",
	   "IMEI"=>"$imei"],
	  "LoginValidateOTPRq"=>[
	   "headerRq"=>[
	    "requestDate"=>"20190625",
	    "requestId"=>"$ReqID054636",
	    "channel"=>"MYXLPRELOGIN"],
	   "msisdn"=>"$msisdn",
	   "otp"=>"$otp"]],
	 "sessionId"=>null,
	 "platform"=>"02",
	 "msisdn_Type"=>"P",
	 "serviceId"=>"",
	 "packageAmt"=>"",
	 "reloadType"=>"",
	 "reloadAmt"=>"",
	 "packageRegUnreg"=>"",
	 "appVersion"=>"3.8.2",
	 "sourceName"=>"Others",
	 "sourceVersion"=>"",
	 "screenName"=>"login.enterLoginOTP",
	 "mbb_category"=>"");
	$body1 = json_encode($bod1);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://my.xl.co.id/pre/LoginValidateOTPRq');
	$header = array(
	  'Content-Type: application/json',
	  'Keep-Alive: true',
	);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body1);
	$hasil = curl_exec($ch);
	$hasil1 = json_decode($hasil);
	$sessionid = $hasil1->sessionId;
	$hasil2 = explode(',', $hasil);
	echo "$hasil2[1]\n";
	return $sessionid;
	}

function beli($msisdn,$sessionid,$serviceid,$imei,$ReqID){
	$bod2 = array(
	  "Header"=>null,
	  "Body"=>[
	   "HeaderRequest"=>[
     "applicationID"=>"3",
     "applicationSubID"=>"1",
     "touchpoint"=>"MYXL",
     "requestID"=>"$ReqID132245",
     "msisdn"=>"$msisdn",
     "serviceID"=>"$serviceid"],
	    "opPurchase"=>[
     "msisdn"=>"$msisdn",
     "serviceid"=>"$serviceid"],
	    "XBOXRequest"=>[
     "requestName"=>"GetSubscriberMenuId",
     "Subscriber_Number"=>"1301235663",
     "Source"=>"mapps",
     "Trans_ID"=>"119520832111",
     "Home_POC"=>"BJ0",
     "PRICE_PLAN"=>"513738114",
     "PayCat"=>"PRE-PAID",
     "Active_End"=>"20190615",
     "Grace_End"=>"20190715",
     "Rembal"=>"0",
     "IMSI"=>"510120032177230",
     "IMEI"=>"$imei",
     "Shortcode"=>"mapps"],
	    "Header"=>[
     "IMEI"=>"$imei",
     "ReqID"=>"$ReqID132245"]],
	   "sessionId"=>"$sessionid",
	   "serviceId"=>"$serviceid",
	   "packageRegUnreg"=>"Reg",
	   "reloadType"=>"",
	   "reloadAmt"=>"",
	   "packageAmt"=>"99.000",
	   "platform"=>"02",
   "appVersion"=>"3.8.2",
   "sourceName"=>"Others",
   "sourceVersion"=>"",
   "msisdn_Type"=>"P",
     "screenName"=>"home.storeFrontReviewConfirm",
   "mbb_category"=>"");
	$body2 = json_encode($bod2);
	$ch = curl_init();
	$header = array('Content-Type: application/json', 'Referer: https://my.xl.co.id/pre/index1.html', 'Accept-Encoding: gzip, deflate, br', 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7');
	curl_setopt($ch, CURLOPT_URL, 'https://my.xl.co.id/pre/opPurchase');
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $body2);
	$hasil = curl_exec($ch);
	echo "\n$hasil\n";
	return;
}
echo date('l, d-m-Y  h:i:s a');
$ReqID = date('Ymd');
$imei = 1588165532;
for ($o = 1; $o > 0; $o++){
	echo "\nMenü\n";
	echo "1.Şifre iste\n";
	echo "2.Giriş yapın ve bir paket satın alın\n";
	echo "3.Tekrar al\n";
        echo "4.Çık dışarı\n";
        echo "seçim yap : ";
	$i = trim(fgets(STDIN));
	switch($i){
	case '1':
		$anu = getnumber();
		$anu1 = mintaotp($anu,$ReqID,$imei);
		break;
	case '2':
		$anu = getnumber();
		$anu1 = getotp();
		$anu2 = login($anu,$anu1,$ReqID,$imei);
	case '3':
		$anu5 = getserviceid();
		echo "$anu2\n" . "$anu\n" . "$anu1\n";
                system(clear);
		$anu4 = beli($anu,$anu2,$anu5,$imei,$ReqID);
		echo "\nPaket girilmezse, lütfen seçenekler menüsüne 3 yazın\n";
		break;
	case '4':
		exit('bu aracı kullandığınız için teşekkürler');
		break;
	}
}
