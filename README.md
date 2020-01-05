# Contao Syslog Bundle

## About
Send Contao system-log messages to a slack channel.

This bundle adds a hook that reads element all messages and filters them by the defined type in the contao settings.
All system-log errors can be filtered by an ignore list.
The ignore list can be a comma seperated list of words or sentences, that if exist in the message, will disregard the message from being sent to the slack channel.
The ignore list can also be a link to a txt-file (via URL) that contains one search-term per line.

## Installation
Install [composer](https://getcomposer.org) if you haven't already, then enter this command in the main directory of your Contao installation:
```sh
composer require mediamotionag/contao-syslog-bundle
```
## Usage
1. Setup a slack webhook here: https://slack.com/apps/manage/custom-integrations
2. Install bundle
3. Activate the Syslog in the contao system settings
4. Set the log level in the contao system settings
5. Set the slack information in the contao system settings
6. Wait for the next error to happen (or try and log in with the wrong password a few times ;)

## Contribution
Bug reports and pull requests are welcome
