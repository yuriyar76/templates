<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?IncludeTemplateLangFile(__FILE__);?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="<?=LANG_CHARSET;?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all">
		<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
				"AREA_FILE_SHOW" => "file", 
				"PATH" => "/bitrix/templates/newpartner-2016/include_areas/og.inc.php" ,
				"AREA_FILE_SUFFIX" => "inc", 
				"EDIT_TEMPLATE" => "standard.php" 
			)
		);?>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <?$APPLICATION->ShowHead();?>
        <title><?$APPLICATION->ShowTitle()?></title>
        <?$APPLICATION->ShowCSS();?>
        <link href="/bitrix/templates/newpartner-2016/css/jquery-ui.css" rel="stylesheet">
        <link href="/bitrix/templates/newpartner-2016/css/jquery.fileupload.css" rel="stylesheet">
        <link href="/bitrix/templates/newpartner-2016/css/bootstrap.min.css" rel="stylesheet">
        <link href="/bitrix/templates/newpartner-2016/css/font-awesome.min.css" rel="stylesheet">
        <link href="/bitrix/templates/newpartner-2016/css/styles.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,100italic,400italic,300italic,500,500italic,700,700italic,900,900italic&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
		
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
        <?$APPLICATION->ShowHeadScripts();?>
		<?$APPLICATION->ShowHeadStrings();?>
		<!-- Yandex.Metrika counter -->
		<script type="text/javascript" >
			(function (d, w, c) {
				(w[c] = w[c] || []).push(function() {
					try {
						w.yaCounter16964311 = new Ya.Metrika({
							id:16964311,
							clickmap:true,
							trackLinks:true,
							accurateTrackBounce:true,
							webvisor:true
						});
					} catch(e) { }
				});

				var n = d.getElementsByTagName("script")[0],
					s = d.createElement("script"),
					f = function () { n.parentNode.insertBefore(s, n); };
				s.type = "text/javascript";
				s.async = true;
				s.src = "https://mc.yandex.ru/metrika/watch.js";

				if (w.opera == "[object Opera]") {
					d.addEventListener("DOMContentLoaded", f, false);
				} else { f(); }
			})(document, window, "yandex_metrika_callbacks");
		</script>
		<noscript><div><img src="https://mc.yandex.ru/watch/16964311" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
		<!-- /Yandex.Metrika counter -->

        <?/*$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                "AREA_FILE_SHOW" => "file", 
                "PATH" => "/bitrix/templates/newpartner-2016/include_areas/scrr.inc.php" ,
                "AREA_FILE_SUFFIX" => "inc", 
                "EDIT_TEMPLATE" => "standard.php" 
            )
        );*/?>
	</head>
    <body>
        <div id="panel">
            <?$APPLICATION->ShowPanel();?>
        </div>
        <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                "AREA_FILE_SHOW" => "file", 
                "PATH" => "/bitrix/templates/newpartner-2016/include_areas/topmenu.inc.php" ,
                "AREA_FILE_SUFFIX" => "inc", 
                "EDIT_TEMPLATE" => "standard.php" 
            )
        );?>
    
		<div class="container">
            <div class="row">
                <div class="col-md-3 col-md-push-9 nopadding">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                            "AREA_FILE_SHOW" => "file", 
                            "PATH" => "/bitrix/templates/newpartner-2016/include_areas/info.inc.php" ,
                            "AREA_FILE_SUFFIX" => "inc", 
                            "EDIT_TEMPLATE" => "standard.php" 
                        )
                    );?>
                    <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                            "AREA_FILE_SHOW" => "file", 
                            "PATH" => "/bitrix/templates/newpartner-2016/include_areas/form1.inc.php" ,
                            "AREA_FILE_SUFFIX" => "inc", 
                            "EDIT_TEMPLATE" => "standard.php" 
                        )
                    );?>
                    <?
                    $APPLICATION->IncludeComponent(
                        "black_mist:newpartner.calc.v1.0",
                        "calc.index",
                        Array(
                            "CACHE_TYPE" => "N",
                            "CACHE_TIME" => "0",
                            "COMPONENT_TEMPLATE" => "calc.index",
                            "TYPE" => ""
                        ),
                        false
                    );


                   /* $APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                            "AREA_FILE_SHOW" => "file", 
                            "PATH" => "/bitrix/templates/newpartner-2016/include_areas/form2.inc.php" ,
                            "AREA_FILE_SUFFIX" => "inc", 
                            "EDIT_TEMPLATE" => "standard.php" 
                        )
                    );*/

                    ?>
                    <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                            "AREA_FILE_SHOW" => "file", 
                            "PATH" => "/bitrix/templates/newpartner-2016/include_areas/form3.inc.php" ,
                            "AREA_FILE_SUFFIX" => "inc", 
                            "EDIT_TEMPLATE" => "standard.php" 
                        )
                    );?>
                    <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                            "AREA_FILE_SHOW" => "file", 
                            "PATH" => "/bitrix/templates/newpartner-2016/include_areas/form4.inc.php" ,
                            "AREA_FILE_SUFFIX" => "inc", 
                            "EDIT_TEMPLATE" => "standard.php" 
                        )
                    );?>
                    
                    <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                        "AREA_FILE_SHOW" => "sect", 
                        "AREA_FILE_SUFFIX" => "inc", 
                        "AREA_FILE_RECURSIVE" => "Y", 
                        "EDIT_TEMPLATE" => "standard.php")
                    );?>
            	</div>
                <div class="col-md-9 col-md-pull-3">
                	<div class="text">
                		<div class="page-header">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                            "AREA_FILE_SHOW" => "sect", 
                            "AREA_FILE_SUFFIX" => "brd", 
                            "AREA_FILE_RECURSIVE" => "Y", 
                            "EDIT_TEMPLATE" => "standard.php" 
                        )
                    );?>
<h1><?$APPLICATION->ShowTitle(false)?></h1>
</div>