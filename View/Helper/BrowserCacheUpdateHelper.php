<?php
/**
 * [BrowserCacheUpdate] BrowserCacheUpdateヘルパー
 *
 * @package			BrowserCacheUpdate.views
 * @license			MIT
 */
class BrowserCacheUpdateHelper extends AppHelper {

/**
 * ヘルパー
 *
 * @var array
 */
	public $helpers = array('BcBaser', 'BcHtml', 'Html');

/*
 * クエリストリングを出力する。
 * @param bool $coercion trueの場合、レコードさえあれば強制的に出力する。
 */
	public function queryString($coercion = false){
		$siteConfig = $this->BcBaser->siteConfig;
		if (empty($siteConfig[Configure::read('BrowserCacheUpdate.keyName')])) {
			return true; ///レコードがない場合、何もしない
		} else {
			$keyName = $siteConfig[Configure::read('BrowserCacheUpdate.keyName')];
		}
		// タイムスタンプと拡張子に分ける
		$timeStamp = '';
		if (strpos($keyName, '||') !== false) {
			$timeArray = explode('||', $keyName);
			$keyName = $timeArray[0];
			$timeStamp = '?'. $timeArray[1];
		}
		//タイムスタンプを出力する
		if ($coercion) {
			echo $timeStamp; // 強制的に出力
		} else {
			echo $timeArray[0] ? $timeStamp  : ''; // 空でなければ出力
		}
		return true;
	}

}
