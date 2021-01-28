<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title> Оплата заявки </title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/bitrix/templates/newpartner-payment/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://securepayments.sberbank.ru/payment/docsite/assets/js/ipay.js"></script>
    <script>
        var ipay = new IPAY({api_token: 'fsinfps7lsvajfet45348sf22'});
    </script>
    <?//$APPLICATION->ShowHead();?>
</head>
<body>