<?php 
$json ='{
        "miniapp_user_token": null,
        "cost": "12000.0",
        "purchase_details_url": "https://example.com/compra/348820",
        "voucher_url": "https://example.com/comprobante/348820",
        "idempotency_token": "ea0c7avalo-e85a-48c4-b7f9-24a9014a2331",
        "order_id": "348820",
        "terminal_id": "sede_45",
        "purchase_description": "Compra en Tienda X",
        "purchase_items": [
            {
                "name": "Aceite de girasol",
                "value": "13.390"
            }
        ],
        "user_ip_address": "61.1.224.56",
        "merchant_user_id": null,
        "token": "pr-23c90b1fa6ec5bdb45fccd1f70ef2dd83dad26f3e24c7ec78926e1fd25d497e7a13bb909",
        "tpaga_payment_url": "https://w.tpaga.co/eyJtIjp7Im8iOiJQUiJ9LCJkIjp7InMiOiJtZWRpY2FwcCIsInBydCI6InByLTIzYzkwYjFmYTZlYzViZGI0NWZjY2QxZjcwZWYyZGQ4M2RhZDI2ZjNlMjRjN2VjNzg5MjZlMWZkMjVkNDk3ZTdhMTNiYjkwOSJ9fQ==",
        "status": "created",
        "expires_at": "2019-05-30T15:10:57.549-05:00",
        "cancelled_at": null,
        "checked_by_merchant_at": null,
        "delivery_notification_at": null
    }';


$decode = json_decode($json,true);


echo "<pre>";
    print_r($decode['tpaga_payment_url']);
echo "</pre>";

echo "<br>";
echo "<br>";

echo "<pre>";
    print_r($decode);
echo "</pre>";
