<?php

$http_origin = ( !empty( $_POST['origin'] ) ) ? $_POST['origin'] : 'empty' ;


$allowed_http_origins   = array(
                            "http://resume.outsoftsolutions.com"   ,
                            "http://apps.outsoftsolutions.com"  ,
                            "http://resume.outsoft.com"  ,
                            "http://games.outsoftsolutions.com",
                            "http://lp.outsoft.com",
                            // "http://lp.outsoft.com/outsoft",
                            // "http://lp.outsoft.com/outsoft2",
                            // "http://lp.outsoft.com/resume",
                            // "http://lp.outsoft.com/resume-green",
                          );

if (in_array($http_origin, $allowed_http_origins)){  
    @header("Access-Control-Allow-Origin: " . $http_origin);
}

//header('Access-Control-Allow-Origin: http://resume.outsoftsolutions.com');
//header('Access-Control-Allow-Origin: http://apps.outsoftsolutions.com');
header('Access-Control-Allow-Methods: POST');
//$mailheaders .= "From: " . $_POST["userName"] . " <" . $_POST["userEmail"] . ">\r\n";

date_default_timezone_set('Europe/Kiev');

require 'lib/class.phpmailer.php';
require 'lib/class.smtp.php';


$lastSale = file_get_contents('ls.txt');


$sls = array(
	array (
		'name' => 'Taras',
		'email' => 'taras@outsoft.com'
	),
	// array (
	// 	'name' => 'Alex',
	// 	'email' => 'alexey@outsoft.com'
	// ),
);

$nn = ( $lastSale !== false && intval( $lastSale ) == 0 ) ? 0 : 0;
$ts = $sls[$nn];

var_dump($http_origin);

file_put_contents( 'ls.txt', strval( $nn ) );




$the_source = ( !empty( $_POST['the_source']  ) ) ? parse_url( $_POST['the_source'] ) : array( 'host' => 'none' );
$the_request = ( !empty( $_POST['the_req'] ) ) ? $_POST['the_req'] : 'empty' ;




$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(false);
$mail->Username = "info2@outsoft.com"; //логин почты вбить сюда
$mail->Password = "Lets1204Go"; //сюда пароль от почты
$mail->SetFrom( $_POST["userEmail"], $_POST["userEmail"] );
$mail->Subject = $_POST["subject"];
$mail->Body = "Assigned to: " . $ts['name'] . "\n---\n" . $_POST["content"].' '. $_SERVER['REMOTE_ADDR'] . "\n" . 'Lead Source: ' . $the_source['host'] . "\nRequest: " . $the_request;

$mail->AddAddress("info@outsoftsolutions.com");
$mail->AddAddress("info2@outsoft.com");


if ( $http_origin == "http://resume.outsoft.com" ) {
	$mail->AddAddress("outsoft.sem@gmail.com");
}

if ( $http_origin == "http://resume.outsoftsolutions.com" || $http_origin == "http://lp.outsoft.com" ) {
	$mail->AddAddress("outsoft.gdn@gmail.com");
}

$mail->AddAddress("andrey.boiko@outsoft.com");
$mail->AddAddress("anastasia@outsoft.com");
$mail->AddAddress("taras@outsoft.com");
$mail->AddAddress("alexey@outsoft.com");
$nm = explode( ' ', trim( $_POST["userName"] ) );




$fName = $nm[0];
$lName = '';
array_shift( $nm );

if ( count( $nm ) > 0 ) {
	$lName = trim( implode(' ', $nm) );
}

if ( empty( $lName ) ) {
	$lName = $fName;
	$fName = '';
}

// if ($http_origin == "http://resume.outsoftsolutions.com") {
// 	$landingPage = 'Resumes';
// } elseif ($http_origin == "http://apps.outsoftsolutions.com") {
// 	$landingPage = 'Apps';
// }

$landingPage = $http_origin;


$ip = $_SERVER['REMOTE_ADDR'];
$location = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip={$ip}"));

$the_data = '
<Leads>
<row no="1">
<FL val="Lead Source">' . $the_source['host'] . '</FL>
<FL val="Request String">' .htmlspecialchars($the_request) . '</FL>
<FL val="First Name">' . $fName . '</FL>
<FL val="Last Name">' . $lName . '</FL>

<FL val="Landing Page">' . htmlspecialchars($_POST['fullUrl']) . '</FL>
<FL val="Request String">' . htmlspecialchars($_POST['keyword']) . '</FL>

