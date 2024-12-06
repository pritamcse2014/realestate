<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class AuthorizeNetController extends Controller
{
    public function authorizePayment(): View {
        // echo "Authorize Payment";
        // die();
        return view('authorizenetpayment');
    }

    public function authorizePaymentStore(Request $request): RedirectResponse {
        // dd($request->all());
        $cardNumber = $request->input('card_number');
        $expirationDate = $request->input('expiration_date');
        $cvvNumber = $request->input('cvv_number');

        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('AUTHORIZENET_API_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('AUTHORIZENET_TRANSACTION_KEY'));

        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($cardNumber);
        $creditCard->setExpirationDate($expirationDate);
        $creditCard->setCardCode($cvvNumber);

        $payment = new AnetAPI\PaymentType();
        $payment->setCreditCard($creditCard);

        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount("10.00");
        $transactionRequestType->setPayment($payment);

        $request = new AnetAPI\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId("ref" . time());
        $request->setTransactionRequest($transactionRequestType);

        $controller = new AnetController\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

        if ($response != null) {
            $tresponse = $response->getTransactionResponse();
            if ($tresponse != null && $tresponse->getResponseCode() == "1") {
                return back()->with('success', 'Payment Successful.');
            } else {
                return back()->with('error', 'Payment Failed.');
            }
        } else {
            return back()->with('error', 'Payment Failed : ' . $response->getMessages()->getMessage()[0]->getText());
        }
    }
}
