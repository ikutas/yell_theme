<?php

// 直接アクセスを禁止
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

// ASPコード専用管理画面ページ
$myaf0 = get_option( 'my-af0' );
$myaf0a = get_option( 'my-af0a' );
$myaf0b = get_option( 'my-af0b' );
$myaf0c = get_option( 'my-af0c' );
$myaf = get_option( 'my-af' );
$myaf1 = get_option( 'my-af1' );
// ランキングコード
$myaf2 = get_option( 'my-af2' );
$myaf3 = get_option( 'my-af3' );
$myaf4 = get_option( 'my-af4' );
$myaf4b = get_option( 'my-af4b' );
$myaf5 = get_option( 'my-af5' );
$myaf5b = get_option( 'my-af5b' );
$myaf6 = get_option( 'my-af6' );
$myaf7 = get_option( 'my-af7' );
$myaf8 = get_option( 'my-af8' );
$myaf8b = get_option( 'my-af8b' );
$myaf9 = get_option( 'my-af9' );
$myaf9b = get_option( 'my-af9b' );
$myaf10 = get_option( 'my-af10' );
$myaf11 = get_option( 'my-af11' );
$myaf12 = get_option( 'my-af12' );
$myaf12b = get_option( 'my-af12b' );
$myaf13 = get_option( 'my-af13' );
$myaf13b = get_option( 'my-af13b' );
$myaf14 = get_option( 'my-af14' );
$myaf15 = get_option( 'my-af15' ); //ランク1スター
$myaf16 = get_option( 'my-af16' ); //ランク2スター
$myaf17 = get_option( 'my-af17' ); //ランク3スター
$myafsc1 = get_option( 'my-afsc1' ); //ショートコード
$myafsc2 = get_option( 'my-afsc2' ); //ショートコード
$myafsc3 = get_option( 'my-afsc3' ); //ショートコード
$myafsc4 = get_option( 'my-afsc4' ); //ショートコード
$myafsc5 = get_option( 'my-afsc5' ); //ショートコード
$myafsc6 = get_option( 'my-afsc6' ); //ショートコード
$myafsc7 = get_option( 'my-afsc7' ); //ショートコード
$myafsc8 = get_option( 'my-afsc8' ); //ショートコード
$myafsc9 = get_option( 'my-afsc9' ); //ショートコード
$myafsc10 = get_option( 'my-afsc10' ); //ショートコード

if ( trim( $GLOBALS["myaf14"] ) === "" ){
	$myaf14 = "詳細ページへ";
}

add_action( 'admin_menu', 'my_admin_menu_af' );

function my_admin_menu_af() {
	add_object_page(
		__( 'ランキング管理', 'my-custom-admin-af' ),
		__( 'ランキング管理', 'my-custom-admin-af' ),
		'manage_options',
		'my-custom-admin-af',
		'my_custom_admin_af'
	);

	add_submenu_page(
		'my-custom-admin-af',
		__( 'ランキング管理リセット', 'my-custom-admin-af' ),
		__( 'ランキング管理リセット', 'my-custom-admin-af' ),
		'manage_options',
		'my-custom-submenu-af',
		'my_custom_submenu_af'
	);
}

