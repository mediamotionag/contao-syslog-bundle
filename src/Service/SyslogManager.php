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

class SyslogManager
{
	public function sendToSyslog($strText, $strTyp, $strComponent, $strFunction)
	{

		//Get Configuration
		$bolActive = \Config::get('syslog_active');
		$strLevel = \Config::get('syslog_level');
		$strSlackHook = \Config::get('syslog_slack_hook');
		$strSlackUsername = \Config::get('syslog_slack_username');
		$strSlackChannel = \Config::get('syslog_slack_channel');
		$strIgnoreURL = \Config::get('syslog_ignore_url');
		$strIgnoreList = \Config::get('syslog_ignore_list');
		
		//Is the syslog activated
		if($bolActive && $strSlackHook && $strSlackUsername && $strSlackChannel){
			
			//Define Slack Options
			$arrSettings = [
				'username' => $strSlackUsername,
				'channel' => $strSlackChannel,
				'link_names' => true
			];
			
			$bolSendLog = true;
			
			//Does a Blacklist-URL exist?
			if($strIgnoreURL != ''){
				
				//Is it a URL?
				if(substr( $strIgnoreURL, 0, 4 ) === "http"){
					
					$strContent = self::getFileContent($strIgnoreURL);
					
					if($strContent){
						$strSeparator = "\n";
						$arrKeywords = explode($strSeparator, $strContent);
						
						if(is_array($arrKeywords)){
							
							foreach($arrKeywords as $strKeyword){
								
								if(strpos($strText, $strKeyword) !== false){
									$bolSendLog = false;
								}
								
							}
						}
					}
				}
			}
			
			//Does a Blacklist-List exist?
			if($strIgnoreList != ''){
				
				//Is it a List?
				if(strpos($strIgnoreList, ',') !== false){
					
					$arrKeywords = explode(',', $strIgnoreList);
					
					if(is_array($arrKeywords)){
						
						foreach($arrKeywords as $strKeyword){
							
							if(strpos($strText, $strKeyword) !== false){
								$bolSendLog = false;
							}
							
						}
						
					}
				} else {
					
					if(strpos($strIgnoreList, $strIgnoreList) !== false){
						$bolSendLog = false;
					}
					
				}
				
			}
			
			if($bolSendLog){
				
				$objSlackClient = new \Maknz\Slack\Client($strSlackHook, $arrSettings);
				$objSlackClient->to($strSlackChannel)->withIcon('https://img.icons8.com/material/344/system-task--v1.png')->send($strText);
				
			}
			
		}

	}
	
	private function getFileContent($strURL)
	{
		
		$strTempPath = sys_get_temp_dir();
		$strCacheFile = $strTempPath . '/ignore-list.txt';
		$bolCached = false;
		
		if(file_exists($strCacheFile)){
			
			$strTimestamp = filemtime($strCacheFile);
			
			if($strTimestamp >= strtotime('-48 hours')){
				$objFile = fopen($strCacheFile, "r") or die("Unable to create file: " . $strCacheFile);
				$strData = fread($objFile,filesize($strCacheFile));
				fclose($objFile);
				$bolCached = true;
			}
			
		}
		
		if(!$bolCached || !$strData){
			
			//Get Ignore List
			$curlSession = curl_init();
			curl_setopt($curlSession, CURLOPT_URL, $strURL);
			curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
			curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curlSession, CURLOPT_CONNECTTIMEOUT, 10); 
			curl_setopt($curlSession, CURLOPT_TIMEOUT, 15);
			$strData = curl_exec($curlSession);
			curl_close($curlSession);
			
			//Write Cache-File
			unlink($strCacheFile);
			$objFile = fopen($strCacheFile, "w") or die("Unable to create file: " . $strCacheFile);
			fwrite($objFile, $strData);
			fclose($objFile);
			
		}
		
		return $strData;
	}
}