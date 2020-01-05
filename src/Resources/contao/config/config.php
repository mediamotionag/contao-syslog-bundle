<?php
/**
 * @copyright  Media Motion AG <https://www.mediamotion.ch>
 * @author     Rory Zünd (Media Motion AG)
 * @package    SyslogBundle
 * @license    LGPL-3.0+
 * @see	       https://github.com/mediamotionag/contao-syslog-bundle
 */

/**
 * HOOKS
 */
 
//$GLOBALS['TL_HOOKS']['addLogEntry'][] = array('memo_syslog_bundle.hook_listener', 'catchLogMessages');
$GLOBALS['TL_HOOKS']['addLogEntry'][] = array('\Memo\SyslogBundle\Service\HookListener', 'catchLogMessages');