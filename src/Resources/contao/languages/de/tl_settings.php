<?php
/**
 * @copyright  Media Motion AG <https://www.mediamotion.ch>
 * @author     Rory Zünd (Media Motion AG)
 * @package    SyslogBundle
 * @license    LGPL-3.0+
 * @see	       https://github.com/mediamotionag/contao-syslog-bundle
 */


/** 
 * Legends
 */ 
$GLOBALS['TL_LANG']['tl_settings']['syslog_legend'] 	= 'Syslog Einstellungen';

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_active'] 	= array('Aktiv', 'Syslog-Meldungen aktivieren. Nur wenn aktiviert, werden Meldungen an Slack geschickt.');
$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_level'] 	= array('Level', 'Ab welchem Log-Level sollten die Meldungen an Slack geschickt werden?');
$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_ignore_url'] 	= array('Ignore-URL', 'URL zu öffentlichem TXT-File, in dem pro Zeile ein Begriff/Satz definiert ist. Wenn einer dieser Begriffe/Sätze im Log-Text vorkommt, wird die Meldung NICHT in den Slack-Channel geschrieben. WICHTIG: Das File wird aus Performance-Gründen 48h lokal gecached, bis es wieder von dieser URL bezogen wird.');
$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_ignore_list'] 	= array('Ignore-Liste', 'Kommaseparierte Liste von Begriffen/Sätzen. Wenn einer dieser Begriffe/Sätze im Log-Text vorkommt, wird die Meldung NICHT in den Slack-Channel geschrieben. WICHTIG: Diese Liste wirkt ergänzend zur oben stehenden URL.');


$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_slack_hook'] 	= array('Webhook URL', 'Slack Webhook URL gem. Einrichtung unter: <a href="https://mediamotion.slack.com/apps/manage/custom-integrations">https://slack.com/apps/manage/custom-integrations</a>');
$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_slack_username'] 	= array('Absendername', 'Von "wem" sollten die Syslog-Meldungen in den Channel geschickt werden? z.B. die Domäne');
$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_slack_channel'] 	= array('Slack Channel', 'Name des Slack-Channels (exkl. #) in dem die Meldungen gepostet werden sollten.');