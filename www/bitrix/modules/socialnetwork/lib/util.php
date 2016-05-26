<?php

namespace Bitrix\Socialnetwork;

use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

class Util
{
	public static function getPermissionsByExternalAuthId($authId)
	{
		$result = array(
			'message' => true
		);

		if ($authId == 'email')
		{
			$result['message'] = (!ModuleManager::isModuleInstalled('mail'));
		}

		return $result;
	}
}