<FL val="Email">' . $_POST["userEmail"] . '</FL>
<FL val="Phone">' . $_POST["userPhone"] . '</FL>
<FL val="Description">' . htmlspecialchars( $_POST["content"] ).' '. $_SERVER['REMOTE_ADDR'] . '</FL>
<FL val="Country">' . $location->geoplugin_countryName . '</FL>
<FL val="Landing Page">' . $landingPage . '</FL>
<FL val="Lead Status">NEW</FL>
<FL val="Lead Owner">' . $ts['email'] . '</FL>
</row>
</Leads>';




httpPost($the_data);


if(!$mail->Send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	echo "Message has been sent";
}

//load html template
$message = <<<TEMPLATE
<div style="color: #44484C;
	background-color: #f9f9f9;
	padding: 46px;
	font-family: Helvetica, Arial, sans-serif;
	font-size: 16px;
	line-height: 23px;">
	<table cellspacing="0" cellpadding="0" style="
		background-color: white;
		border: 0;
		border-top: 5px solid #f9a61a;
		width: 600px;
		margin: 0 auto;
		padding: 0 53px 23px;
		color:#44484C;">
		<tr>
			<td colspan="2" style="padding: 46px 0;text-align:center;">
				<img width="106" height="92" src="http://outsoft.com/common/outsoft_top.png" alt="outsoft top logo">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<h1 style="font-size: 36px;
				    line-height: 46px;
				    padding: 0 0 23px;
				    margin: 0;">
				    Hello {$_POST['userName']},
				</h1>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="font-size: 16px;
    line-height: 23px;">
				My name is {$ts['name']} and I will be your personal support manager in Outsoft.
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<h2 style="font-size: 25px;
				    line-height: 46px;
				    padding: 23px 0 0;
				    margin: 0;">
			    	I've got your request:
			    </h2>
			</td>
		</tr>
		<tr>
			<td style="vertical-align: top;width: 17px;">
				<img src="http://outsoft.com/common/quote.png" width="17" height="15" alt="quote">
			</td>
			<td style="padding-left: 36px;
				margin: 0;
				font-style: italic;
				font-size: 16px;
    line-height: 23px;width: 477px;">
    			{$_POST['cleanContent']}
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<h2 style="text-align:center;
					font-size: 25px;
				    line-height: 46px;
				    padding: 23px 0 0;
				    margin: 0;">
				    and I'll get back to you shortly!
			    </h2>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="font-weight: bold;
			    font-size: 17px;
			    line-height: 23px;
			    padding: 23px 0;
			    text-align: center;">
			    MEANWHILE, YOU CAN:
		    </td>
		</tr>
		<tr>
			<td colspan="2" style="font-size: 16px;
    line-height: 23px;">
				<a href="http://outsoft.com/company/about-us/?utm_source=Email&utm_medium=AutoReply" style="display: block;
				    width: 400px;
				    margin: 0 auto 10px;
				    padding: 12px 0 11px;
				    font-size: 17px;
				    font-weight: bold;
				    text-decoration: none;
				    text-align: center;
				    color: white;
				    background-color: #F6631D;
				    border-bottom: 2px solid rgba(0,0,0,0.2);">
					FIND OUT MORE ABOUT OUR COMPANY
				</a>
				<a href="http://outsoft.com/portfolio/?utm_source=Email&utm_medium=AutoReply" style="display: block;
				    width: 400px;
				    margin: 0 auto 10px;
				    padding: 12px 0 11px;
				    font-size: 17px;
				    font-weight: bold;
				    text-decoration: none;
				    text-align: center;
				    color: white;
				    background-color: #F6631D;
				    border-bottom: 2px solid rgba(0,0,0,0.2);">
					LOOK INTO OUR PORTFOLIO
				</a>
				<a href="http://outsoft.com/blog/?utm_source=Email&utm_medium=AutoReply" style="display: block;
				    width: 400px;
				    margin: 0 auto 10px;
				    padding: 12px 0 11px;
				    font-size: 17px;
				    font-weight: bold;
				    text-decoration: none;
				    text-align: center;
				    color: white;
				    background-color: #F6631D;
				    border-bottom: 2px solid rgba(0,0,0,0.2);">
					CHECK OUT OUR BLOG
				</a>
			</td>
		</tr>
	</table>

	<table cellspacing="0" cellpadding="0" style="width: 620px;
	    margin: 0 auto;
	    background: #f9a61a;
	    color:#44484C;">
		<tr style="
		    font-weight: bold;
		    color: white;
		    background-color: #f9a61a;
		    ">
			<td style="font-size: 20px;padding: 10px 5px 0;
		    line-height: 46px;text-align: center;">
				We also welcome you to follow us on:
			</td>
		</tr>
		<tr>
			<td style="padding: 7px 5px 22px;
    text-align: center;">
				<a href="https://www.facebook.com/outsoftcorp/" style="text-decoration: none;
			    margin: 0 15px 0;"><img src="http://outsoft.com/common/fb.png" alt="fb"></a>
				<a href="https://twitter.com/OutsoftCorp" style="text-decoration: none;
			    margin: 0 20px 0;"><img src="http://outsoft.com/common/twitter.png" alt="twitter"></a>
				<a href="https://www.linkedin.com/company/outsoft-corp/" style="text-decoration: none;
			    margin: 0 15px 0;"><img src="http://outsoft.com/common/linkedin.png" alt="linkedin"></a>
			</td>
		</tr>
	</table>

	<table cellspacing="0" cellpadding="0" style="width:600px;margin:0 auto;color:#44484C;">
		<tr>
			<td colspan="3" style="background-color: white;
			    width: 494px;
			    margin: 0 auto;
			    padding: 0 53px 23px;
			    text-align: center;">
			    <h2 style="font-size: 25px;
				    line-height: 46px;
				    padding: 23px 0 0;
				    margin: 0;">
				    Speak to you soon!
			    </h2>
		    </td>
		</tr>
		<tr>
			<td style="    background-color: #f9f9f9;
    border-top: 2px solid rgba(0,0,0,0.2);
    width: 77px;
    margin: 0 auto;
    padding: 0;"></td>
			<td style="width:30px;padding:0;margin:0;">
				<img src="http://outsoft.com/common/tri.png" width="30" height="17" alt="">
			</td>
			<td style="background-color: #f9f9f9;
		border-top: 2px solid rgba(0,0,0,0.2);
		width: 494px;
		margin: 0 auto;
		padding: 0 53px;"></td>
		</tr>
	</table>
	<table style="width:600px;margin:0 auto;">
		<tr>
			<td style="width: 49px;"></td>
			<td style="padding: 3px 0;
    width: 68px;">
				<img src="http://outsoft.com/common/mr_taras_final.png" width="50" height="50" alt="">
			</td>
			<td>
				<strong>{$ts['name']}</strong> from Outsoft
			</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: center;
    padding: 10px;">
				<img src="http://outsoft.com/common/outsoft_logo_bottom.png" width="146" height="23" alt="">
			</td>
		</tr>
	</table>
