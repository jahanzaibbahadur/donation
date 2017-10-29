<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

define("AUTHORIZENET_LOG_FILE", "phplog");    

class Authorize {
	public function Authorize() {
		require 'authorize/vendor/autoload.php';
		// $this->load->model('user_model');
	}
	
	
	function CreateCustomerProfile($user,$setting)
	{
		/* Create a merchantAuthenticationType object with authentication details
		   retrieved from the constants file */
		$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
		$merchantAuthentication->setName($setting->MERCHANT_LOGIN_ID);
		$merchantAuthentication->setTransactionKey($setting->MERCHANT_TRANSACTION_KEY);
		
		// Set the transaction's refId
		$refId = 'ref' . time();
		
		// Create a new CustomerProfileType and add the payment profile object
		$customerProfile = new AnetAPI\CustomerProfileType();
		$customerProfile->setDescription("Donor ".$user->id);
		$customerProfile->setMerchantCustomerId("M_" . time());
		$customerProfile->setEmail($user->email);
		
		// Assemble the complete transaction request
		$request = new AnetAPI\CreateCustomerProfileRequest();
		$request->setMerchantAuthentication($merchantAuthentication);
		$request->setRefId($refId);
		$request->setProfile($customerProfile);
		// Create the controller and get the response
		$controller = new AnetController\CreateCustomerProfileController($request);
		$response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
	  
		if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
			$res = ['status' => 'success','profile_id' => $response->getCustomerProfileId()];
			//echo json_encode(array('status' => 'success', 'profile_id' => $response->getCustomerProfileId()));
				//echo "Succesfully created customer profile : " . $response->getCustomerProfileId() . "\n";
			//echo "SUCCESS: PAYMENT PROFILE ID : " . $paymentProfiles[0] . "\n";
		} else {
			//echo "ERROR :  Invalid response\n";
			$errorMessages = $response->getMessages()->getMessage();
			$res = ['status' => 'error', 'code' => $errorMessages[0]->getCode(), 'message' => $errorMessages[0]->getText()];
			//echo json_encode(array('status' => 'failed', 'message' => $errorMessages[0]->getText()));
			//echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
		}
		return $res;
	}
