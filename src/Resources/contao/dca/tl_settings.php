<?php
/**
 * @copyright  Media Motion AG <https://www.mediamotion.ch>
 * @author     Rory Zünd (Media Motion AG)
 * @package    SyslogBundle
 * @license    LGPL-3.0+
 * @see	       https://github.com/mediamotionag/contao-syslog-bundle
 */

/*
 * Extend palettes
 */
\Contao\CoreBundle\DataContainer\PaletteManipulator::create()
    ->addLegend('syslog_legend', 'timeout_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_AFTER)
    ->addField('syslog_active', 'syslog_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)
    ->addField('syslog_level', 'syslog_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)
    ->addField('syslog_ignore_url', 'syslog_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)
    ->addField('syslog_ignore_list', 'syslog_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)
    ->addField('syslog_slack_hook', 'syslog_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)
    ->addField('syslog_slack_username', 'syslog_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)
    ->addField('syslog_slack_channel', 'syslog_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_settings');


$GLOBALS['TL_DCA']['tl_settings']['fields']['syslog_active'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_active'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('tl_class'=>'w50 clr')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['syslog_level'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_level'],
    'exclude'                 => true,
    'default'                 => 'ERROR',
    'inputType'               => 'select',
    'options'                 => array('ERROR'=>'nur Fehler', 'GENERAL,CONFIGURATION,ACCESS,CRON,FILES,EMAIL,FORMS'=>'Alle'),
    'eval'                    => array('tl_class'=>'w50 clr', 'multiple'=>false)
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['syslog_ignore_url'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_ignore_url'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('tl_class'=>'long clr')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['syslog_ignore_url'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_ignore_url'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('tl_class'=>'long clr')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['syslog_ignore_list'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_ignore_list'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('tl_class'=>'long clr')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['syslog_slack_hook'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_slack_hook'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('tl_class'=>'long clr')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['syslog_slack_username'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_slack_username'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('tl_class'=>'w50 clr')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['syslog_slack_channel'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fields']['syslog_slack_channel'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('tl_class'=>'w50 clr')
);