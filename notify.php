<?php
//Shopierdan gelen bilgiler.

$status = $_POST["status"];
$invoiceId = $_POST["platform_order_id"];
$transactionId = $_POST["payment_id"];
$installment = $_POST["installment"];
$signature = $_POST["signature"];
$url = 'https://siteadresi.com/';
$siparisonay = $url . "siparis?siparisno=$invoiceId";
$siparisiptal = $url . "siparis?siparisno=none";

/* Bu kısımda yapılacak işlemler bulunmaktadır */

$data = $_POST["random_nr"] . $_POST["platform_order_id"] . $_POST["total_order_value"] . $_POST["currency"];
$signature = base64_decode($signature);
$expected = hash_hmac('SHA256', $data, $shopierSecret, true);
if ($signature == $expected) {
    $status = strtolower($status);
    if ($status == "success") {

        //İşlem başarılı ise yapacaklarınız burada sipariş onaylama güncelleme email veya sms gönderme işlemlerini yapabilirsiniz

        header("Location: $siparisonay");

    } else {

        // İşlem başarısız ise yapacaklarınız.

        header("Location: $siparisiptal");
    }
}
?>
