# Shopier Ödeme Sistemi Entegrasyonu

Bu rehber, Shopier ödeme sistemi ile entegrasyon yapmak için kullanılabilecek iki önemli PHP kod bloğunu içerir. Birincisi, Shopier'dan ödeme almak için bir ödeme formu oluştururken kullanılırken, ikincisi, Shopier'dan gelen ödeme sonuçlarını işlemek için kullanılır.

## Ödeme Formu Oluşturma

Shopier ödeme formu oluşturmak için aşağıdaki PHP kodunu kullanabilirsiniz. Bu kod, gerekli ödeme bilgilerini alır, bir ödeme formu oluşturur ve kullanıcıyı güvenli ödeme sayfasına yönlendirir.

```php
<?php
// Shopier'dan gelen API anahtarları
$api_key = 'YOUR_API_KEY';
$api_secret = 'YOUR_API_SECRET';

// Ödeme bilgilerini hazırlama
$form_data = [
    // Ödeme ile ilgili bilgileri buraya ekleyin
];

// Shopier ödeme formunu oluşturma
echo generate_shopier_form(json_decode(json_encode($form_data)));
?>
```
# Ödeme Sonuçlarını İşleme
Shopier'dan gelen ödeme sonuçlarını işlemek için aşağıdaki PHP kodunu kullanabilirsiniz. Bu kod, ödeme sonuçlarını doğrular ve işlem başarılıysa ilgili işlemleri yapmanıza olanak tanır.

```php
<?php
// Shopier'dan gelen ödeme sonuçları
$status = $_POST["status"];
$invoiceId = $_POST["platform_order_id"];
$transactionId = $_POST["payment_id"];
$installment = $_POST["installment"];
$signature = $_POST["signature"];

// İşlem sonuçlarını işleme
// Başarılı ve başarısız işlem durumlarına göre işlemlerinizi burada yapabilirsiniz.

// İşlem sonuçlarını doğrulama ve işlem yapma kodları buraya eklenmelidir.
?>
```

# Shopier Payment System Integration

This guide includes two essential PHP code blocks that can be used to integrate with the Shopier payment system. The first one is used to create a payment form to receive payments from Shopier, and the second one is used to process payment results received from Shopier.

## Creating the Payment Form

To create a Shopier payment form, you can use the following PHP code. This code takes necessary payment details, generates a payment form, and redirects the user to a secure payment page.

```php
<?php
// API keys from Shopier
$api_key = 'YOUR_API_KEY';
$api_secret = 'YOUR_API_SECRET';

// Prepare payment information
$form_data = [
    // Add payment-related information here
];

// Create the Shopier payment form
echo generate_shopier_form(json_decode(json_encode($form_data)));
?>
```
# Processing Payment Results

To process payment results received from Shopier, you can use the following PHP code. This code verifies payment results and allows you to perform actions if the payment is successful.

```php
<?php
// Payment results received from Shopier
$status = $_POST["status"];
$invoiceId = $_POST["platform_order_id"];
$transactionId = $_POST["payment_id"];
$installment = $_POST["installment"];
$signature = $_POST["signature"];

// Process payment results
// You can perform actions based on successful and unsuccessful payment statuses here.

// Verification and payment handling code should be added here.
?>
```

# License
This project is licensed under the MIT License. See the LICENSE file for details.

