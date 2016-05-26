<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

if (
	isset($arParams["SET_EXPERT_MODE"])
	&& $arParams["SET_EXPERT_MODE"] == "Y"
)
{
	CUserOptions::setOption("socialnetwork", "~log_expertmode_popup_show", "Y");
	$arResult["SHOW_EXPERT_MODE_POPUP"] = "Y";
}
elseif ($USER->IsAuthorized())
{
	$arResult["SHOW_EXPERT_MODE_POPUP"] = CUserOptions::getOption("socialnetwork", "~log_expertmode_popup_show", "N");
}

$arResult["ajaxControllerURL"] = $this->GetFolder()."/ajax.php";
?>