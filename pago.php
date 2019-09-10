<?php
    $amount = $_POST['amount'];
    $email = $_POST['email'];

    $ApiKey = '4Vj8eK4rloUd272L48hsrarnUA';
    $merchantId = '508029';
    $referenceCode = 'PAGO-123456789';
    $currency = 'COP';

    $firma = "$ApiKey~$merchantId~$referenceCode~$amount~$currency";
    $firmaMd5 = md5($firma);
    
    $pagar = "<form method='post' action='https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/'>
        <input name='merchantId'      type='hidden' value='". $merchantId ."'   >
        <input name='accountId'       type='hidden' value='512321' >
        <input name='description'     type='hidden' value='PAGO EN LINEA'  >
        <input name='referenceCode'   type='hidden' value='". $referenceCode ."' >
        <input name='amount'          type='hidden' value='". $amount ."'>
        <input name='tax'             type='hidden' value='0'  >
        <input name='taxReturnBase'   type='hidden' value='0' >
        <input name='currency'        type='hidden' value='COP' >
        <input name='signature'       type='hidden' value='". $firmaMd5 ."'  >
        <input name='test'            type='hidden' value='1' >
        <input name='buyerEmail'      type='hidden' value='". $email ."' >
        <input name='responseUrl'     type='hidden' value='http://www.test.com/response' >
        <input name='confirmationUrl' type='hidden' value='http://www.test.com/confirmation' >
        <input name='Submit'          type='submit' value='Pagar Ahora!' >
    </form>";

    
    $data = array(
        'estado' => 'ok',
        'button' => $pagar
    );

    echo json_encode($data, JSON_FORCE_OBJECT);
?>