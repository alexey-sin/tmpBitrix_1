<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?> 

					</td>
					<td class="right-column">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "sect", 
								"AREA_FILE_SUFFIX" => "inc", 
								"AREA_FILE_RECURSIVE" => "N", 
								"EDIT_MODE" => "html", 
								"EDIT_TEMPLATE" => "sect_inc.php" 
							)
						);?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "page", 
								"AREA_FILE_SUFFIX" => "inc", 
								"AREA_FILE_RECURSIVE" => "N", 
								"EDIT_MODE" => "html", 
								"EDIT_TEMPLATE" => "page_inc.php" 
							)
						);?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br />
<div id="bottom_banner"><?$APPLICATION->IncludeComponent("bitrix:advertising.banner",".default",Array("TYPE" => "BOTTOM"));?></div>

<div id="footer">
	<?$APPLICATION->IncludeFile(
		$APPLICATION->GetTemplatePath("include_areas/copyright.php"),
		Array(),
		Array("MODE"=>"html")
	);?>
</div>

</div>
</body>
</html>