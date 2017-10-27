<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('user_model');
		
		$this->load->library('authorize');
		$a = new Authorize();
		
	}
	public function index()
	{
		
		$this->load->library('authorize');
		
		$a = new Authorize();
		$a->CreateProfile();	
	}
	function createCustomerProfile($email)
{	
    /* Create a merchantAuthenticationType object with authentication details
       retrieved from the constants file */
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(\SampleCode\Constants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCode\Constants::MERCHANT_TRANSACTION_KEY);
    
    // Set the transaction's refId
    $refId = 'ref' . time();
    // Create a Customer Profile Request
    //  1. (Optionally) create a Payment Profile
    //  2. (Optionally) create a Shipping Profile
    //  3. Create a Customer Profile (or specify an existing profile)
    //  4. Submit a CreateCustomerProfile Request
    //  5. Validate Profile ID returned
    // Set credit card information for payment profile
    $creditCard = new AnetAPI\CreditCardType();
	$card_number = str_replace(" ","",$this->input->post('card_number'));
	$expiration_date = $this->input->post('expiration_year') . '-' . $this->input->post('expiration_month');
    $creditCard->setCardNumber($card_number);
	get_card_type($card_number);
    $creditCard->setExpirationDate($expiration_date);
    $creditCard->setCardCode($this->input->post('cvv'));
    $paymentCreditCard = new AnetAPI\PaymentType();
    $paymentCreditCard->setCreditCard($creditCard);
    // Create the Bill To info for new payment type
    $billTo = new AnetAPI\CustomerAddressType();
    $billTo->setFirstName($_SESSION['first_name']);
    $billTo->setLastName($_SESSION['last_name']);
    $billTo->setAddress($_SESSION['address']);
    $billTo->setCity($_SESSION['city']);
    $billTo->setState($_SESSION['state']);
    $billTo->setZip($_SESSION['zip']);
    $billTo->setPhoneNumber($_SESSION['phone']);
   
    
    // Create an array of any shipping addresses
 // Create the customer shipping address
/*    $customershippingaddress = new AnetAPI\CustomerAddressType();
   $customershippingaddress->setFirstName($_SESSION['first_name']);
    $customershippingaddress->setLastName($_SESSION['last_name']);
    $customershippingaddress->setAddress($_SESSION['address']);
    $customershippingaddress->setCity($_SESSION['city']);
    $customershippingaddress->setState($_SESSION['state']);
    $customershippingaddress->setZip($_SESSION['zip']);
    $customershippingaddress->setPhoneNumber($_SESSION['phone']); */
   
    // Create a new CustomerPaymentProfile object
    $paymentProfile = new AnetAPI\CustomerPaymentProfileType();
    $paymentProfile->setCustomerType('individual');
    $paymentProfile->setBillTo($billTo);
    $paymentProfile->setPayment($paymentCreditCard);
    $paymentProfile->setDefaultpaymentProfile(true);
    $paymentProfiles[] = $paymentProfile;
    // Create a new CustomerProfileType and add the payment profile object
    $customerProfile = new AnetAPI\CustomerProfileType();
    $customerProfile->setDescription("Donor");
    $customerProfile->setMerchantCustomerId("M_" . time());
    $customerProfile->setEmail($email);
    $customerProfile->setpaymentProfiles($paymentProfiles);
    
    // Assemble the complete transaction request
    $request = new AnetAPI\CreateCustomerProfileRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setRefId($refId);
    $request->setProfile($customerProfile);
    // Create the controller and get the response
    $controller = new AnetController\CreateCustomerProfileController($request);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
  
    if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
		insert_customer_id( $response->getCustomerProfileId());
			//echo "Succesfully created customer profile : " . $response->getCustomerProfileId() . "\n";
        $paymentProfiles = $response->getCustomerPaymentProfileIdList();
		insert_payment_id($paymentProfiles[0]);
		//echo "SUCCESS: PAYMENT PROFILE ID : " . $paymentProfiles[0] . "\n";
    } else {
        echo "ERROR :  Invalid response\n";
        $errorMessages = $response->getMessages()->getMessage();
        echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
    }
	// Create a new customer shipping address for an existing customer profile
			$existingcustomerprofileid =$response->getCustomerProfileId();
    $request = new AnetAPI\CreateCustomerShippingAddressRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setCustomerProfileId($existingcustomerprofileid);
    $request->setAddress($customershippingaddress);
    $controller = new AnetController\CreateCustomerShippingAddressController($request);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
    if (($response != null) && ($response->getMessages()->getResultCode() == "Ok") ) {
       $address_id=$response->getCustomerAddressId();
	   insert_adress_id($address_id);
		//echo "Create Customer Shipping Address SUCCESS: ADDRESS ID : " . $response-> getCustomerAddressId() . "\n";
    } else {
		
      //  echo "Create Customer Shipping Address  ERROR :  Invalid response\n";
        //$errorMessages = $response->getMessages()->getMessage();
        //echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";
    }
    //return $response;
}
}
