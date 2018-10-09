<?php
/**
 * @license MIT <http://opensource.org/licenses/MIT>
 */

/**
 * Welcome to the almighty configuration file. In this file the update definitions for each version are released. Please
 * make sure to read below description of the config format carefully before proceeding.
 *
 * Nextcloud updates are delivered by a release channel, at the moment the following channels are available:
 *
 * - production
 * - stable
 * - beta
 * - daily
 *
 * With exception of daily (which is a daily build of master) all of them need to be configured manually. The config
 * array looks like the following:
 *
 * 'production' => [
 * 	'9.1' => [
 * 		// 95% of instances on 9.1 will get this response
 * 		'95' => [
 * 			'latest' => '10.0.0',
 * 			'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/upgrade.html',
 * 			// downloadUrl is an optional entry, if not specified the URL is generated using https://download.nextcloud.com/server/releases/nextcloud-'.$newVersion['latest'].'.zip
 * 			'downloadUrl' => 'https://download.nextcloud.com/foo.zip',
 * 			// internalVersion
 * 			'internalVersion' => '9.1.0'
 * 			// autoupdater is an optional boolean value to define whether the update should be just announced or also delivered
 * 			// defaults to true
 * 			'autoupdater' => true,
 * 			// minPHPVersion is used to check the transferred PHP against this one here and allows to skip updates that are not compatible with this version of PHP
 * 			// if nothing is set the PHP version is not checked
 * 			'minPHPVersion' => '5.4',
 * 		],
 * 		// 5% of instances on 9.1 will get this response
 * 		'5' => [
 * 			'latest' => '11.0.0',
 * 			'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/upgrade.html',
 *			// downloadUrl is an optional entry, if not specified the URL is generated using https://download.nextcloud.com/server/releases/nextcloud-'.$newVersion['latest'].'.zip
 * 			'downloadUrl' => 'https://download.nextcloud.com/foo.zip',
 *			// internalVersion
 * 			'internalVersion' => '11.0.0'
 * 			// autoupdater is an optional boolean value to define whether the update should be just announced or also delivered
 * 			// defaults to true
 * 			'autoupdater' => true,
 *			// minPHPVersion is used to check the transferred PHP against this one here and allows to skip updates that are not compatible with this version of PHP
 * 			// if nothing is set the PHP version is not checked
 * 			'minPHPVersion' => '5.4',
 * 		],
 * 	],
 * ]
 *
 * In this case if a Nextcloud with the major release of 8.2 sends an update request the 8.2.3 version is returned if the
 * current Nextcloud version is below 8.2.
 *
 * The search for releases in the config array is fuzzy and happens as following:
 * 	1. Major.Minor.Maintenance.Revision
 * 	2. Major.Minor.Maintenance
 * 	3. Major.Minor
 * 	4. Major
 *
 * Once a result has been found this one is taken. This allows it to define an update order in case some releases should
 * not be skipped. Let's take a look at an example:
 *
 * 'production' => [
 * 	'8.2.0' => [
 * 		'100' => [
 * 			'latest' => '8.2.1',
 * 			'web' => 'https://docs.nextcloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
 * 		],
 * 	],
 * 	'8.2' => [
 * 		'100' => [
 * 			'latest' => '8.2.4',
 * 			'web' => 'https://docs.nextcloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
 * 		],
 * 	],
 * 	'8.2.4' => [
 * 		'5' => [
 * 			'latest' => '9.0.0',
 * 			'web' => 'https://docs.nextcloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
 * 		],
 * 		'95' => [
 * 			'latest' => '8.2.5',
 * 			'web' => 'https://docs.nextcloud.org/server/8.2/admin_manual/maintenance/upgrade.html',
 * 		],
 * 	],
 * ]
 *
 * This configuration array would have the following meaning:
 *
 * 1. 8.2.0 instances would be delivered 8.2.1
 * 2. All instances below 8.2.4 EXCEPT 8.2.0 would be delivered 8.2.4
 * 3. 8.2.4 instances get 9.0.0 delivered with a 5% chance and 8.2.5 with a 95% chance
 *
 * Oh. And be a nice person and also adjust the integration tests at /tests/integration/features/update.feature after doing
 * a change to the update logic. That way you can also ensure that your changes will do what you wanted them to do. The
 * tests are automatically executed on Travis or you can do it locally:
 *
 * 	- php -S localhost:8888 ./index.php &
 * 	- cd tests/integration/ && ../../vendor/bin/behat .
 */

