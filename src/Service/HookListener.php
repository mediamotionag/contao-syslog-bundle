<?php
/**
 * @copyright  Media Motion AG <https://www.mediamotion.ch>
 * @author     Rory Zünd (Media Motion AG)
 * @package    SyslogBundle
 * @license    LGPL-3.0+
 * @see	       https://github.com/mediamotionag/contao-syslog-bundle
 */

namespace Memo\SyslogBundle\Service;

use Contao\Controller;
use Memo\SyslogBundle\Service\SyslogManager;

class HookListener
{
	public function catchLogMessages($strText, $strFunction, $strAction)
	{

		$strLevel = \Config::get('syslog_level');
		
		if($strLevel == $strAction || strpos($strLevel, $strAction) !== false){
			
			SyslogManager::sendToSyslog($strText, $strAction, "Contao", $strFunction);
		}
		
	}
}