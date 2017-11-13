<?php
include "config.php";

$ch = curl_init("https://www.milletech.se/invoicing/export/customers");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);

$response = json_decode(curl_exec($ch), true);
curl_close($ch);

foreach ($response as $customer) {

    $query = "INSERT INTO miltech_user (id, firstname, lastname, email, gender, 
customer_activated, group_id, customer_company, default_billing, default_shipping, 
is_active, created_at, updated_at, customer_invoice_email, customer_extra_text, 
customer_due_date_period) VALUES (:id, :firstname, :lastname, :email, :gender, 
:customer_activated, :group_id, :customer_company, :default_billing, 
:default_shipping,:is_active, :created_at, :updated_at, :customer_invoice_email, 
:customer_extra_text, :customer_due_date_period)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $customer['id']);
    $stmt->bindParam(':firstname', $customer['firstname']);
    $stmt->bindParam(':lastname', $customer['lastname']);
    $stmt->bindParam(':email', $customer['email']);
    $stmt->bindParam(':gender', $customer['gender']);
    $stmt->bindParam(':customer_activated', $customer['customer_activated']);
    $stmt->bindParam(':group_id', $customer['group_id']);
    $stmt->bindParam(':customer_company', $customer['customer_company']);
    $stmt->bindParam(':default_billing', $customer['default_billing']);
    $stmt->bindParam(':default_shipping', $customer['default_shipping']);
    $stmt->bindParam(':is_active', $customer['is_active']);
    $stmt->bindParam(':created_at', $customer['created_at']);
    $stmt->bindParam(':updated_at', $customer['updated_at']);
    $stmt->bindParam(':customer_invoice_email', $customer['customer_invoice_email']);
    $stmt->bindParam(':customer_extra_text', $customer['customer_extra_text']);
    $stmt->bindParam(':customer_due_date_period', $customer['customer_due_date_period']);

$stmt->execute();
    /*
        $query = "INSERT INTO miltech_user_adress (id, customer_id, customer_address_id,
    email, firstname, lastname, postcode, street, city, telephone, country_id, address_type,
    company, country)
    VALUES (:id, :customer_id, :customer_address_id, :email, :firstname, :lastname, :postcode, :street, :city,
    :telephone, :country_id, :address_type, :company, :country)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $customer['address']['id']);
        $stmt->bindParam(':customer_id', $customer['address']['customer_id']);
        $stmt->bindParam(':customer_address_id', $customer['address']['customer_address_id']);
        $stmt->bindParam(':email', $customer['address']['email']);
        $stmt->bindParam(':firstname', $customer['address']['firstname']);
        $stmt->bindParam(':lastname', $customer['address']['lastname']);
        $stmt->bindParam(':street', $customer['address']['street']);
        $stmt->bindParam(':postcode', $customer['address']['postcode']);
        $stmt->bindParam(':city', $customer['address']['city']);
        $stmt->bindParam(':telephone', $customer['address']['telephone']);
        $stmt->bindParam(':country_id', $customer['address']['country_id']);
        $stmt->bindParam(':address_type', $customer['address']['address_type']);
        $stmt->bindParam(':company', $customer['address']['company']);
        $stmt->bindParam(':country', $customer['address']['country']);
    $stmt->execute();
    */
}
