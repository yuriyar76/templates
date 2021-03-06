<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
global $USER;
use Bitrix\Main\Localization\Loc;
$id_user = $USER->GetID();
$arGroups = CUser::GetUserGroup($id_user);
$access=false;
foreach($arGroups as $value){
    if($value=='29'){
        $access = true;
        break;
    }
}
if(!$access){
    header("location:/");
    exit;
}

$params_user = CUser::GetByID($id_user);
$arResult['PERSONAL_PHONE'] = $params_user->arResult[0]['PERSONAL_PHONE'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?=LANG_CHARSET?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php $APPLICATION->ShowTitle(); ?></title>

    <!-- Custom fonts for this template-->
    <link href="/bitrix/templates/newpartner-fl/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/bitrix/templates/newpartner-2016/css/jquery-ui.css" rel="stylesheet">
    <link href="/bitrix/templates/newpartner-fl/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="/bitrix/templates/newpartner-fl/css/styles.css" rel="stylesheet">
    <script src="/bitrix/templates/newpartner-2016/js/jquery-1.11.2.min.js"></script>
    <script src="/bitrix/templates/newpartner-fl/js/form.js"></script>

    <?php $APPLICATION->ShowHead();?>
</head>

<body id="page-top">
<div id="p_prldr">
    <div class="contpre">
        <span class="svg_anm"></span>
    </div>
</div>

<div id="p_prldr_track">
    <div class="contpre_track">
        <span class="svg_anm_track"></span>
    </div>
</div>

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <!--<div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>-->
            <div class="sidebar-brand-text mx-3">����� �������</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/customers-lk/?add=Y">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>������ ����������</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">


        <!-- Nav Item - Pages Collapse Menu -->

        <li class="nav-item">
            <a class="nav-link" href="/customers-lk/">
                <i class="fas fa-fw fa-table"></i>
                <span>������</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/customers-lk/?arch=Y">
                <i class="fas fa-fw fa-table"></i>
                <span>�����</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/customers-lk/?add=Y">
                <i class="fas fa-fw fa-table"></i>
                <span>����� ������</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-folder"></i>
                <span>������</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">���������� �������:</h6>
                    <a class="collapse-item" href="/customers-lk/?sender_add=Y">�����������</a>
                    <a class="collapse-item" href="/customers-lk/?recipient_add=Y">����������</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="" data-toggle="modal" data-target="#fl_profile">
                <i class="fas fa-fw fa-wrench"></i>
                <span>�������</span></a>
        </li>
        <!-- Nav Item - Utilities Collapse Menu -->


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <h1 class="h3 mb-2 text-gray-800"><?=$USER->GetFirstName()?></h1>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder=
                                    "Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>



                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$USER->GetLogin()?></span>
                            <img class="img-profile rounded-circle" src="/bitrix/templates/newpartner-fl/img/nobody_m.1024x1024-1.jpg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#fl_profile">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i><?= Loc::getMessage("NEWPARTNER_FL_PROFILE") ?></a>

                            <div class="dropdown-divider"></div>
                            <a id="logout_profile" class="dropdown-item" href="?logout=Y" >
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                �����
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
