<?php
class BrowserCacheUpdateControllerEventListener extends BcControllerEventListener {
	/**
	 * 登録イベント
	 *
	 * @var array
	 */
	public $events = array(
		'initialize',
		);

	/**
	 * initialize
	 *
	 * @param CakeEvent $event
	 */
	public function initialize(CakeEvent $event) {
		$Controller = $event->subject();
		$Controller->helpers[] = 'BrowserCacheUpdate.BrowserCacheUpdate';
	}

}