// 基本管理画面
function my_custom_admin_af() {
	?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<div class="wrap">
		<h2>ランキング管理画面</h2>

		<form id="my-main-form" method="post" action="">
			<?php wp_nonce_field( 'my-nonce-key', 'my-custom-admin-af' ); ?>

			<h3 style="padding:10px;margin-bottom:10px;border:1px solid #ccc;background-color:#f3f3f3;"><i class="fa fa-cog"></i>&nbsp;基本設定</h3>

			<p>
				<input type="checkbox" name="my-af1" value="yes" <?php if ( $GLOBALS["myaf1"] === 'yes' ) {
					echo 'checked';
				} ?>>
				ランキングにオリジナルのCSSを使用しない</p>

			<p><img src="<?php echo get_template_directory_uri(); ?>/images/guide/rankcss_cap_big.jpg"></p>

			<h4>1) ランキングの大見出し（任意）</h4>

			<P>
				<input type="text" name="my-af" value="<?php echo esc_attr( $GLOBALS["myaf"] ); ?>" style="width:100%" placeholder="大見出しテキスト">
			</p>

			<h4>2) オリジナルページへのリンクボタンに表示するテキスト</h4>

			<P>
				<input type="text" name="my-af14" value="<?php echo esc_attr( $GLOBALS["myaf14"] ); ?>" style="width:100%" >
			</p>


			<h4>ランキングの表示</h4>

			<p>
				<input type="checkbox" name="my-af0a" value="yes" <?php if ( $GLOBALS["myaf0a"] === 'yes' ) {
					echo 'checked';
				} ?>>
				トップページに表示</p>

			<p>
				<input type="checkbox" name="my-af0" value="yes" <?php if ( $GLOBALS["myaf0"] === 'yes' ) {
					echo 'checked';
				} ?>>
				固定ページの記事下に表示</p>

			<p>
				<input type="checkbox" name="my-af0b" value="yes" <?php if ( $GLOBALS["myaf0b"] === 'yes' ) {
					echo 'checked';
				} ?>>
				投稿ページの記事下に表示</p>

			<p>
				<input type="checkbox" name="my-af0c" value="yes" <?php if ( $GLOBALS["myaf0c"] === 'yes' ) {
					echo 'checked';
				} ?>>
				サイドバーに表示</p>

			<p>
				<input type="submit" value="<?php echo esc_attr( __( 'save',
					'my-custom-admin-af' ) ); ?>" class="button button-primary button-large">
			</p>

			<hr />
			
			<h3 style="padding:10px;margin-bottom:10px;border:1px solid #ccc;background-color:#f3f3f3;"><i class="fa fa-diamond"></i>&nbsp;ランキング管理</h3>

			<p><a href="#scrank">ショートコードで作成</a></p>

			<p><img src="<?php echo get_template_directory_uri(); ?>/images/guide/rankcss_cap_mini.jpg"></p>

			<!---------------------------------------------
			ランキング1位
			---------------------------------------------->

			<h3 style="padding:10px;background-color:#e3e3e3;">ランキング1位</h3>
			<h4>a) タイトル<span style="color:#ff0000;">※入力が無いと表示されません</span></h4>

			<p>
				<input type="text" name="my-af2" value="<?php echo esc_attr( $GLOBALS["myaf2"] ); ?>" style="width:100%" placeholder="テキスト">
			</p>


			<h4>スター※任意</h4>

			<p>
			<input type="radio" name="my-af15" value="5" <?php if ( $GLOBALS["myaf15"] === '5' ) { echo 'checked'; } ?>> 5
			<input type="radio" name="my-af15" value="4" <?php if ( $GLOBALS["myaf15"] === '4' ) { echo 'checked'; } ?>> 4
			<input type="radio" name="my-af15" value="3" <?php if ( $GLOBALS["myaf15"] === '3' ) { echo 'checked'; } ?>> 3
			<input type="radio" name="my-af15" value="2" <?php if ( $GLOBALS["myaf15"] === '2' ) { echo 'checked'; } ?>> 2
			<input type="radio" name="my-af15" value="1" <?php if ( $GLOBALS["myaf15"] === '1' ) { echo 'checked'; } ?>> 1
			<input type="radio" name="my-af15" value="" <?php if ( $GLOBALS["myaf15"] === '' ) { echo 'checked'; } ?>> 非表示
			</p>

			<h4>b) アフィリエイトコード（バナー）※300px以上推奨</h4>

			<p>
				<input type="text" name="my-af3" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf3"] ) ); ?>" style="width:100%" placeholder="">
			</p>

			<p style="color:#ff0000">タグは正確に入力して下さい。閉じ忘れなどがあるとレイアウトが崩れる場合があります。</p>
			<?php
			if ( trim( $GLOBALS["myaf3"] ) !== '' ) {
				echo '<p>' . stripslashes( $GLOBALS["myaf3"] ) . '<br/>※バナーが正常に表示されない場合はコードに誤りがある可能性があります。</p>';
			}
			?>
			<h4>c) 説明</h4>

			<p>
				<?php do_action("st_af_kanri_editor", "description_1", "my-af4", stripslashes( $GLOBALS["myaf4"] ) ); ?>
			</p>

			<p>
				<?php do_action("st_af_kanri_editor", "description_1b", "my-af4b", stripslashes( $GLOBALS["myaf4b"] ) ); ?>
			</p>

			<h4>d) 詳細ページへのリンクURL</h4>

			<p>
				<input type="text" name="my-af5b" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf5b"] ) ); ?>" style="width:100%" placeholder="http://example.com/example">
			</p>
			<?php if ( trim( $GLOBALS["myaf5b"] ) !== '' ) {
				echo '<p>現在のリンクURL：&nbsp;' . stripslashes( $GLOBALS["myaf5b"] ) . '</p>';
			} ?>

			<h4>e) アフィリエイトコード（テキスト）</h4>

			<p>
				<input type="text" name="my-af5" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf5"] ) ); ?>" style="width:100%" >
			</p>
			<?php if ( trim( $GLOBALS["myaf5"] ) !== '' ) {
				echo '<p>現在のリンク：&nbsp;' . stripslashes( $GLOBALS["myaf5"] ) . '</p>';
			} ?>

			<p>
				<input type="submit" value="<?php echo esc_attr( __( 'save',
					'my-custom-admin-af' ) ); ?>" class="button button-primary button-large">
			</p>

		<p>
			ショートコード：&nbsp;<code>[rank1]</code><br/>
