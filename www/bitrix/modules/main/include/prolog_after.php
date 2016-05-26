<?php
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2013 Bitrix
 */

/**
 * Bitrix vars
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global $SiteExpireDate
 */

use Bitrix\Main;

global $USER, $APPLICATION;

define("START_EXEC_PROLOG_AFTER_1", microtime());
$GLOBALS["BX_STATE"] = "PA";

if(!headers_sent())
	header("Content-type: text/html; charset=".LANG_CHARSET);

$sPreviewFile = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/tmp/templates/__bx_preview/header.php";
if(defined("SITE_TEMPLATE_PREVIEW_MODE") && file_exists($sPreviewFile))
{
	include_once($sPreviewFile);
}
else
{
	\Bitrix\Main\Page\Asset::getInstance()->startTarget('TEMPLATE');
	include_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/header.php");
	\Bitrix\Main\Page\Asset::getInstance()->startTarget('PAGE');
}

/* Draw edit menu for whole content */
global $BX_GLOBAL_AREA_EDIT_ICON;
$BX_GLOBAL_AREA_EDIT_ICON = false;

if($APPLICATION->GetShowIncludeAreas())
{
	require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/interface/init_admin.php");

	$aUserOpt = CUserOptions::GetOption("global", "settings", array());
	if ($aUserOpt["page_edit_control_enable"] != "N")
	{
		$documentRoot = CSite::GetSiteDocRoot(SITE_ID);
		if(isset($_SERVER["REAL_FILE_PATH"]) && $_SERVER["REAL_FILE_PATH"] != "")
			$currentFilePath = $_SERVER["REAL_FILE_PATH"];
		else
			$currentFilePath = $APPLICATION->GetCurPage(true);

		$bCanEdit = true;

		if(!is_file($documentRoot.$currentFilePath) || !$USER->CanDoFileOperation("fm_edit_existent_file", array(SITE_ID, $currentFilePath)))
			$bCanEdit = false;

		//need fm_lpa for every .php file, even with no php code inside
		if($bCanEdit && !$USER->CanDoOperation('edit_php') && in_array(GetFileExtension($currentFilePath), GetScriptFileExt()) && !$USER->CanDoFileOperation('fm_lpa', array(SITE_ID, $currentFilePath)))
			$bCanEdit = false;

		if($bCanEdit && IsModuleInstalled("fileman") && !($USER->CanDoOperation("fileman_admin_files") && $USER->CanDoOperation("fileman_edit_existent_files")))
			$bCanEdit = false;

		if($bCanEdit)
		{
			echo $APPLICATION->IncludeStringBefore();
			$BX_GLOBAL_AREA_EDIT_ICON = true;
		}
	}
}
define("START_EXEC_PROLOG_AFTER_2", microtime());
$GLOBALS["BX_STATE"] = "WA";
$APPLICATION->RestartWorkarea(true);

//magically replacing the current file with another one
$event = new Main\Event("main", "OnFileRewrite", array("path" => Main\Context::getCurrent()->getRequest()->getScriptFile()));
$event->send();

foreach($event->getResults() as $evenResult)
{
	if(($result = $evenResult->getParameters()) <> '')
	{
		$file = new Main\IO\File($_SERVER["DOCUMENT_ROOT"].$result);
		if($file->isExists())
		{
			//only the first result matters
			include($file->getPhysicalPath());
			die();
		}
	}
}
