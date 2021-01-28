<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?IncludeTemplateLangFile(__FILE__);?>
                            </div>
					

                        </div>
                        <div class="col-md-8 col-md-pull-4 nopadding">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:news.list", 
                                "carousel", 
                                array(
                                    "IBLOCK_TYPE" => "NEWPARTNER",
                                    "IBLOCK_ID" => "91",
                                    "NEWS_COUNT" => "10",
                                    "SORT_BY1" => "SORT",
                                    "SORT_ORDER1" => "ASC",
                                    "SORT_BY2" => "ACTIVE_FROM",
                                    "SORT_ORDER2" => "DESC",
                                    "FILTER_NAME" => "",
                                    "FIELD_CODE" => array(
                                        0 => "DETAIL_PICTURE",
                                        1 => "",
                                    ),
                                    "PROPERTY_CODE" => array(
                                        0 => "",
                                        1 => "",
                                    ),
                                    "CHECK_DATES" => "Y",
                                    "DETAIL_URL" => "",
                                    "AJAX_MODE" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "N",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "3600",
                                    "CACHE_FILTER" => "N",
                                    "CACHE_GROUPS" => "Y",
                                    "PREVIEW_TRUNCATE_LEN" => "",
                                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                    "SET_TITLE" => "N",
                                    "SET_STATUS_404" => "N",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                    "PARENT_SECTION" => "",
                                    "PARENT_SECTION_CODE" => "",
                                    "INCLUDE_SUBSECTIONS" => "Y",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "DISPLAY_BOTTOM_PAGER" => "N",
                                    "PAGER_TITLE" => "Ќовости ",
                                    "PAGER_SHOW_ALWAYS" => "N",
                                    "PAGER_TEMPLATE" => "",
                                    "PAGER_DESC_NUMBERING" => "N",
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                    "PAGER_SHOW_ALL" => "N",
                                    "DISPLAY_DATE" => "Y",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "Y",
                                    "DISPLAY_PREVIEW_TEXT" => "Y",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "COMPONENT_TEMPLATE" => "carousel",
                                    "SET_BROWSER_TITLE" => "N",
                                    "SET_META_KEYWORDS" => "N",
                                    "SET_META_DESCRIPTION" => "N",
                                    "SET_LAST_MODIFIED" => "N",
                                    "PAGER_BASE_LINK_ENABLE" => "N",
                                    "SHOW_404" => "N",
                                    "MESSAGE_404" => ""
                                ),
                                false
                            );?>               
                    	</div>
					</div><!--row-->
                    <div class="row">
                        <div class="col-md-12 nopadding">
                            <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                                    "AREA_FILE_SHOW" => "file", 
                                    "PATH" => "/bitrix/templates/newpartner-2016/include_areas/map.inc.php" ,
                                    "AREA_FILE_SUFFIX" => "inc", 
                                    "EDIT_TEMPLATE" => "standard.php"
                                )
                            );?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-5 nopadding">
                  <?
                  if ($USER->GetID() != 4359) { /* старый калькул€тор */
                     /* $APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                              "AREA_FILE_SHOW" => "file",
                              "PATH" => "/bitrix/templates/newpartner-2016/include_areas/form2.inc.php" ,
                              "AREA_FILE_SUFFIX" => "inc",
                              "EDIT_TEMPLATE" => "standard.php"
                          )
                      );*/

                  }
                  ?>
                  <?
                  /* новый калькул€тор  */
                   // if ($USER->GetID() == 4359) {

                        $APPLICATION->IncludeComponent(
                            "black_mist:newpartner.calc.v1.0",
                            "calc.index",
                            Array(
                                "CACHE_TYPE" => "A",
                                "CACHE_TIME" => "360000",
                                "COMPONENT_TEMPLATE" => "calc.index",
                                "TYPE" => ""
                            ),
                            false
                        );

                  //  }
                    ?>
					<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                            "AREA_FILE_SHOW" => "file", 
                            "PATH" => "/bitrix/templates/newpartner-2016/include_areas/form3.inc.php" ,
                            "AREA_FILE_SUFFIX" => "inc", 
                            "EDIT_TEMPLATE" => "standard.php" 
                        )
													);?>

                  <?php
                  /* оплата за€вки картой */
                  if($USER->isAdmin()){
                      $APPLICATION->IncludeComponent(
                          "black_mist:newpartner.paycard.v1.0",
                          "",
                         [
                              "CACHE_TYPE" => "N",
                              "CACHE_TIME" => "0",
                              "COMPONENT_TEMPLATE" => ".default",
                              "TYPE" => ""
                          ],
                          false
                      );
                  }


                  ?>


                    <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                            "AREA_FILE_SHOW" => "file", 
                            "PATH" => "/bitrix/templates/newpartner-2016/include_areas/form4.inc.php" ,
                            "AREA_FILE_SUFFIX" => "inc", 
                            "EDIT_TEMPLATE" => "standard.php" 
                        )
                    );?>                 
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list", 
                        "opinions", 
                        array(
                            "IBLOCK_TYPE" => "NEWPARTNER",
                            "IBLOCK_ID" => "61",
                            "NEWS_COUNT" => "4",
                            "SORT_BY1" => "ACTIVE_FROM",
                            "SORT_ORDER1" => "DESC",
                            "SORT_BY2" => "SORT",
                            "SORT_ORDER2" => "ASC",
                            "FILTER_NAME" => "",
                            "FIELD_CODE" => array(
                                0 => "",
                                1 => "",
                            ),
                            "PROPERTY_CODE" => array(
                                0 => "",
                                1 => "",
                            ),
                            "CHECK_DATES" => "Y",
                            "DETAIL_URL" => "",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "N",
                            "AJAX_OPTION_HISTORY" => "N",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "Y",
                            "PREVIEW_TRUNCATE_LEN" => "",
                            "ACTIVE_DATE_FORMAT" => "d.m.Y",
                            "SET_TITLE" => "N",
                            "SET_STATUS_404" => "N",
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                            "PARENT_SECTION" => "",
                            "PARENT_SECTION_CODE" => "",
                            "INCLUDE_SUBSECTIONS" => "Y",
                            "DISPLAY_TOP_PAGER" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "PAGER_TITLE" => "Ќовости ",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "DISPLAY_DATE" => "Y",
                            "DISPLAY_NAME" => "Y",
                            "DISPLAY_PICTURE" => "N",
                            "DISPLAY_PREVIEW_TEXT" => "Y",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "COMPONENT_TEMPLATE" => "opinions",
                            "SET_BROWSER_TITLE" => "N",
                            "SET_META_KEYWORDS" => "N",
                            "SET_META_DESCRIPTION" => "N",
                            "SET_LAST_MODIFIED" => "N",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "SHOW_404" => "N",
                            "MESSAGE_404" => ""
                        ),
                        false
                    );?>       
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
		<? 
		// <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
		?>

		<script src="/bitrix/templates/newpartner-2016/js/jquery-1.11.2.min.js"></script>
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