return [
	'production' => [
		'14' => [
			'100' => [
				'latest' => '14.0.1',
				'internalVersion' => '14.0.1.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'GMLD/dgAkP8AtldfrBib1Jz9WAehw3wqnCRfReCckOt5XfGY8DjtGzDuyt285862
8wOPvmEIZsrGSooGiAgNv4H3kXO21EzzBwOyov26dyh+OtTxfxpN6yLEKpcRSWPj
GweHorjisB2gqf6P/nD9yo69QCEIZKm8O2wx09K+QC8jwJ+UxdSm6p7b/d14lPwW
n6hwHIcpwKicNJiLGWhHpslC64nIqp+DAbOeFtl+mVGpigyNec5+JekMVCayAGAs
RS5Otchsk2GtWqPWtQEWSbkPFxuIJY9ij1RY+ocABIfQ8b55pbwkRNpjAawq5+3G
UhPQ296yv/FbIxF+rWpL+g==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '13.0.6',
				'internalVersion' => '13.0.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
StmlJJEc960gSoV6NRLK5Q==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.6',
				'internalVersion' => '13.0.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
StmlJJEc960gSoV6NRLK5Q==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.11',
				'internalVersion' => '12.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'kTTzeVMSFrUZ2uDdGCkdS+DhpCZCHikO5ZDO39PM25/vZlL4NDs+ye5hABp1ThSy
VEJN18tWVO4RXO8bUWnTx555fsupbHZf5er8PWmvqiCLBAv7QOchiGzyMrYFgVZz
XAg0YkKkezYJl9O7zS77VkeoUQH6x2PFp9Dt93ZiHVvI81hxJCJBxiLKi7/Dumky
7Ml7zxXwAGbAovtvbhigPmVs/cqCCQ5ZQDRrqZThjanASxijZzpH3e8hBruqQS6Y
B1NDzU0w3w3fHP4bbtFPj08MQo9vX2YdJyuB7u+QZiDctfYqR1RWRmcyfItupLo5
Qjnx4c42jO6FtQUa5vAp1Q==',
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.8',
				'internalVersion' => '11.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-11.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
ZH1PxQilL7ihAvnOb2oU1Q==',
			],
			'101' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
			'102' => [
				'latest' => '11.0.8',
				'internalVersion' => '11.0.8.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'web' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'eol' => true,
				'minPHPVersion' => '5.4',
				'autoupdater' => false,
			],
		],
		'9.0' => [
			'100' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
		],
		'8.2' => [
			'100' => [
				'latest' => '9.0.58',
				'internalVersion' => '9.0.58',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip',
				'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
		],
	],
	'stable' => [
		'14' => [
			'100' => [
				'latest' => '14.0.1',
				'internalVersion' => '14.0.1.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'GMLD/dgAkP8AtldfrBib1Jz9WAehw3wqnCRfReCckOt5XfGY8DjtGzDuyt285862
8wOPvmEIZsrGSooGiAgNv4H3kXO21EzzBwOyov26dyh+OtTxfxpN6yLEKpcRSWPj
GweHorjisB2gqf6P/nD9yo69QCEIZKm8O2wx09K+QC8jwJ+UxdSm6p7b/d14lPwW
n6hwHIcpwKicNJiLGWhHpslC64nIqp+DAbOeFtl+mVGpigyNec5+JekMVCayAGAs
RS5Otchsk2GtWqPWtQEWSbkPFxuIJY9ij1RY+ocABIfQ8b55pbwkRNpjAawq5+3G
UhPQ296yv/FbIxF+rWpL+g==',
			],
		],
		'13' => [
			'49' => [
				'latest' => '14.0.1',
				'internalVersion' => '14.0.1.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-14.0.1.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'GMLD/dgAkP8AtldfrBib1Jz9WAehw3wqnCRfReCckOt5XfGY8DjtGzDuyt285862
8wOPvmEIZsrGSooGiAgNv4H3kXO21EzzBwOyov26dyh+OtTxfxpN6yLEKpcRSWPj
GweHorjisB2gqf6P/nD9yo69QCEIZKm8O2wx09K+QC8jwJ+UxdSm6p7b/d14lPwW
n6hwHIcpwKicNJiLGWhHpslC64nIqp+DAbOeFtl+mVGpigyNec5+JekMVCayAGAs
RS5Otchsk2GtWqPWtQEWSbkPFxuIJY9ij1RY+ocABIfQ8b55pbwkRNpjAawq5+3G
UhPQ296yv/FbIxF+rWpL+g==',
			],
			'51' => [
				'latest' => '13.0.6',
				'internalVersion' => '13.0.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
StmlJJEc960gSoV6NRLK5Q==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.6',
				'internalVersion' => '13.0.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-13.0.6.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'd2uw9nwbyhw2wLndMnirPxXejqMhrQWWUCl/XCYJXa5LElK/QiIVOxMRw5CURxzg
tJq442ZEJq0uzJE06MhJAixkcNCdirYEkMWxpahyfUNeZ+NFVaADftJ+V4WFgd+7
zpqD/13QUZ7JUwXBqdjQPFPWCgyTqtSH1cE6uX1T/oHmbLGHZK5lyHT7+BvvrJuk
UZ+cbpcPZHyeJIfe5MpQiVKLsvjg1Lik0r+J7Vtw38k517ELoP+CO61ZQOl72pDG
nrjuv1EvWa+rO2rCbRCrNxNI0+FAZzcK3FSrWV4NcoN7V86UKSuGlUM5iY8WEZUG
StmlJJEc960gSoV6NRLK5Q==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.11',
				'internalVersion' => '12.0.11.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-12.0.11.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'kTTzeVMSFrUZ2uDdGCkdS+DhpCZCHikO5ZDO39PM25/vZlL4NDs+ye5hABp1ThSy
VEJN18tWVO4RXO8bUWnTx555fsupbHZf5er8PWmvqiCLBAv7QOchiGzyMrYFgVZz
XAg0YkKkezYJl9O7zS77VkeoUQH6x2PFp9Dt93ZiHVvI81hxJCJBxiLKi7/Dumky
7Ml7zxXwAGbAovtvbhigPmVs/cqCCQ5ZQDRrqZThjanASxijZzpH3e8hBruqQS6Y
B1NDzU0w3w3fHP4bbtFPj08MQo9vX2YdJyuB7u+QZiDctfYqR1RWRmcyfItupLo5
Qjnx4c42jO6FtQUa5vAp1Q==',
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.8',
				'internalVersion' => '11.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-11.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
ZH1PxQilL7ihAvnOb2oU1Q==',
			],
			'101' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
			'102' => [
				'latest' => '11.0.8',
				'internalVersion' => '11.0.8.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'web' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'eol' => true,
				'minPHPVersion' => '5.4',
				'autoupdater' => false,
			],
		],
		'9.0' => [
			'100' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
		],
		'8.2' => [
			'100' => [
				'latest' => '9.0.58',
				'internalVersion' => '9.0.58',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip',
				'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
		],
	],
	'beta' => [
		'14' => [
			'100' => [
				'latest' => '14.0.2 RC 1',
				'internalVersion' => '14.0.2.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-14.0.2RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'tCegyxsVhEbYn+FFW28hJzgHWSCnZkS12MUqglfia0gf11thw0JPFmMQbvAelpd6
VfUVTais0NQc4VeR3Qkxk4j7a3f0Hvm9v1GcrAyC0maHnrlcUSoUubII1CtTnXNg
TryRLCqo58YqN5hDU/0FNnewiaMKg+kEangLE8vG/Wt4Hr6aczK4iI8qsABTQreI
Nh8UY40fq1V2pCFjrPbok/7+dBObyfTbLAS4HqG4JHYOdgxsTgZgBvMSfNSudcgY
m6B3XTK1UiyEh6v7ffhotZ2+nBIophIDALa7AGVIVlI5alVEAaYS9ZHv7hQTraWW
HEWuFffIBSRUwiYDrXdt3Q==',
			],
		],
		'13' => [
			'100' => [
				'latest' => '14.0.2 RC 1',
				'internalVersion' => '14.0.2.0',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-14.0.2RC1.zip',
				'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '7.0',
				'signature' => 'tCegyxsVhEbYn+FFW28hJzgHWSCnZkS12MUqglfia0gf11thw0JPFmMQbvAelpd6
VfUVTais0NQc4VeR3Qkxk4j7a3f0Hvm9v1GcrAyC0maHnrlcUSoUubII1CtTnXNg
TryRLCqo58YqN5hDU/0FNnewiaMKg+kEangLE8vG/Wt4Hr6aczK4iI8qsABTQreI
Nh8UY40fq1V2pCFjrPbok/7+dBObyfTbLAS4HqG4JHYOdgxsTgZgBvMSfNSudcgY
m6B3XTK1UiyEh6v7ffhotZ2+nBIophIDALa7AGVIVlI5alVEAaYS9ZHv7hQTraWW
HEWuFffIBSRUwiYDrXdt3Q==',
			],
			'101' => [
				'latest' => '13.0.7 RC 2',
				'internalVersion' => '13.0.7.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-13.0.7RC2.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'yKPj4M++IOi7bIMCpNbsEJNNJraHf+a72aEfirEBqbOCHr6gFiefrKtKrcd9DaZ4
fV84JpNddQc6gbnZxa+RzHtbTirijUb4SzCMT8/yFqdchDIiwbR7LYHbC4GI3LEx
zM776vm5MEoq/ethKtM3wf5DWfEaUT+LvdkzUDnE1V81Pz8sJEGD3bvpxo7IEHTp
oK9QO35dx30j64scL9xKf7BTJYPUUZxRdoAs3Y9E3AUlC77l19Hi5PXHBajh/xiN
xXQXz+sr7B9j4GgbfxtuIV7ykhQJ5umiNk2P5qdqK0toEupy1woULkE18j7GQ0yj
eSZt7glFVcU3h4UGgirW/Q==',
			],
		],
		'12' => [
			'100' => [
				'latest' => '13.0.7 RC 2',
				'internalVersion' => '13.0.7.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-13.0.7RC2.zip',
				'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
				'eol' => false,
				'minPHPVersion' => '5.6',
				'signature' => 'yKPj4M++IOi7bIMCpNbsEJNNJraHf+a72aEfirEBqbOCHr6gFiefrKtKrcd9DaZ4
fV84JpNddQc6gbnZxa+RzHtbTirijUb4SzCMT8/yFqdchDIiwbR7LYHbC4GI3LEx
zM776vm5MEoq/ethKtM3wf5DWfEaUT+LvdkzUDnE1V81Pz8sJEGD3bvpxo7IEHTp
oK9QO35dx30j64scL9xKf7BTJYPUUZxRdoAs3Y9E3AUlC77l19Hi5PXHBajh/xiN
xXQXz+sr7B9j4GgbfxtuIV7ykhQJ5umiNk2P5qdqK0toEupy1woULkE18j7GQ0yj
eSZt7glFVcU3h4UGgirW/Q==',
			],
		],
		'11' => [
			'100' => [
				'latest' => '12.0.12 RC 2',
				'internalVersion' => '12.0.12.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-12.0.12RC2.zip',
				'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'XvS2Rh/RGuS2869St/quJNFIZKki3o2PYfmF74C5UckWTmY3vyft9EzpnQDKq/St
zgVjGCpqh9UiQ20BI+dnOrJQkYMvdyJKFohB7+J6FaywZGTXuMhWrGS7rUu/79Rv
ZDzrDIkJGZWmwBwGDmVte13iL5kOpy5Ry8lwZvPjc5B7e7ygqGWE8f+8FEZ0vtqp
MvbJYcKy92LdstqG7XLUlWdB8r+OQiP0clBkqZqfSNnUoihEPDd0v60Q4K5MQBlw
62pIfdJ9hzRAuGVNF6QkvHF7oaZP0L7vKMvUJyVp5E2pwaCbNYlPCMiTIT83a7sS
+4t3xFuqgsaD9Nz93b+Eug==',
			],
		],
		'9.1' => [
			'100' => [
				'latest' => '11.0.8',
				'internalVersion' => '11.0.8.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-11.0.8.zip',
				'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.6',
				'signature' => 'CaYUimboWU3dURynPxieGo9V8KoNHe5js2XdivdjWQ1vsyfsnz1Nim33c0bQWzA5
PosPk3vMUWxJpNKP92D0uyz1Xutkc/tCgsjsXrDaMzl1HUZ9W/PFWEtXTddD5fbJ
8idQFiyiXNNpdDJ/gZjaUZcLWEgMI9MVoeFyKY1OORuJz1e9+I/UBHMTGo81H63X
ApiCSIfXvfvbMMA6DOtorWjDJoHvCkrLef3zqEDDL5bF8NGVE/9f2hh2vSlJex45
ko5tNR4IIGM3bIRBhw9455+Tc3dVZEpGBr6Yy3vSJmrQKYQ/degEe+S7ZWyVc3TQ
ZH1PxQilL7ihAvnOb2oU1Q==',
			],
			'101' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
			'102' => [
				'latest' => '11.0.8',
				'internalVersion' => '11.0.8.1',
				'downloadUrl' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'web' => 'https://nextcloud.com/outdated-php-5-4-5-5/',
				'eol' => true,
				'minPHPVersion' => '5.4',
				'autoupdater' => false,
			],
		],
		'9.0' => [
			'100' => [
				'latest' => '10.0.6',
				'internalVersion' => '9.1.6.1',
				'downloadUrl' => 'https://download.nextcloud.com/server/prereleases/nextcloud-10.0.6.zip',
				'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
		],
		'8.2' => [
			'100' => [
				'latest' => '9.0.58',
				'internalVersion' => '9.0.58',
				'downloadUrl' => 'https://download.nextcloud.com/server/releases/nextcloud-9.0.58.zip',
				'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
				'eol' => true,
				'minPHPVersion' => '5.4',
			],
		],
	],
	'daily' => [
		'14' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-master.zip',
			'web' => 'https://docs.nextcloud.com/server/14/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '7.0',
		],
		'13' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable13.zip',
			'web' => 'https://docs.nextcloud.com/server/13/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '5.6',
		],
		'12' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable12.zip',
			'web' => 'https://docs.nextcloud.com/server/12/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '5.6',
		],
		'11' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable11.zip',
			'web' => 'https://docs.nextcloud.com/server/11/admin_manual/maintenance/upgrade.html',
			'eol' => false,
			'minPHPVersion' => '5.6',
		],
		'9.1' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable10.zip',
			'web' => 'https://docs.nextcloud.org/server/10/admin_manual/maintenance/manual_upgrade.html',
			'eol' => true,
			'minPHPVersion' => '5.4',
		],
		'9.0' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable9.zip',
			'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
			'eol' => true,
			'minPHPVersion' => '5.4',
		],
		'8.2' => [
			'downloadUrl' => 'https://download.nextcloud.com/server/daily/latest-stable9.zip',
			'web' => 'https://docs.nextcloud.org/server/9/admin_manual/maintenance/manual_upgrade.html',
			'eol' => true,
			'minPHPVersion' => '5.4',
		],
	],
	'_settings' => [
		'changelogServer' => 'https://updates.nextcloud.com/changelog_server/',
	],
];
