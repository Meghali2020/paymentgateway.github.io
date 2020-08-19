<?php

$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Amount=$_POST['Amount'];
$Phone=$_POST['phone'];
$purpose='Donation';


include 'instamojo/Instamojo.php';
$api = new Instamojo\Instamojo('test_8869c31e8ef97bf40f6285ea16f', 'test_0be900a36a603e40d00a23e61e9', 'https://test.instamojo.com/api/1.1/');

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $Amount,
        "send_email" => true,
        "email" => $Email,
        "buyer_name" =>$Name,
        "phone"=>$Phone,
        "send_sms" => true,
        "allow_repeated_payments" =>false,
        "redirect_url" => "https://payment-gateway-integration.com/redirect.php"
        "webhook" =>"https://payment-gateway-integration.com/webhook.php"
        ));
    //print_r($response);
    $pay_url=$response['longurl'];
    header("location: $pay_url");
	}
	catch (Exception $e) {
	    print('Error: ' . $e->getMessage());
	}
?>
