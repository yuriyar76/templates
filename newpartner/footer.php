<br class="clear">
<!--end of .in--></div>
<!--end of .outer--></div>
<?
if ($APPLICATION->GetCurDir() == '/about/') {
	Cmodule::IncludeModule('iblock');
	$a = array();
	if ($USER->IsAdmin()) $filter = array('IBLOCK_ID' => 61);
	else $filter = array('IBLOCK_ID' => 61,"ACTIVE"=>"Y");
	$db = CIBlockElement::GetList(array('timestamp_x' => 'DESC'), $filter, false, false, array('ID', 'NAME',"PREVIEW_TEXT","ACTIVE_FROM"));
	while($ob = $db->GetNextElement()) {
		$a[] = $ob->GetFields();
	}
	if (count($a) > 3) 
		$style = 'id="slider"';
	else $style = 'style="margin-left: 30px;"';
	?>
    <div class="outer newouter">
    <div class="in">
    <h2>Новости компании</h2>
    <div class="news-block">
    	<div <?=$style;?>>
    		<ul class="news-slider">
            <?
			foreach ($a as $aa) {
				?>
                <li><div class="doc"><p><a href="detail.php?ID=<?=$aa["ID"];?>"><?=$aa["NAME"];?></a></p><span class="date"><?=$aa["ACTIVE_FROM"];?></span></div><div><?=$aa["PREVIEW_TEXT"];?></div></li>
                <?
			}
			?>
    		</ul>
    	</div>
    	<br class="clear">
    </div>
<?$APPLICATION->IncludeComponent("bitrix:subscribe.form", ".default", array(
	"USE_PERSONALIZATION" => "Y",
	"SHOW_HIDDEN" => "N",
	"PAGE" => "/about/subscr_edit.php",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600"
	),
	false
);?>
    </div></div>
    <?
}
?>
<div id="footer">
    <div class="footer_in">
        <div class="l">
            Сервис тестируется, и его результаты не являются публичной офертой, определяемой положениями Статьи 437 (2) ГК РФ. Для получения точной информации о наличии и стоимости услуг, пожалуйста, обращайтесь по телефонам компании.
        </div>
        <div class="r">
            <a href="/">Новый партнер</a> &copy; <a href="/bitrix/admin" target="_blank" style="text-decoration:none;">2013</a><br>
            Все права защищены<br><br>
            <a href="/map.php">Карта сайта</a>
        </div>
    	<br class="clear">
	</div>
</div><!--end of #footer> -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter16964311 = new Ya.Metrika({id:16964311,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/16964311" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36644527-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = '158010';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->
<script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>