function updateCustomerPaymentProfile($user,$profile,$setting) {
	$customerProfileId=$user['profileid'];
    /* Create a merchantAuthenticationType object with authentication details
       retrieved from the constants file */
	   
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName($setting->MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey($setting->MERCHANT_TRANSACTION_KEY);
    
    // Set the transaction's refId
    $refId = 'ref' . time();

	  //Set profile ids of profile to be updated
	  $request = new AnetAPI\UpdateCustomerPaymentProfileRequest();
	  $request->setMerchantAuthentication($merchantAuthentication);
	  $request->setCustomerProfileId($customerProfileId);
	  $controller = new AnetController\GetCustomerProfileController($request);


	  // We're updating the billing address but everything has to be passed in an update
	  // For card information you can pass exactly what comes back from an GetCustomerPaymentProfile
	  // if you don't need to update that info
	  $creditCard = new AnetAPI\CreditCardType();
		$str1="XXXXXXXXXXXX";
		$str2=$profile->card_number;
	 $card_number=$str1.$str2;
	 
	 //echo $card_number;
	  $creditCard->setCardNumber($card_number);
	  $creditCard->setExpirationDate("XXXX");
	  $paymentCreditCard = new AnetAPI\PaymentType();
	  $paymentCreditCard->setCreditCard($creditCard);

	  // Create the Bill To info for new payment type
	   $billto = new AnetAPI\CustomerAddressType();
    $billto->setFirstName($user->firstname);
    $billto->setLastName($user->lastname);
    //$billto->setCompany("Souveniropolis");
    $billto->setAddress($user->address);
    $billto->setCity($user->city);
    $billto->setState($user->state);
    $billto->setZip($user->zip);
    $billto->setCountry("USA");
    $billto->setPhoneNumber($user->mobile);
	  
//echo $customerPaymentProfileId;
	  // Create the Customer Payment Profile object
	  $paymentprofile = new AnetAPI\CustomerPaymentProfileExType();
	  $paymentprofile->setCustomerPaymentProfileId($profile->payment_id);
	  $paymentprofile->setBillTo($billto);
	  $paymentprofile->setPayment($paymentCreditCard);

	  // Submit a UpdatePaymentProfileRequest
	  $request->setPaymentProfile( $paymentprofile );

	  $controller = new AnetController\UpdateCustomerPaymentProfileController($request);
	  $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);
	  if (($response != null) && ($response->getMessages()->getResultCode() == "Ok") )
	  {
		 //echo "Update Customer Payment Profile SUCCESS: " . "\n";
		// unset($_SESSION['update_profile']);
				  echo json_encode(array('status' => 'success'));
		 // Update only returns success or fail, if success
		 // confirm the update by doing a GetCustomerPaymentProfile
	  }
	  else
	  {	echo json_encode(array('status' => 'failed'));
		 // echo "Update Customer Payment Profile: ERROR Invalid response\n";
//$errorMessages = $response->getMessages()->getMessage();
	//	  echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
	  }
	 // return $response;
	  exit();
  }	
  
  
  
  function createCustomerPaymentProfile($user,$card_details)
{
    /* Create a merchantAuthenticationType object with authentication details
       retrieved from the constants file */
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName($setting->MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey($setting->MERCHANT_TRANSACTION_KEY);
    
    // Set the transaction's refId
    $refId = 'ref' . time();

    // Create a Customer Profile Request
    //  1. (Optionally) create a Payment Profile
    //  2. (Optionally) create a Shipping Profile
    //  3. Create a Customer Profile (or specify an existing profile)
    //  4. Submit a CreateCustomerProfile Request
    //  5. Validate Profile ID returned

    // Set credit card information for payment profile
	
	$card_number = str_replace(" ","",$card_details['card_number']);
	$expiration_date = $card_details['expiration_year'] . '-' . $card_details['expiration_month'];
	$cvv = $card_details['cvv'];
	
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($card_number);
    $creditCard->setExpirationDate($expiration_date);
    $creditCard->setCardCode($cvv);
	
    $paymentCreditCard = new AnetAPI\PaymentType();
    $paymentCreditCard->setCreditCard($creditCard);

    // Create the Bill To info for new payment type
    $billto = new AnetAPI\CustomerAddressType();
    $billto->setFirstName($user->firstname);
    $billto->setLastName($user->lastname);
    //$billto->setCompany("Souveniropolis");
    $billto->setAddress($user->address);
    $billto->setCity($user->city);
    $billto->setState($user->state);
    $billto->setZip($user->zip);
    $billto->setCountry("USA");
    $billto->setPhoneNumber($user->mobile);
    //$billto->setfaxNumber("999-999-9999");

    // Create a new Customer Payment Profile object
    $paymentprofile = new AnetAPI\CustomerPaymentProfileType();
    $paymentprofile->setCustomerType('individual');
    $paymentprofile->setBillTo($billto);
    $paymentprofile->setPayment($paymentCreditCard);
    $paymentprofile->setDefaultPaymentProfile(true);

    $paymentprofiles[] = $paymentprofile;

    // Assemble the complete transaction request
    $paymentprofilerequest = new AnetAPI\CreateCustomerPaymentProfileRequest();
    $paymentprofilerequest->setMerchantAuthentication($merchantAuthentication);

    // Add an existing profile id to the request
    $paymentprofilerequest->setCustomerProfileId($user->profileid);
    $paymentprofilerequest->setPaymentProfile($paymentprofile);
    $paymentprofilerequest->setValidationMode("liveMode");

    // Create the controller and get the response
    $controller = new AnetController\CreateCustomerPaymentProfileController($paymentprofilerequest);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

    if (($response != null) && ($response->getMessages()->getResultCode() == "Ok") ) {
		$payment_id = $response->getCustomerPaymentProfileId();
		$card_type = get_card_type($card_number);
		$cc_number = substr($card_number, -4);
		$profile = array(
        'user_id' => 'red',
        'payment_id' => $payment_id,
        'card_type' => $card_type,
        'card_number' => $cc_number
			);
			$this->user_model->insert_payment_profile($profile);
		return array('status'=>true, 'payment_id' => $payment_id);
    } else {
        //echo "Create Customer Payment Profile: ERROR Invalid response\n";
        $errorMessages = $response->getMessages()->getMessage();
		return array('status' => false, 'message' => "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n");
    }
}


function charge_card($user, $payment_id,$user, $setting){    
	
	$profile_id = $user->profileid;
	$amount = $this->session->userdata('amount');
	$recurring_frequency =$this->session->userdata('recurring_frequency');
	
	if($recurring_frequency == 'monthly'){
		$intervalLength = 1;
	}else if($recurring_frequency == 'quarterly'){
		$intervalLength = 3;
	}else if($recurring_frequency == 'yearly'){
		$intervalLength = 12;
	}else{
		$intervalLength = 0;
	}
	
	if($intervalLength != 0){
		 createSubscriptionFromCustomerProfile( $intervalLength, $profile_id, $payment_id);
	}else{
		chargeCustomerProfile($profile_id,$payment_id,$amount,$user, $setting);
	}
}

function chargeCustomerProfile($profileid, $paymentprofileid, $amount, $user, $setting)
{
    /* Create a merchantAuthenticationType object with authentication details
       retrieved from the constants file */
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(\SampleCode\Constants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCode\Constants::MERCHANT_TRANSACTION_KEY);
    
    // Set the transaction's refId
    $refId = 'ref' . time();

    $profileToCharge = new AnetAPI\CustomerProfilePaymentType();
    $profileToCharge->setCustomerProfileId($profileid);
    $paymentProfile = new AnetAPI\PaymentProfileType();
    $paymentProfile->setPaymentProfileId($paymentprofileid);
    $profileToCharge->setPaymentProfile($paymentProfile);

    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType( "authCaptureTransaction"); 
    $transactionRequestType->setAmount($amount);
    $transactionRequestType->setProfile($profileToCharge);

    $request = new AnetAPI\CreateTransactionRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setRefId( $refId);
    $request->setTransactionRequest( $transactionRequestType);
    $controller = new AnetController\CreateTransactionController($request);
    $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);

    if ($response != null)
    {
      if($response->getMessages()->getResultCode() == \SampleCode\Constants::RESPONSE_OK)
      {
        $tresponse = $response->getTransactionResponse();
        
	      if ($tresponse != null && $tresponse->getMessages() != null)   
        {	$_SESSION['thankyou']="thankyou";
		$now_datetime=date("Y-m-d H:i:s");
		$tranid = $tresponse->getTransId();
		$profile = array(
        'user_id' => $this->session->userdata('user_id'),
        'payment_id' => ('payment_profile'),
        'txid' => $tranid,
		'amount' => $this->session->userdata('amount')
			);
	 // insert_row("insert into recipt(user_id,payment_id,txid,amount,donated_at) values('".$_SESSION['user_id']."','".$_POST['payment_profile']."','".$tranid."','".$_SESSION['amount']."','".$now_datetime."')");
			//$id = mysql_insert_id();
			$id=$this->user_model->inser_recipt($detail);
			$this->user_model->recipt($id,$user,$setting);
			echo json_encode(array('status' => 'success', 'message' => $tresponse->getMessages()[0]->getDescription()));
      //    echo " Transaction Response code : " . $tresponse->getResponseCode() . "\n";
        //  echo  "Charge Customer Profile APPROVED  :" . "\n";
         // echo " Charge Customer Profile AUTH CODE : " . $tresponse->getAuthCode() . "\n";
         // echo " Charge Customer Profile TRANS ID  : " . $tresponse->getTransId() . "\n";
         // echo " Code : " . $tresponse->getMessages()[0]->getCode() . "\n"; 
	       // echo " Description : " . $tresponse->getMessages()[0]->getDescription() . "\n";
        }
        else
        {
         // echo "Transaction Failed \n";
          if($tresponse->getErrors() != null)
          {
			  //echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
		   //echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";  
			  echo json_encode(array('status' => 'failed', 'message' => $tresponse->getErrors()[0]->getErrorText(), 'code' => $tresponse->getErrors()[0]->getErrorCode() ));
          }
        }
      }
      else
      {
        //echo "Transaction Failed \n";
        $tresponse = $response->getTransactionResponse();
        if($tresponse != null && $tresponse->getErrors() != null)
        {
			$error_code = $tresponse->getErrors()[0]->getErrorCode();
			$error_message = $tresponse->getErrors()[0]->getErrorText();
			//echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
			//echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";                      
        }
        else
        {
			$error_code = $response->getMessages()->getMessage()[0]->getCode();
			$error_message = $response->getMessages()->getMessage()[0]->getText();
			//echo " Error code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
			//echo " Error message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
        }
		echo json_encode(array('status' => 'failed', 'message' => $error_message, 'code' => $error_code));
      }
    }
    else
    {	
		echo json_encode(array('status' => 'Failed'));
      //echo  "No response returned \n";
    }
	unset($_SESSION['amount']);
	exit;
    //return $response;
}

}
?>