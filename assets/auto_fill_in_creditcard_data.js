//README START
//
//copyright PROVISIO 2009
//
//Please add the script as an external script in the SiteKiosk configuration under Browser Design -> Advanced.
//In order for this example script to work properly Custom Script (SiteKiosk 7 or higher required) must be enabled as payment gateway in the credit card settings of the SiteKiosk configuration also please activate one of the supported credit card readers.
//Also add the included creditcardexample.html as the startpage or create a free of charge zone for it otherwise you will be asked for credit to get to the page.
//Now when you start SiteKiosk and the example page is visible in a SiteKiosk browser window (no matter if it is the active window or not) the card data from a swiped credit card will be written into the appropriate fields of the example page.
//
//README END

//CONFIGURATION START

//URL that contains the form that should be filled with credit card data once the card has been swiped
var gstr_ccurl = "http://masjidassalaamah.org/index.php/donate-now/";
//Names of the required input fields on the specific site configured in the line above
var gstr_cardnumber_inputfield_name = "card_number";
var gstr_cardexpiration_month_inputfield_name = "expiration_month";
var gstr_cardexpiration_year_inputfield_name = "expiration_year";
var gstr_cardholder_firstname_inputfield_name = "first_name";
var gstr_cardholder_lastname_inputfield_name = "last_name";

//Optional: automatically selecting the card type
var gstr_cardtype_inputfield_name = "cardtype";
var gi_cardtype_visa_value = 0;
var gi_cardtype_mastercard_value = 1;
var gi_cardtype_amex_value = 1;
var gi_cardtype_novus_value = 1;

//Optional: directly enable the credit card payment option
var gstr_paymenttype_inputfield_name = "payby";

//CONFIGURATION END

//Do not change the following code or the script may not work
creditcard = SiteKiosk.Plugins("SiteCash").Devices("CreditCard");

creditcard.OnCardSwiped = OnCardSwiped;

function OnCardSwiped(ccardinfo)
{
	for (var i=1;i<=SiteKiosk.WindowList.Windows.Count;i++)
	{
		try
		{
		   if(SiteKiosk.WindowList.Windows(i).SiteKioskWindow.SiteKioskWebBrowser.WebBrowser.LocationURL.indexOf(gstr_ccurl) != -1)
		   {
				//SiteKiosk.Logfile.Notification("Credit Card Number: " + ccardinfo.Number); //Debug
				SiteKiosk.WindowList.Windows(i).SiteKioskWindow.SiteKioskWebBrowser.WebBrowser.Document.getElementsByName(gstr_cardnumber_inputfield_name)[0].value = ccardinfo.Number;
				SiteKiosk.WindowList.Windows(i).SiteKioskWindow.SiteKioskWebBrowser.WebBrowser.Document.getElementsByName(gstr_cardholder_firstname_inputfield_name)[0].value = ccardinfo.FirstName;
				SiteKiosk.WindowList.Windows(i).SiteKioskWindow.SiteKioskWebBrowser.WebBrowser.Document.getElementsByName(gstr_cardholder_lastname_inputfield_name)[0].value = ccardinfo.LastName;
				lstr_month = "" + ccardinfo.Month;
				if (lstr_month.toString().length < 2)
					lstr_month = "0" + lstr_month;
				SiteKiosk.WindowList.Windows(i).SiteKioskWindow.SiteKioskWebBrowser.WebBrowser.Document.getElementsByName(gstr_cardexpiration_month_inputfield_name)[0].value = lstr_month;
				SiteKiosk.WindowList.Windows(i).SiteKioskWindow.SiteKioskWebBrowser.WebBrowser.Document.getElementsByName(gstr_cardexpiration_year_inputfield_name)[0].value = ccardinfo.Year.toString().slice(2, 4);
				
				/*switch(ccardinfo.CardType)
				{
					case 1:
						SiteKiosk.WindowList.Windows(i).SiteKioskWindow.SiteKioskWebBrowser.WebBrowser.Document.getElementsByName(gstr_cardtype_inputfield_name)[gi_cardtype_visa_value].checked = true;
					case 2:
						SiteKiosk.WindowList.Windows(i).SiteKioskWindow.SiteKioskWebBrowser.WebBrowser.Document.getElementsByName(gstr_cardtype_inputfield_name)[gi_cardtype_mastercard_value].checked = true;
					case 3:
						SiteKiosk.WindowList.Windows(i).SiteKioskWindow.SiteKioskWebBrowser.WebBrowser.Document.getElementsByName(gstr_cardtype_inputfield_name)[gi_cardtype_amex_value].checked = true;
					case 5:
						SiteKiosk.WindowList.Windows(i).SiteKioskWindow.SiteKioskWebBrowser.WebBrowser.Document.getElementsByName(gstr_cardtype_inputfield_name)[gi_cardtype_novus_value].checked = true;
				}
				
				SiteKiosk.WindowList.Windows(i).SiteKioskWindow.SiteKioskWebBrowser.WebBrowser.Document.getElementsByName(gstr_paymenttype_inputfield_name)[0].checked = true;*/
		   }
		}
		catch(e)
		{
			//SiteKiosk.Logfile.Notification("Editing the credit card fields failed for window: " + SiteKiosk.WindowList.Windows(i).ItemText); //Debug
		}
	}
}
