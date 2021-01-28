<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?IncludeTemplateLangFile(__FILE__);?>
					</div>
				</div>
			</div>
		</div> 
        <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                "AREA_FILE_SHOW" => "file", 
                "PATH" => "/bitrix/templates/newpartner-2016/include_areas/footer.inc.php" ,
                "AREA_FILE_SUFFIX" => "inc", 
                "EDIT_TEMPLATE" => "standard.php" 
            )
        );?>
        <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                "AREA_FILE_SHOW" => "file", 
                "PATH" => "/bitrix/templates/newpartner-2016/include_areas/modal.inc.php" ,
                "AREA_FILE_SUFFIX" => "inc", 
                "EDIT_TEMPLATE" => "standard.php" 
            )
        );?>
		<script src="/bitrix/templates/newpartner-2016/js/bootstrap.min.js"></script>
        <script src="/bitrix/templates/newpartner-2016/js/jquery-ui-new.js"></script>
        <script src="/bitrix/templates/newpartner-2016/js/jquery.ui.widget.js"></script>
        <script src="/bitrix/templates/newpartner-2016/js/jquery.iframe-transport.js"></script>
        <script src="/bitrix/templates/newpartner-2016/js/jquery.fileupload.js"></script>   
        <script src="/bitrix/templates/newpartner-2016/js/jquery.maskedinput.min.js"></script>
        <script src="/bitrix/templates/newpartner-2016/js/jquery.cookie.js"></script>
		<script src="/bitrix/templates/newpartner-2016/js/scripts.js"></script>
        <script src="/bitrix/templates/newpartner-2016/js/script.js"></script>
                <!-- Yandex.Metrika counter SCRR -->
<script type="text/javascript" >
(function (d, w, c) {
(w[c] = w[c] || []).push(function() {
try {
w.yaCounter50408199 = new Ya.Metrika2({
id:50408199,
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
s.src = "https://mc.yandex.ru/metrika/tag.js";

if (w.opera == "[object Opera]") {
d.addEventListener("DOMContentLoaded", f, false);
} else { f(); }
})(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/50408199" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>