</div>
TEMPLATE;


// Для отправки HTML-письма должен быть установлен заголовок Content-type
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Дополнительные заголовки
$headers .= 'From: ' . $ts['email'] . "\r\n";
$headers .= "Reply-to:  " . $ts['email'] . "\r\n";



$subject = $_POST["titleMail"];
$leademail = $_POST["userEmail"];
mail($leademail, $subject, $message, $headers);
 








function httpPost($data)
{
    $url = 'https://crm.zoho.com/crm/private/xml/Leads/insertRecords?newFormat=1&authtoken=72a586f010dca66e28bb316b1a26a18f&scope=crmapi';

	$fields = array(
        'xmlData'=>$data
	);

	$postvars='';
	$sep='';
	foreach($fields as $key=>$value)
	{
	        $postvars.= $sep.urlencode($key).'='.urlencode($value);
	        $sep='&';
	}

	$ch = curl_init();

	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

	$result = curl_exec($ch);

	file_put_contents(
		'log.txt',
		date("Y-m-d H:i:s") . " > " .  $_POST["userName"] . " " . var_export($result) . "\n",
		FILE_APPEND
	);
	
	file_put_contents(
		'log.txt',
		$data . "\n",
		FILE_APPEND
	);

	if (FALSE === $result) {

		file_put_contents(
			'log.txt',
			" - - - - - - - -\n" . curl_errno($ch) . " : " . curl_error($ch),
			FILE_APPEND
		);

	} else {

		$rrr = '';

		if ( function_exists( 'simplexml_load_string' ) ) {
			$xml = simplexml_load_string( $result );
			if ( $xml ) {
				if ( $xml->error ) {
					$rrr .= " - - - - - - - -\n" . $xml->error->code . " : " .$xml->error->message;
				}
			} else {
				$rrr .= " + + + + + + + +\nResult: " . $xml->result->message;
			}
		}

		if ( empty($rrr) ) $rrr .= " * * * * * * * *\nResult: " . $result;

		file_put_contents(
			'log.txt',
			$rrr,
			FILE_APPEND
		);
	}

	file_put_contents(
		'log.txt',
		"\n\n",
		FILE_APPEND
	);
	
	curl_close($ch);
}
?>