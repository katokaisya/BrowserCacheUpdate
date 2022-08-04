<?php
class BrowserCacheUpdateController extends AppController {
	public $components = array('Cookie', 'BcAuth', 'BcAuthConfigure');
	// site_config テーブルに保存
	public $uses = array("SiteConfig");
	private $configName = null;

	public function __construct($request = null, $response = null) {
		parent::__construct($request, $response);
		$this->configName = Configure::read('BrowserCacheUpdate.keyName');
	}

	public function admin_index(){
		$this->pageTitle = "クエリストリング設定";
		$time = '||'. date("YmdHis");

		if (empty($this->request->data)) {
			$data = $this->SiteConfig->findByName($this->configName);
			$data = array(
				'BrowserCacheUpdate' => array(
					'key' => (empty($data['SiteConfig']['value'])) ? "" : $data['SiteConfig']['value']
				)
			);
		} else {
			// 更新
			if ($this->SiteConfig->findByName($this->configName)) {
				// サニタイズ
				$db = $this->SiteConfig->getDataSource();
				$value = $db->value($this->request->data['BrowserCacheUpdate']['key'].$time, 'string');
				// 更新実行
				$this->SiteConfig->updateAll(
					array('value' => $value),
					array('SiteConfig.name' => $this->configName)
				);
			// 追加
			} else {
				$data = array(
					'name' => $this->configName,
					'value' => $this->request->data['BrowserCacheUpdate']['key'].$time
				);
				$this->SiteConfig->save($data, false);
			}
			$data = array(
				'BrowserCacheUpdate' => array(
					'key' => $this->request->data['BrowserCacheUpdate']['key']
				)
			);
		}
		// 管理画面ではタイムスタンプは非表示
		if (strpos($data['BrowserCacheUpdate']['key'], '||') !== false) {
			$timeArray = explode('||', $data['BrowserCacheUpdate']['key']);
			$data['BrowserCacheUpdate']['key'] = $timeArray[0];
		}
		$this->request->data = $data;
	}
}
