<?php
$config = array(
	'BcApp.adminNavi.BrowserCacheUpdate' => array(
		'name'		 => 'ブラウザキャッシュ更新設定',
		'contents'	 => array(
			array('name'	 => '設定',
				'url'	 => array(
					'admin'		 => true,
					'plugin'	 => 'browser_cache_update',
					'controller' => 'browser_cache_update',
					'action'	 => 'index')
			)
		)
	)

);
$config['BcApp.adminNavigation'] = [
		'Plugins' => [
		'menus' => [
			'BrowserCacheUpdate' => [
				'title' => 'ブラウザキャッシュ更新設定',
				'url' => [
					'admin' => true,
					'plugin' => 'browser_cache_update',
					'controller' => 'browser_cache_update',
					'action' => 'index'
				]
			],
		]
	]
];
/*
 * 設定
 */
$config['BrowserCacheUpdate'] = [
	// site_configの保存名
	'keyName' => 'BrowserCacheUpdate.key',
	'time' => 'BrowserCacheUpdate.time',
	// 自動的に BrowserCacheUpdateタグを付与する（falseにした場合、自動では出力されず、ヘルパーにて出力）
	'auto' => true,
	'prefix' => 'time',
	'extension' => ['.css', '.js', '.png', '.jpg'],
];
