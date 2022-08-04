<?php
class BrowserCacheUpdateViewEventListener extends BcViewEventListener {
/**
 * 登録イベント
 *
 * @var array
 */
	public $events = array(
		'afterLayout'
	);

	public function afterLayout(CakeEvent $event) {
		// 管理画面もしくは、自動追加がfalseなら何もしない。
		if (BcUtil::isAdminSystem() || !Configure::read('BrowserCacheUpdate.auto')) {
			return true;
		}
		$View = $event->subject;
		$siteConfig = $View->BcBaser->siteConfig;
		// site_configテーブルに保存されたBrowserCacheUpdate.keyのレコードを取得
		if (empty($siteConfig[Configure::read('BrowserCacheUpdate.keyName')])) {
			return true; //レコードがない場合、何もしない
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
		$extensions = explode(',', $keyName); // ,で区切って配列にする
		if (!empty($extensions)) {
			$output = $View->output;
			foreach ($extensions as $extension) {
				if (strpos($extension, '.') === false) { // .が含まれていない場合は、.を追加
					$machExtension = '\.'. $extension;
					$extension = '.'. $extension;
				} else { // .が含まれている場合は、パスで書かれている可能性があるので、/をエスケープ
					$machExtension = str_replace('/', '\/', $extension);
					$machExtension = str_replace('.', '\.', $machExtension);
				}
				// クエリストリングを付与
				$output = preg_replace('/'. $machExtension. '\"/i', $extension. $timeStamp. '"', $output);
			}
			$View->output = $output;
		}
		return true;
	}

}
