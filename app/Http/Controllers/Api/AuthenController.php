<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Auth\RegistersUsers;
use App\Http\Auth\VerifiesEmails;

use Ellaisys\Cognito\AwsCognitoClaim;
use App\Http\Auth\AuthenticatesUsers as CognitoAuthenticatesUsers;
use Ellaisys\Cognito\AwsCognitoClient;

class AuthenController extends Controller
{
    use RegistersUsers;
    use VerifiesEmails;
    use CognitoAuthenticatesUsers;

    const EMAIL = "sonnn@voyager-hcm.com";
    const PASSWORD = "123456";

    public function register()
    {
        ## Đăng kí
        // $a = $this->_register();

        // $client = app()->make(AwsCognitoClient::class);
        // $a = $client->confirmUserSignUp(self::EMAIL, '203975');

        ## Login
        $a = $this->_login();

        ## Admin reset password
        // $a = $this->_adminSetPassWord();

        ## Verify email
        // $a = $this->_verifyEmail();

        ## Resend email
        // $a = $this->_reSendEmail();

        return $a;
    }

    private function _register()
    {
        $client = app()->make(AwsCognitoClient::class);

        // $collection = collect([
        //     'name' => "Nguyễn Ngọc Sơn 12",
        //     'email' => self::EMAIL,
        //     'password' => self::PASSWORD
        // ]);

        // $data = $collection->only('name', 'email', 'passsword'); //passing 'password' is optional.

        // //Register user cognito
        // $register = $this->createCognitoUser($data);

        $register = $client->register(self::EMAIL, self::PASSWORD);

        dd($register);

        if ($register == true) {
            //Set admin password
            // $this->_adminSetPassWord();
            //Send Email verify
            // $this->_reSendEmail();


           
            // $client->confirmSignUp(self::EMAIL);
            //Tạo user dưới local
            echo 'tạo thành công';
        }

        return $register;
    }

    private function _login()
    {
        $collection = collect([
            'email' => self::EMAIL,
            'password' => self::PASSWORD
        ]);

        if ($claim = $this->attemptLogin($collection, 'api', 'email', 'password', true)) {
            if ($claim instanceof AwsCognitoClaim) {
                return $claim->getData();
            } else {
                return response()->json(['status' => 'error', 'message' => $claim], 400);
            } //End if
        } //End if
    }

    private function _adminSetPassWord()
    {
        //Create AWS Cognito Client
        $client = app()->make(AwsCognitoClient::class);

        $adminReset = $client->setUserPassword(self::EMAIL, self::PASSWORD, true);

        return $adminReset;
    }

    private function _verifyEmail()
    {
        $collection = collect([
            'email' => self::EMAIL,
            'confirmation_code' => '722945'
        ]);

        $data = $collection->only('email', 'confirmation_code'); //passing 'password' is optional.

        $verify = $this->verify($data);

        return $verify;
    }

    private function _reSendEmail()
    {
        $collection = collect([
            'email' => self::EMAIL,
        ]);

        $data = $collection->only('email');

        $sendEmail = $this->resend($data);

        dd($sendEmail);
    }
}
