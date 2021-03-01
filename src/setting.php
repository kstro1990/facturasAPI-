<?php

class Setting
{
    public function auth($logines='',$trankey='')
    {
      $login = $logines;
      $tran = $trankey;
        $auth = new stdClass();
            $auth->login = $login;
            $auth->nonce =  "login22"; //'abc123toma'; gmp_random
            $auth->seed = date('c');
            $auth->tranKey = base64_encode(hash('sha256', $auth->nonce . $auth->seed . $tran , true));
            $auth->nonce = base64_encode($auth->nonce);
        return $auth;
    }

    public function debtorr(){
        $debtor = new stdClass();
            $debtor->document = "12345678";
            $debtor->documentType = "CC";
            $debtor->name = "LUIS";
            $debtor->surname = "VIDAL FERNANDEZ";
        return $debtor;
    }

    public function payment(){
        $payment = [
            'reference'=> 'factura_test_'.rand() ,
              #'description'=> rand(),
            'amount'=>[
              //'taxes' =>$taxesPayment,
              'currency'=> 'USD',
              'total'=> '1',
            ]
        ];
        return $payment;
    }
    public function invoice($toma,$toma2){

        $invoice= [
            'invoice'=>[
                'payment'=> $toma,
            'debtorr'=> $toma2
            ]
        ];
        
        $invoice2 = [
            $invoice
        ]; 
        return $invoice2;
    }

}

$setting = new Setting;
$getdebtor = $setting->debtorr();
$getAuth = $setting->auth('07ad8d9b5f6a2f734efc1b177a168610','2G89TU49');
$getPayment = $setting->payment();

$getInvoice = $setting->invoice($getPayment,$getdebtor);



$toma2 = json_encode($getInvoice);
echo $toma2;
#var_dump($toma2);  

?>