phpに直接記入する場合は<code>&lt;?php echo do_shortcode('[rank1]'); ?&gt;</code>
		</p>
			<hr />

			<!---------------------------------------------
			 ランキング2位
			 ---------------------------------------------->

			<h3 style="padding:10px;background-color:#e3e3e3;">ランキング2位</h3>
			<h4>a) タイトル<span style="color:#ff0000;">※入力が無いと表示されません</span></h4>

			<p>
				<input type="text" name="my-af6" value="<?php echo esc_attr( $GLOBALS["myaf6"] ); ?>" style="width:100%" placeholder="テキスト">
			</p>

			<h4>スター※任意</h4>

			<p>
			<input type="radio" name="my-af16" value="5" <?php if ( $GLOBALS["myaf16"] === '5' ) { echo 'checked'; } ?>> 5
			<input type="radio" name="my-af16" value="4" <?php if ( $GLOBALS["myaf16"] === '4' ) { echo 'checked'; } ?>> 4
			<input type="radio" name="my-af16" value="3" <?php if ( $GLOBALS["myaf16"] === '3' ) { echo 'checked'; } ?>> 3
			<input type="radio" name="my-af16" value="2" <?php if ( $GLOBALS["myaf16"] === '2' ) { echo 'checked'; } ?>> 2
			<input type="radio" name="my-af16" value="1" <?php if ( $GLOBALS["myaf16"] === '1' ) { echo 'checked'; } ?>> 1
			<input type="radio" name="my-af16" value="" <?php if ( $GLOBALS["myaf16"] === '' ) { echo 'checked'; } ?>> 非表示
			</p>

			<h4>b) アフィリエイトコード（バナー）※300px以上推奨</h4>

			<p>
				<input type="text" name="my-af7" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf7"] ) ); ?>" style="width:100%" >
			</p>

			<p style="color:#ff0000">タグは正確に入力して下さい。閉じ忘れなどがあるとレイアウトが崩れる場合があります。</p>
			<?php
			if ( trim( $GLOBALS["myaf7"] ) !== '' ) {
				echo '<p>' . stripslashes( $GLOBALS["myaf7"] ) . '<br/>※バナーが正常に表示されない場合はコードに誤りがある可能性があります。</p>';
			}
			?>
			<h4>c) 説明</h4>

			<p>
				<?php do_action("st_af_kanri_editor", "description_2", "my-af8", stripslashes( $GLOBALS["myaf8"] ) ); ?>
			</p>

			<p>
				<?php do_action("st_af_kanri_editor", "description_2b", "my-af8b", stripslashes( $GLOBALS["myaf8b"] ) ); ?>
			</p>

			<h4>d) 詳細ページへのリンクURL</h4>

			<p>
				<input type="text" name="my-af9b" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf9b"] ) ); ?>" style="width:100%" placeholder="http://example.com/example">
			</p>
			<?php if ( trim( $GLOBALS["myaf9b"] ) !== '' ) {
				echo '<p>現在のリンクURL：&nbsp;' . stripslashes( $GLOBALS["myaf9b"] ) . '</p>';
			} ?>

			<h4>e) アフィリエイトコード（テキスト）</h4>

			<p>
				<input type="text" name="my-af9" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf9"] ) ); ?>" style="width:100%">
			</p>
			<?php if ( trim( $GLOBALS["myaf9"] ) !== '' ) {
				echo '<p>現在のリンク：&nbsp;' . stripslashes( $GLOBALS["myaf9"] ) . '</p>';
			} ?>

			<p>
				<input type="submit" value="<?php echo esc_attr( __( 'save',
					'my-custom-admin-af' ) ); ?>" class="button button-primary button-large">
			</p>

		<p>
			ショートコード：&nbsp;<code>[rank2]</code><br/>
phpに直接記入する場合は<code>&lt;?php echo do_shortcode('[rank2]'); ?&gt;</code>
		</p>
			<hr />

			<!---------------------------------------------
			 ランキング3位
			 ---------------------------------------------->

			<h3 style="padding:10px;background-color:#e3e3e3;">ランキング3位</h3>
			<h4>a) タイトル<span style="color:#ff0000;">※入力が無いと表示されません</span></h4>

			<p>
				<input type="text" name="my-af10" value="<?php echo esc_attr( $GLOBALS["myaf10"] ); ?>" style="width:100%" placeholder="テキスト">
			</p>

			<h4>スター※任意</h4>

			<p>
			<input type="radio" name="my-af17" value="5" <?php if ( $GLOBALS["myaf17"] === '5' ) { echo 'checked'; } ?>> 5
			<input type="radio" name="my-af17" value="4" <?php if ( $GLOBALS["myaf17"] === '4' ) { echo 'checked'; } ?>> 4
			<input type="radio" name="my-af17" value="3" <?php if ( $GLOBALS["myaf17"] === '3' ) { echo 'checked'; } ?>> 3
			<input type="radio" name="my-af17" value="2" <?php if ( $GLOBALS["myaf17"] === '2' ) { echo 'checked'; } ?>> 2
			<input type="radio" name="my-af17" value="1" <?php if ( $GLOBALS["myaf17"] === '1' ) { echo 'checked'; } ?>> 1
			<input type="radio" name="my-af17" value="" <?php if ( $GLOBALS["myaf17"] === '' ) { echo 'checked'; } ?>> 非表示
			</p>

			<h4>b) アフィリエイトコード（バナー）※300px以上推奨</h4>

			<p>
				<input type="text" name="my-af11" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf11"] ) ); ?>" style="width:100%" >
			</p>

			<p style="color:#ff0000">タグは正確に入力して下さい。閉じ忘れなどがあるとレイアウトが崩れる場合があります。</p>
			<?php
			if ( trim( $GLOBALS["myaf11"] ) !== '' ) {
				echo '<p>' . stripslashes( $GLOBALS["myaf11"] ) . '<br/>※バナーが正常に表示されない場合はコードに誤りがある可能性があります。</p>';
			}
			?>
			<h4>c) 説明</h4>

			<p>
				<?php do_action("st_af_kanri_editor", "description_3", "my-af12", stripslashes( $GLOBALS["myaf12"] ) ); ?>
			</p>

			<p>
				<?php do_action("st_af_kanri_editor", "description_3b", "my-af12b", stripslashes( $GLOBALS["myaf12b"] ) ); ?>
			</p>

			<h4>d) 詳細ページへのリンクURL</h4>

			<p>
				<input type="text" name="my-af13b" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf13b"] ) ); ?>" style="width:100%" placeholder="http://example.com/example">
			</p>
			<?php if ( trim( $GLOBALS["myaf13b"] ) !== '' ) {
				echo '<p>現在のリンクURL：&nbsp;' . stripslashes( $GLOBALS["myaf13b"] ) . '</p>';
			} ?>

			<h4>e) アフィリエイトコード（テキスト）</h4>

			<p>
				<input type="text" name="my-af13" value="<?php echo esc_attr( stripslashes( $GLOBALS["myaf13"] ) ); ?>" style="width:100%">
			</p>
			<?php if ( trim( $GLOBALS["myaf13"] ) !== '' ) {
				echo '<p>現在のリンク：&nbsp;' . stripslashes( $GLOBALS["myaf13"] ) . '</p>';
			} ?>

			<p>
				<input type="submit" value="<?php echo esc_attr( __( 'save',
					'my-custom-admin-af' ) ); ?>" class="button button-primary button-large">
			</p>

		<p>
			ショートコード：&nbsp;<code>[rank3]</code><br/>
