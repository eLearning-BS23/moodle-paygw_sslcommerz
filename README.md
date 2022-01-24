# Moodle Payment Gateway Sslcommerz plugin

SSLCOMMERZ is the largest payment gateway aggregator in Bangladesh and a pioneer in the FinTech industry. For more detail about `SSLCOMMERZ` please visit https://www.sslcommerz.com/.

Moodle Enrol Sslcommerz is a Moodle enrollment plugin based on `SSLCOMMERZ` payment gateway that help students to pay with Bangladeshi currency. It supports all Bangladeshi Banks and online mobile transaction.

<p align="center">
<img src="https://i.imgur.com/QH1SUwO.jpg">
</p>

## Features
- Support all Bangladeshi Bank 
- Support All Bangladeshi Mobile Banking
- Easy Integration
- Personalised payment experience
- Secure OTP based access to save cards
- Bi-lingual Support
- Add vat or surcharge

## Configuration

You can install this plugin from [Moodle plugins directory](https://moodle.org/plugins) or can download from [Github](https://github.com/eLearning-BS23/paygw_sslcommerz).

You can download zip file and install or you can put file under enrol as sslcommerz

## Plugin Global Settings
### Go to 
```
  Dashboard->Site administration->Plugins->Enrolments->sslcommerz settings
```
- Insert the SSLCOMMERZ api v3 url
  https://sandbox.sslcommerz.com/gwprocess/v3/api.php
- Insert sslcommerz validetion url 
  https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php
- Insert the Store id that provided by sslcommerz
- Insert Store Password provided by sslcommerz
- insert production environment like sandbox or live server 
- Done!

![settings page](https://user-images.githubusercontent.com/97436713/150731059-4900ac21-169a-4bae-a4ec-999b9ba8a719.png)

## Enrolment settings: 

- Go to Site administration > Plugins > Enrolments > Manage enrol plugins and click the eye icon opposite Enrolment on payment.
- Click the settings link, configure as required then click the 'Save changes' button.
- Go to the course you wish to enable payment for, and add the 'Enrolment on payment' enrolment method to the course.
- Select a payment account, amend the enrolment fee as necessary then click the button 'Add method'

Click the eye icon opposite Enrolment on payment.

![enable Enrolment on Payment](https://user-images.githubusercontent.com/97436713/150732364-f39bae07-d654-49fe-a2a1-d3015c707acc.png)

To manage payment gateways click on the settings configure as required then click the 'Save changes' button.

![enable payment gateway](https://user-images.githubusercontent.com/97436713/150734313-7c564f4a-0cbb-4efc-b29e-3058806a77b1.png)

Now click on the course page and select any payment method or type

![course page](https://user-images.githubusercontent.com/97436713/150734644-1ee7a5c0-1e18-4e94-82a8-904f35b8acc4.png)

![sslcommerz choose option](https://user-images.githubusercontent.com/97436713/150734426-96c6ae7e-f9b1-410f-a11f-a4453ccd3597.png)

![Screenshot from 2022-01-20 21-28-17](https://user-images.githubusercontent.com/97436713/150734465-7192e4e6-583a-4b19-b1b8-541f1a97167c.png)
