<?php
/**
 * [View] BrowserCacheUpdate コンテナID入力
 * [index] browser_cache_update/browser_cache_update/index
 */
?>
<?php echo $this->BcForm->create('SiteConfig') ?>

<!-- form -->
<section class="bca-section" data-bca-section-type="form-group">
	<h2>ブラウザキャッシュ更新用 クエリストリングを付与するファイルの設定</h2>
	<table cellpadding="0" cellspacing="0" class="form-table section bca-form-table">
			<tr>
				<th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('BrowserCacheUpdate.key', 'キャッシュを更新したいファイル（拡張子・ファイル名）') ?></th>
				<td class="col-input bca-form-table__input">
					<?php echo $this->BcForm->input('BrowserCacheUpdate.key', [
						'type' => 'text',
						'size' => 80,
						'maxlength' => 255,
						'autofocus' => true,
						'data-input-text-size' => 'full-counter',
						'placeholder' => 'css,js',
						'counter' => true
					]); ?>
					<br><span>css,js のようにキャッシュを更新したいファイルの拡張子をカンマ区切りで入力してください。</span>
					<i class="bca-icon--question-circle btn help bca-help"></i>

					<div id="helptextBlank" class="helptext">
						<ul>
							<li>ファイル名でも、カンマなど特殊な文字が使われていなければ利用可能です。</li>
						</ul>
					</div>

					<?php echo $this->BcForm->error('Page.title') ?>
				</td>
			</tr>
	</table>
</section>
<section class="bca-actions">
	<div class="bca-actions__main">
		<?php echo $this->BcForm->submit(__d('baser', '保存してクエリストリングをアップデートする'), [
			'div' => false,
			'type' => 'submit',
			'class' => 'button bca-btn',
			'data-bca-btn-type' => 'save',
			'data-bca-btn-size' => 'lg',
			'data-bca-btn-width' => 'lg',
			'id' => 'BtnSave'
		]) ?>
	</div>
</section>
<?php echo $this->BcForm->end(); ?>