phpに直接記入する場合は<code>&lt;?php echo do_shortcode('[rank3]'); ?&gt;</code>
		</p>

			<hr />

			<!---------------------------------------------
			 ショートコードでSETする
			 ---------------------------------------------->

			<h3 id="scrank" style="padding:10px;margin-bottom:10px;border:1px solid #ccc;background-color:#f3f3f3;"><i class="fa fa-code"></i>&nbsp;ショートコードでランキングを作成</h3>
			<h4>ショートコードを入力</h4>
			<p>※上記のランキング3つより上に生成されます。ショートコード生成には<a href="//manualstinger.com/st-ctf/" target="_blank">別途プラグイン（有料）</a>が必要です</p>
			<p>※id番号のみ入力して下さい（例：[st_af id="5"]の場合「5」のみ記入）</p>
	
				<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc1" value="<?php echo esc_attr( $GLOBALS["myafsc1"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc2" value="<?php echo esc_attr( $GLOBALS["myafsc2"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc3" value="<?php echo esc_attr( $GLOBALS["myafsc3"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc4" value="<?php echo esc_attr( $GLOBALS["myafsc4"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc5" value="<?php echo esc_attr( $GLOBALS["myafsc5"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc6" value="<?php echo esc_attr( $GLOBALS["myafsc6"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc7" value="<?php echo esc_attr( $GLOBALS["myafsc7"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc8" value="<?php echo esc_attr( $GLOBALS["myafsc8"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc9" value="<?php echo esc_attr( $GLOBALS["myafsc9"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>
			<p>
				<input type="text" pattern="^[0-9,]+$" name="my-afsc10" value="<?php echo esc_attr( $GLOBALS["myafsc10"] ); ?>" size="30" style="ime-mode:disabled;">
			</p>

			<p>
				<input type="submit" value="<?php echo esc_attr( __( 'save',
					'my-custom-admin-af' ) ); ?>" class="button button-primary button-large">
			</p>

		<p>
			ショートコードは、各投稿に&nbsp;<code>[各ショートコード]</code>&nbsp;と記述したり<br/>
phpに直接&nbsp;<code>&lt;?php echo do_shortcode('[各ショートコード]'); ?&gt;</code>&nbsp;と記述して表示も出来ます。
		</p>

		</form>
	</div>
<?php }

//サブ管理画面
function my_custom_submenu_af() {
	?>

	<div class="wrap">
		<h2>ランキング管理リセット画面</h2>

		<form id="my-main-form" method="post" action="">
			<?php wp_nonce_field( 'my-nonce-key', 'my-custom-admin-af' ); ?>

			<p style="color:#ff0000">※本画面は緊急用です。誤ったタグの挿入などで「ランキング管理画面」に不具合が生じた場合、こちらからリセットできます。</p>

			<p>
				<input type="checkbox" name="my-af-reset" value="yes" onclick="window.alert('※チェックを入れて保存するとランキングのアフィリエイトコード等が全てリセットされます');">
				リセットする</p>


			<p>
				<input type="submit" value="<?php echo esc_attr( __( 'save',
					'my-custom-admin-af' ) ); ?>" class="button button-primary button-large">
			</p>
			<hr />
		</form>
	</div>
<?php }

//データベース登録

add_action( 'admin_init', 'my_admin_init_af' );

function my_admin_init_af() {
	if ( isset( $_POST['my-custom-admin-af'] ) && $_POST['my-custom-admin-af'] ) {
		if ( check_admin_referer( 'my-nonce-key', 'my-custom-admin-af' ) ) {
			if ( isset( $_POST['my-af'] ) && $_POST['my-af'] ) {
				update_option( 'my-af', $_POST['my-af'] );
			} else {
				update_option( 'my-af', '' );
			}

			if ( isset( $_POST['my-af1'] ) && $_POST['my-af1'] ) {
				update_option( 'my-af1', $_POST['my-af1'] );
			} else {
				update_option( 'my-af1', '' );
			}

			if ( isset( $_POST['my-af0'] ) && $_POST['my-af0'] ) {
				update_option( 'my-af0', $_POST['my-af0'] );
			} else {
				update_option( 'my-af0', '' );
			}

			if ( isset( $_POST['my-af0a'] ) && $_POST['my-af0a'] ) {
				update_option( 'my-af0a', $_POST['my-af0a'] );
			} else {
				update_option( 'my-af0a', '' );
			}

			if ( isset( $_POST['my-af0b'] ) && $_POST['my-af0b'] ) {
				update_option( 'my-af0b', $_POST['my-af0b'] );
			} else {
				update_option( 'my-af0b', '' );
			}

			if ( isset( $_POST['my-af0c'] ) && $_POST['my-af0c'] ) {
				update_option( 'my-af0c', $_POST['my-af0c'] );
			} else {
				update_option( 'my-af0c', '' );
			}

			if  ( isset( $_POST['my-af-reset'] ) && $_POST['my-af-reset'] ){

		 			//リセット処理
					for( $i = 1; $i < 18 ; $i++ ){
						$af_delete_no = 'my-af'.$i;
						update_option( $af_delete_no , '' );
					}
					for( $i = 1; $i < 11 ; $i++ ){
						$afsc_delete_no = 'my-afsc'.$i;
						update_option( $afsc_delete_no , '' );
					}

					update_option( 'my-af', '' );
					update_option( 'my-af4b', '' );
					update_option( 'my-af5b', '' );
					update_option( 'my-af8b', '' );
					update_option( 'my-af9b', '' );
					update_option( 'my-af12b', '' );
					update_option( 'my-af13b', '' );

			}else{

				if ( isset( $_POST['my-af2'] ) && $_POST['my-af2'] ) {
					update_option( 'my-af2', $_POST['my-af2'] );
				} else {
					update_option( 'my-af2', '' );
				}

				if ( isset( $_POST['my-af3'] ) && $_POST['my-af3'] ) {
					update_option( 'my-af3', $_POST['my-af3'] );
				} else {
					update_option( 'my-af3', '' );
				}

				if ( isset( $_POST['my-af4'] ) && $_POST['my-af4'] ) {
					update_option( 'my-af4', $_POST['my-af4'] );
				} else {
					update_option( 'my-af4', '' );
				}
				
				if ( isset( $_POST['my-af4b'] ) && $_POST['my-af4b'] ) {
					update_option( 'my-af4b', $_POST['my-af4b'] );
				} else {
					update_option( 'my-af4b', '' );
				}

				if ( isset( $_POST['my-af5'] ) && $_POST['my-af5'] ) {
					update_option( 'my-af5', $_POST['my-af5'] );
				} else {
					update_option( 'my-af5', '' );
				}

				if ( isset( $_POST['my-af5b'] ) && $_POST['my-af5b'] ) {
					update_option( 'my-af5b', $_POST['my-af5b'] );
				} else {
					update_option( 'my-af5b', '' );
				}

				//ランク2

				if ( isset( $_POST['my-af6'] ) && $_POST['my-af6'] ) {
					update_option( 'my-af6', $_POST['my-af6'] );
				} else {
					update_option( 'my-af6', '' );
				}

				if ( isset( $_POST['my-af7'] ) && $_POST['my-af7'] ) {
					update_option( 'my-af7', $_POST['my-af7'] );
				} else {
					update_option( 'my-af7', '' );
				}

				if ( isset( $_POST['my-af8'] ) && $_POST['my-af8'] ) {
					update_option( 'my-af8', $_POST['my-af8'] );
				} else {
					update_option( 'my-af8', '' );
				}

				if ( isset( $_POST['my-af8b'] ) && $_POST['my-af8b'] ) {
					update_option( 'my-af8b', $_POST['my-af8b'] );
				} else {
					update_option( 'my-af8b', '' );
				}

				if ( isset( $_POST['my-af9'] ) && $_POST['my-af9'] ) {
					update_option( 'my-af9', $_POST['my-af9'] );
				} else {
					update_option( 'my-af9', '' );
				}

				if ( isset( $_POST['my-af9b'] ) && $_POST['my-af9b'] ) {
					update_option( 'my-af9b', $_POST['my-af9b'] );
				} else {
					update_option( 'my-af9b', '' );
				}

				//ランク3

				if ( isset( $_POST['my-af10'] ) && $_POST['my-af10'] ) {
					update_option( 'my-af10', $_POST['my-af10'] );
				} else {
					update_option( 'my-af10', '' );
				}

				if ( isset( $_POST['my-af11'] ) && $_POST['my-af11'] ) {
					update_option( 'my-af11', $_POST['my-af11'] );
				} else {
					update_option( 'my-af11', '' );
				}

				if ( isset( $_POST['my-af12'] ) && $_POST['my-af12'] ) {
					update_option( 'my-af12', $_POST['my-af12'] );
				} else {
					update_option( 'my-af12', '' );
				}

				if ( isset( $_POST['my-af12b'] ) && $_POST['my-af12b'] ) {
					update_option( 'my-af12b', $_POST['my-af12b'] );
				} else {
					update_option( 'my-af12b', '' );
				}

				if ( isset( $_POST['my-af13'] ) && $_POST['my-af13'] ) {
					update_option( 'my-af13', $_POST['my-af13'] );
				} else {
					update_option( 'my-af13', '' );
				}

				if ( isset( $_POST['my-af13b'] ) && $_POST['my-af13b'] ) {
					update_option( 'my-af13b', $_POST['my-af13b'] );
				} else {
					update_option( 'my-af13b', '' );
				}

			}

			if ( isset( $_POST['my-af14'] ) && $_POST['my-af14'] ) {
				update_option( 'my-af14', $_POST['my-af14'] );
			} else {
				update_option( 'my-af14', '' );
			}

			if ( isset( $_POST['my-af15'] ) && $_POST['my-af15'] ) {
				update_option( 'my-af15', $_POST['my-af15'] );
			} else {
				update_option( 'my-af15', '' );
			}

			if ( isset( $_POST['my-af16'] ) && $_POST['my-af16'] ) {
				update_option( 'my-af16', $_POST['my-af16'] );
			} else {
				update_option( 'my-af16', '' );
			}

			if ( isset( $_POST['my-af17'] ) && $_POST['my-af17'] ) {
				update_option( 'my-af17', $_POST['my-af17'] );
			} else {
				update_option( 'my-af17', '' );
			}

				if ( isset( $_POST['my-afsc1'] ) && $_POST['my-afsc1'] ) {
					update_option( 'my-afsc1', $_POST['my-afsc1'] );
				} else {
					update_option( 'my-afsc1', '' );
				}

				if ( isset( $_POST['my-afsc2'] ) && $_POST['my-afsc2'] ) {
					update_option( 'my-afsc2', $_POST['my-afsc2'] );
				} else {
					update_option( 'my-afsc2', '' );
				}

				if ( isset( $_POST['my-afsc3'] ) && $_POST['my-afsc3'] ) {
					update_option( 'my-afsc3', $_POST['my-afsc3'] );
				} else {
					update_option( 'my-afsc3', '' );
				}
				if ( isset( $_POST['my-afsc4'] ) && $_POST['my-afsc4'] ) {
					update_option( 'my-afsc4', $_POST['my-afsc4'] );
				} else {
					update_option( 'my-afsc4', '' );
				}
				if ( isset( $_POST['my-afsc5'] ) && $_POST['my-afsc5'] ) {
					update_option( 'my-afsc5', $_POST['my-afsc5'] );
				} else {
					update_option( 'my-afsc5', '' );
				}
				if ( isset( $_POST['my-afsc6'] ) && $_POST['my-afsc6'] ) {
					update_option( 'my-afsc6', $_POST['my-afsc6'] );
				} else {
					update_option( 'my-afsc6', '' );
				}
				if ( isset( $_POST['my-afsc7'] ) && $_POST['my-afsc7'] ) {
					update_option( 'my-afsc7', $_POST['my-afsc7'] );
				} else {
					update_option( 'my-afsc7', '' );
				}
				if ( isset( $_POST['my-afsc8'] ) && $_POST['my-afsc8'] ) {
					update_option( 'my-afsc8', $_POST['my-afsc8'] );
				} else {
					update_option( 'my-afsc8', '' );
				}
				if ( isset( $_POST['my-afsc9'] ) && $_POST['my-afsc9'] ) {
					update_option( 'my-afsc9', $_POST['my-afsc9'] );
				} else {
					update_option( 'my-afsc9', '' );
				}
				if ( isset( $_POST['my-afsc10'] ) && $_POST['my-afsc10'] ) {
					update_option( 'my-afsc10', $_POST['my-afsc10'] );
				} else {
					update_option( 'my-afsc10', '' );
				}



			wp_safe_redirect( menu_page_url( 'my-custom-admin-af', false ) );
		}
	}
}

if ( !function_exists( 'st_af_kanri_default_editor' ) ) {
	/**
	 * 説明エディタのデフォルトアクション
	 *
	 * @param string|null $location エディタの場所名
	 * @param string|null $name コントロール名 (name 属性値)
	 * @param string $content 内容
	 */
	function st_af_kanri_editor($location = null, $name = null, $content = '') {
		if ($location === null || $name === null) {
			return;
		}

		// 場所別アクションフック `st_af_kanri_<location>_editor` をトリガー
		do_action('st_af_kanri_' . $location . '_editor', $location, $name, $content);
	}

	add_action('st_af_kanri_editor', 'st_af_kanri_editor', 10, 6);
}

if (!function_exists('st_af_kanri_output_default_editor')) {
	/**
	 * 説明のデフォルトエディタ (テキストエリア) を出力
	 *
	 * @param string $location エディタの場所名
	 * @param string $name コントロール名 (name 属性値)
	 * @param string $content 内容
	 */
	function st_af_kanri_default_editor($location, $name, $content = '') {
		?>
		<textarea name="<?php echo esc_attr( $name ); ?>" cols="50" rows="10"><?php echo esc_html( $content ); ?></textarea>
		<?php
	}

	add_action('st_af_kanri_description_1_editor', 'st_af_kanri_default_editor', 10, 6);
	add_action('st_af_kanri_description_2_editor', 'st_af_kanri_default_editor', 10, 6);
	add_action('st_af_kanri_description_3_editor', 'st_af_kanri_default_editor', 10, 6);
	add_action('st_af_kanri_description_1b_editor', 'st_af_kanri_default_editor', 10, 6);
	add_action('st_af_kanri_description_2b_editor', 'st_af_kanri_default_editor', 10, 6);
	add_action('st_af_kanri_description_3b_editor', 'st_af_kanri_default_editor', 10, 6);

}

////////////////////////////////////////////
// スター
///////////////////////////////////////////

if ( !function_exists( 'st_star_rank1' ) ) {
	/**
	 * ランク1のスター
	 */
	function st_star_rank1(){
		if ( trim( $GLOBALS["myaf15"] ) !== '' ) {
		  $mystar = $GLOBALS["myaf15"];
			if ( $mystar == '5' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				</span>';
    			} elseif ( $mystar == '4' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
				</span>';
    			} elseif ( $mystar == '3' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				</span>';
    			} elseif ( $mystar == '2' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i></span>';
    			} elseif ( $mystar == '1' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				</span>';
			} else {
			}
		  return $mystarno ;
		}
	}
}

if ( !function_exists( 'st_star_rank2' ) ) {
	/**
	 * ランク2のスター
	 */
	function st_star_rank2(){
		if ( trim( $GLOBALS["myaf16"] ) !== '' ) {
		  $mystar = $GLOBALS["myaf16"];
			if ( $mystar == '5' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				</span>';
    			} elseif ( $mystar == '4' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
				</span>';
    			} elseif ( $mystar == '3' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				</span>';
    			} elseif ( $mystar == '2' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				</span>';
    			} elseif ( $mystar == '1' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				</span>';
			} else {
			}
		  return $mystarno ;
		}
	}
}


if ( !function_exists( 'st_star_rank3' ) ) {
	/**
	 * ランク3のスター
	 */
	function st_star_rank3(){
		if ( trim( $GLOBALS["myaf17"] ) !== '' ) {
		  $mystar = $GLOBALS["myaf17"];
			if ( $mystar == '5' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				</span>';
    			} elseif ( $mystar == '4' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
				</span>';
    			} elseif ( $mystar == '3' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				</span>';
    			} elseif ( $mystar == '2' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i></span>';
    			} elseif ( $mystar == '1' ) {
				$mystarno = '<br/><span class="st-star">
				<i class="fa fa-star"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				<i class="fa fa-star-o"></i>
				</span>';
			} else {
			}
		  return $mystarno ;
		}
	}
}

////////////////////////////////////////////
// ランキングショートコード
///////////////////////////////////////////

// ランキングショートコード1
function rankbox1() {
	$mystarno = st_star_rank1();
	$html = '';
	$html .= '<div class="rankst-box post">
<h4 class="rankh4">' . esc_html( $GLOBALS["myaf2"] ) . $mystarno . '</h4>
	<div class="clearfix rankst"><div class="rankst-l">' . stripslashes( $GLOBALS["myaf3"] ) . '</div>
	<div class="rankst-r">
	<div class="rankst-cont">' . apply_filters( 'st_af_kanri_rank1_description', stripslashes( $GLOBALS["myaf4"] ), 'description_1', 'my-af4' ) . '</div></div></div>
<div class="rankst-contb">' . apply_filters( 'st_af_kanri_rank1b_description', stripslashes( $GLOBALS["myaf4b"] ), 'description_1b', 'my-af4b' ) . '</div>';

	if ( trim( $GLOBALS["myaf5b"] ) == '' && trim( $GLOBALS["myaf5"] ) == '' ) { //両方空
		$html .= '</div>';
	} elseif ( trim( $GLOBALS["myaf5b"] ) !== '' && trim( $GLOBALS["myaf5"] ) !== '' ) { //両方あり
		$html .= '<div class="clearfix rankst">
		<div class="rankstlink-l">
		<p><a href="' . stripslashes( $GLOBALS["myaf5b"] ) . '">' . esc_html( $GLOBALS["myaf14"] ) . '</a></p></div>
		<div class="rankstlink-r">
		<p>' . stripslashes( $GLOBALS["myaf5"] ) . '</p></div>
		</div></div>';
	} elseif ( trim( $GLOBALS["myaf5b"] ) !== '' && trim( $GLOBALS["myaf5"] ) == '' ) { //詳細ページのみ
		$html .= '<div class="clearfix rankst">
		<div class="rankstlink-b">
		<p><a href="' . stripslashes( $GLOBALS["myaf5b"] ) . '">' . esc_html( $GLOBALS["myaf14"] ) . '</a></p></div>
		</div></div>';
	} elseif ( trim( $GLOBALS["myaf5b"] ) == '' && trim( $GLOBALS["myaf5"] ) !== '' ) { //公式リンクのみ
		$html .= '<div class="clearfix rankst">
			<div class="rankstlink-a">
			<p>' . stripslashes( $GLOBALS["myaf5"] ) . '</p></div>
			</div></div>';
	}
	$rank1 = $html;
	return $html;
	global $rank1;
}

add_shortcode( 'rank1', 'rankbox1' );

// ランキングショートコード2

function rankbox2() {
  	$mystarno = st_star_rank2();
	$html2 = '';
	$html2 .= '<div class="rankst-box post">
	<h4 class="rankh4">' . esc_html( $GLOBALS["myaf6"] ) . $mystarno . '</h4>
	<div class="clearfix rankst"><div class="rankst-l">' . stripslashes( $GLOBALS["myaf7"] ) . '</div>
	<div class="rankst-r"><div class="rankst-cont">' . apply_filters( 'st_af_kanri_rank2_description', stripslashes( $GLOBALS["myaf8"] ), 'description_2', 'my-af8' ) . '</div></div></div>
<div class="rankst-contb">' . apply_filters( 'st_af_kanri_rank2b_description', stripslashes( $GLOBALS["myaf8b"] ), 'description_2b', 'my-af8b' ) . '</div>';

	if ( trim( $GLOBALS["myaf9b"] ) == '' && trim( $GLOBALS["myaf9"] ) == '' ) { //両方空
		$html2 .= '</div>';
	} elseif ( trim( $GLOBALS["myaf9b"] ) !== '' && trim( $GLOBALS["myaf9"] ) !== '' ) { //両方あり
		$html2 .= '<div class="clearfix rankst">
		<div class="rankstlink-l">
		<p><a href="' . stripslashes( $GLOBALS["myaf9b"] ) . '">' . esc_html( $GLOBALS["myaf14"] ) . '</a></p></div>
		<div class="rankstlink-r">
		<p>' . stripslashes( $GLOBALS["myaf9"] ) . '</p></div>
		</div></div>';
	} elseif ( trim( $GLOBALS["myaf9b"] ) !== '' && trim( $GLOBALS["myaf9"] ) == '' ) { //詳細ページのみ
		$html2 .= '<div class="clearfix rankst">
		<div class="rankstlink-b">
		<p><a href="' . stripslashes( $GLOBALS["myaf9b"] ) . '">' . esc_html( $GLOBALS["myaf14"] ) . '</a></p></div>
		</div></div>';
	} elseif ( trim( $GLOBALS["myaf9b"] ) == '' && trim( $GLOBALS["myaf9"] ) !== '' ) { //公式リンクのみ
		$html2 .= '<div class="clearfix rankst">
			<div class="rankstlink-a">
			<p>' . stripslashes( $GLOBALS["myaf9"] ) . '</p></div>
			</div></div>';
	}

	return $html2;
}

add_shortcode( 'rank2', 'rankbox2' );

// ランキングショートコード3

function rankbox3() {
  	$mystarno = st_star_rank3();
	$html3 = '';
	$html3 .= '<div class="rankst-box post">
	<h4 class="rankh4">' . esc_html( $GLOBALS["myaf10"] ) . $mystarno . '</h4>
	<div class="clearfix rankst"><div class="rankst-l">' . stripslashes( $GLOBALS["myaf11"] ) . '</div>
	<div class="rankst-r"><div class="rankst-cont">' . apply_filters( 'st_af_kanri_rank3_description', stripslashes( $GLOBALS["myaf12"] ), 'description_3', 'my-af12' ) . '</div></div></div>
<div class="rankst-contb">' . apply_filters( 'st_af_kanri_rank3b_description', stripslashes( $GLOBALS["myaf12b"] ), 'description_3b', 'my-af12b' ) . '</div>';

	if ( trim( $GLOBALS["myaf13b"] ) == '' && trim( $GLOBALS["myaf13"] ) == '' ) { //両方空
		$html3 .= '</div>';
	} elseif ( trim( $GLOBALS["myaf13b"] ) !== '' && trim( $GLOBALS["myaf13"] ) !== '' ) { //両方あり
		$html3 .= '<div class="clearfix rankst">
		<div class="rankstlink-l">
		<p><a href="' . stripslashes( $GLOBALS["myaf13b"] ) . '">' . esc_html( $GLOBALS["myaf14"] ) . '</a></p></div>
		<div class="rankstlink-r">
		<p>' . stripslashes( $GLOBALS["myaf13"] ) . '</p></div>
		</div></div>';
	} elseif ( trim( $GLOBALS["myaf13b"] ) !== '' && trim( $GLOBALS["myaf13"] ) == '' ) { //詳細ページのみ
		$html3 .= '<div class="clearfix rankst">
		<div class="rankstlink-b">
		<p><a href="' . stripslashes( $GLOBALS["myaf13b"] ) . '">' . esc_html( $GLOBALS["myaf14"] ) . '</a></p></div>
		</div></div>';
	} elseif ( trim( $GLOBALS["myaf13b"] ) == '' && trim( $GLOBALS["myaf13"] ) !== '' ) { //公式リンクのみ
		$html3 .= '<div class="clearfix rankst">
			<div class="rankstlink-a">
			<p>' . stripslashes( $GLOBALS["myaf13"] ) . '</p></div>
			</div></div>';
	}

	return $html3;
}

add_shortcode( 'rank3', 'rankbox3' );

// ランキングの説明

if ( !function_exists( 'st_af_kanri_default_editor_content' ) ) {
	/**
	 * ランキングの説明を取得 (デフォルトフィルター: HTMLをエスケープ / 改行を <br> へ変換 / p要素とする)
	 *
	 * @param string $content 説明の内容
	 *
	 * @return string 説明の内容
	 */
	function st_af_kanri_default_editor_content( $content ) {
		return '<p>' . nl2br( esc_html( $content ) ) . '</p>';
	}

	add_filter( 'st_af_kanri_rank1_description', 'st_af_kanri_default_editor_content' );
	add_filter( 'st_af_kanri_rank2_description', 'st_af_kanri_default_editor_content' );
	add_filter( 'st_af_kanri_rank3_description', 'st_af_kanri_default_editor_content' );
	add_filter( 'st_af_kanri_rank1b_description', 'st_af_kanri_default_editor_content' );
	add_filter( 'st_af_kanri_rank2b_description', 'st_af_kanri_default_editor_content' );
	add_filter( 'st_af_kanri_rank3b_description', 'st_af_kanri_default_editor_content' );
}

// ランキングショートコード全て

function rankbox4() {
	$ranks1 = rankbox1();
	$ranks2 = rankbox2();
	$ranks3 = rankbox3();

	$html4 = '';
	if ( trim( $GLOBALS["myaf2"] ) !== '' ) {
		$html4 .= $ranks1;
	}
	if ( trim( $GLOBALS["myaf6"] ) !== '' ) {
		$html4 .= $ranks2;
	}
	if ( trim( $GLOBALS["myaf10"] ) !== '' ) {
		$html4 .= $ranks3;
	}
	return $html4;
}

add_shortcode( 'rank', 'rankbox4' );

// ランキングショートコード全てサイド用

$rankside1 = '<h4 class="rankh4">' . esc_html( $GLOBALS["myaf2"] ) . '</h4><div class="rankst-ls">' . stripslashes( $GLOBALS["myaf3"] ) . '</div>';
$rankside2 = '<h4 class="rankh4">' . esc_html( $GLOBALS["myaf6"] ) . '</h4><div class="rankst-ls">' . stripslashes( $GLOBALS["myaf7"] ) . '</div>';
$rankside3 = '<h4 class="rankh4">' . esc_html( $GLOBALS["myaf10"] ) . '</h4><div class="rankst-ls">' . stripslashes( $GLOBALS["myaf11"] ) . '</div>';

function rankboxside() {
	$html5 = '';
	if ( trim( $GLOBALS["myaf2"] ) !== '' ) {
		$html5 .= $GLOBALS["rankside1"];
	}
	if ( trim( $GLOBALS["myaf6"] ) !== '' ) {
		$html5 .= $GLOBALS["rankside2"];
	}
	if ( trim( $GLOBALS["myaf10"] ) !== '' ) {
		$html5 .= $GLOBALS["rankside3"];
	}
	return $html5;
}

add_shortcode( 'rank-side', 'rankboxside' );

// ランキングオリジナルCSS読み込み
if ( $GLOBALS["myaf1"] === '' ) {
	function register_stylesheet() {
		wp_register_style( 'single', get_template_directory_uri() . '/st-rankcss.php', array(), null, 'all' );
	}

	function load_stylesheet() {
		register_stylesheet();
		wp_enqueue_style( 'single' );
	}

	add_action( 'wp_enqueue_scripts', 'load_stylesheet' );

}
