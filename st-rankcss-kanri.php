<?php

// 直接アクセスを禁止
if ( !defined( 'ABSPATH' ) ) {
     exit;
}

// 管理画面ページ

if ( !function_exists( 'st_rankcss_force_to_hex_color' ) ) {
	/**
	 * #付き16進数カラーへ変換
	 *
	 * @param string $color
	 *
	 * @return string
	 */
	function st_rankcss_force_to_hex_color( $color ) {
		$color = trim( $color );

		if ( $color === '' ) {
			return $color;
		}

		if ( !preg_match( '|\A([A-Fa-f0-9]{3}){1,2}\z|', $color ) ) {
			return $color;
		}

		$color = '#' . $color;

		return $color;
	}
}

if( trim(get_option( 'st-cssdata1' )) === ''){
	$stcssdata1 = '#ffffff' ;
	}else{
	$stcssdata1 = st_rankcss_force_to_hex_color( get_option( 'st-cssdata1' ) );
}

if( trim(get_option( 'st-cssdata2' )) === ''){
	$stcssdata2 = '#E53935' ;
	}else{
	$stcssdata2 = st_rankcss_force_to_hex_color( get_option( 'st-cssdata2' ) );
}

if( trim(get_option( 'st-cssdata3' )) === ''){
	$stcssdata3 = '#039BE6' ;
	}else{
	$stcssdata3 = st_rankcss_force_to_hex_color( get_option( 'st-cssdata3' ) );
}

if( trim(get_option( 'st-cssdata4' )) === ''){
	$stcssdata4 = '#c5bf3b' ;
	}else{
	$stcssdata4 = st_rankcss_force_to_hex_color( get_option( 'st-cssdata4' ) );
}

if( trim(get_option( 'st-cssdata5' )) === ''){
	$stcssdata5 = '#ffffff' ;
	}else{
	$stcssdata5 = st_rankcss_force_to_hex_color( get_option( 'st-cssdata5' ) );
}

if( trim(get_option( 'st-cssdata6' )) === ''){
	$stcssdata6 = '#ffffe0' ;
	}else{
	$stcssdata6 = st_rankcss_force_to_hex_color( get_option( 'st-cssdata6' ) );
}

if ( !function_exists( 'st_rankcss_get_menu_slug' ) ) {
	/**
	 * メニュースラッグを取得
	 *
	 * @return string メニュースラッグ
	 */
	function st_rankcss_get_menu_slug() {
		return 'my-custom-admin-rankcss';
	}
}

if ( !function_exists( 'my_admin_menu_rankcss' ) ) {
	/**
	 * 管理メニューを登録
	 */
	function my_admin_menu_rankcss() {
		add_object_page(
			__( 'ランクCSS管理', 'my-custom-admin-rankcss' ),
			__( 'ランクCSS管理', 'my-custom-admin-rankcss' ),
			'manage_options',
			st_rankcss_get_menu_slug(),
			'my_custom_admin_rankcss'
		);
	}

	add_action( 'admin_menu', 'my_admin_menu_rankcss' );
}

// 基本管理画面
function my_custom_admin_rankcss() {
     ?>

     <div class="wrap">
	<h2><i class="fa fa-cogs"></i>&nbsp;ランキングCSS管理画面</h2>
	<!-- カラーピッカー予定 -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
          
		<form id="my-main-form-rankcss" method="post" action="">
               	<?php wp_nonce_field( 'my-nonce-key-rankcss', 'my-custom-admin-rankcss' ); ?>


		<h3 style="padding:10px;margin-bottom:10px;border:1px solid #ccc;background-color:#f3f3f3;">リンクボタン基本色</h3>
		<p><img src="<?php echo get_template_directory_uri(); ?>/images/guide/rankcss_cap.jpg"></p>

               <h4>1）リンク文字カラー</h4>

               <?php if ( trim( $GLOBALS["stcssdata1"] ) === '' ) { ?>
			<p>現在のカラー：<span style="padding:0px 10px;background-color:<?php echo esc_attr( $GLOBALS["stcssdata1"] ); ?>;
			margin-right:10px;"></span><?php echo esc_html( $GLOBALS["stcssdata1"] ); ?></p>
			<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata1" value="<?php echo esc_attr( $GLOBALS["stcssdata1"] ); ?>" size="6" maxlength="6" style="ime-mode:disabled;" data-wp-color-picker></p>
              <?php } else { ?>
			<p>現在のカラー：<span style="padding:0px 10px;background-color:<?php echo esc_attr( $GLOBALS["stcssdata1"] ); ?>;
			margin-right:10px;"></span><?php echo esc_html( $GLOBALS["stcssdata1"] ); ?></p>
			<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata1" value="<?php echo esc_attr( $GLOBALS["stcssdata1"] ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
			
		<?php  } ?>

               <h4>2）オリジナルリンク背景色</h4>

               <?php if ( trim( $GLOBALS["stcssdata3"] ) === '' ) { ?>
			<p>現在のカラー：<span style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata3"] ) ); ?>;
			margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata3"] ) ); ?></p>
              		<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata3" value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata3"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
              <?php } else { ?>
		<p>現在のカラー：<span style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata3"] ) ); ?>;
		margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata3"] ) ); ?></p>
		<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata3" value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata3"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

		<?php  } ?>

               <h4>3）アフィリエイトリンクボタン背景色</h4>

               <?php if ( trim( $GLOBALS["stcssdata2"] ) === '' ) { ?>
			<p>現在のカラー：<span style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata2"] ) ); ?>;
			margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata2"] ) ); ?></p>
              		<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata2" value="28222" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
              <?php } else { ?>
			<p>現在のカラー：<span style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata2"] ) ); ?>;margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata2"] ) ); ?></p>
			<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata2" value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata2"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
			
		<?php  } ?>

		<h3 style="padding:10px;margin-bottom:10px;border:1px solid #ccc;background-color:#f3f3f3;">トップ以外に表示されるランキング一覧</h3>

               <h4>ランキングタイトル吹き出し背景色</h4>

               <?php if ( trim( $GLOBALS["stcssdata4"] ) === '' ) { ?>
			<p>現在のカラー：<span style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata4"] ) ); ?>;
			margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata4"] ) ); ?></p>
              		<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata4" value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata4"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
              <?php } else { ?>
		<p>現在のカラー：<span style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata4"] ) ); ?>;
		margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata4"] ) ); ?></p>
		<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata4" value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata4"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

		<?php  } ?>

               <h4>ランキング総タイトル文字色</h4>

               <?php if ( trim( $GLOBALS["stcssdata5"] ) === '' ) { ?>
			<p>現在のカラー：<span style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata5"] ) ); ?>;
			margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata5"] ) ); ?></p>
              		<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata5" value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata5"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
              <?php } else { ?>
		<p>現在のカラー：<span style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata5"] ) ); ?>;
		margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata5"] ) ); ?></p>
		<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata5" value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata5"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

		<?php  } ?>

               <h3>ランキング一覧背景色</h3>

               <?php if ( trim( $GLOBALS["stcssdata6"] ) === '' ) { ?>
			<p>現在のカラー：<span style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata6"] ) ); ?>;
			margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata6"] ) ); ?></p>
              		<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata6" value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata6"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>
              <?php } else { ?>
		<p>現在のカラー：<span style="padding:0px 10px;background-color:<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata6"] ) ); ?>;
		margin-right:10px;"></span><?php echo esc_html( stripslashes( $GLOBALS["stcssdata6"] ) ); ?></p>
		<P>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-cssdata6" value="<?php echo esc_attr( stripslashes( $GLOBALS["stcssdata6"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

		<?php  } ?>

		<hr/>
		<p>※「クリア」で保存すると初期カラーにリセットされます。</p>
             <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'save',
                         'my-custom-admin-rankcss' ) ); ?>" class="button button-primary button-large">
               </p>
          </form>
     </div>
<?php }

if ( !function_exists( 'sanitize_hex_color' ) ) {
	/**
	 * #付き16進数カラー以外を除去
	 *
	 * @param string $color
	 *
	 * @return string|null
	 */
	function sanitize_hex_color( $color ) {
		if ( '' === $color ) {
			return '';
		}

		if ( preg_match( '|\A#([A-Fa-f0-9]{3}){1,2}\z|', $color ) ) {
			return $color;
		}

		return null;
	}
}

add_action( 'admin_init', 'my_admin_init_rankcss' );

function my_admin_init_rankcss() {
     if ( isset( $_POST['my-custom-admin-rankcss'] ) && $_POST['my-custom-admin-rankcss'] ) {
          if ( check_admin_referer( 'my-nonce-key-rankcss', 'my-custom-admin-rankcss' ) ) {
               if ( isset( $_POST['st-cssdata1'] ) && $_POST['st-cssdata1'] ) {
                    update_option( 'st-cssdata1', sanitize_hex_color( $_POST['st-cssdata1'] ) );
               } else {
                    update_option( 'st-cssdata1', '' );
               }

               if ( isset( $_POST['st-cssdata2'] ) && $_POST['st-cssdata2'] ) {
                    update_option( 'st-cssdata2', sanitize_hex_color( $_POST['st-cssdata2'] ) );
               } else {
                    update_option( 'st-cssdata2', '' );
               }

               if ( isset( $_POST['st-cssdata3'] ) && $_POST['st-cssdata3'] ) {
                    update_option( 'st-cssdata3', sanitize_hex_color( $_POST['st-cssdata3'] ) );
               } else {
                    update_option( 'st-cssdata3', '' );
               }

               if ( isset( $_POST['st-cssdata4'] ) && $_POST['st-cssdata4'] ) {
                    update_option( 'st-cssdata4', sanitize_hex_color( $_POST['st-cssdata4'] ) );
               } else {
                    update_option( 'st-cssdata4', '' );
               }

               if ( isset( $_POST['st-cssdata5'] ) && $_POST['st-cssdata5'] ) {
                    update_option( 'st-cssdata5', sanitize_hex_color( $_POST['st-cssdata5'] ) );
               } else {
                    update_option( 'st-cssdata5', '' );
               }

               if ( isset( $_POST['st-cssdata6'] ) && $_POST['st-cssdata6'] ) {
                    update_option( 'st-cssdata6', sanitize_hex_color( $_POST['st-cssdata6'] ) );
               } else {
                    update_option( 'st-cssdata6', '' );
               }

               wp_safe_redirect( menu_page_url( 'my-custom-admin-rankcss', false ) );
          }
     }
}

if ( !function_exists( 'st_rankcss_is_admin_screen' ) ) {
	/**
	 * 現在の画面が管理画面かどうかを取得
	 *
	 * @return bool 管理画面の場合は true
	 */
	function st_rankcss_is_admin_screen() {
		$screen          = get_current_screen();
		$admin_screen_id = 'toplevel_page_' . st_rankcss_get_menu_slug();

		return ( $screen->id === $admin_screen_id );
	}
}

if ( !function_exists( 'st_rankcss_enqueue_color_picker' ) ) {
	/**
	 * カラーピッカー用スクリプトを登録
	 */
	function st_rankcss_enqueue_color_picker() {
		if ( !st_rankcss_is_admin_screen() ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script(
			'st-color-picker',
			get_template_directory_uri() . '/js/st-color-picker.js',
			array( 'wp-color-picker' ),
			false,
			false
		);
	}

	add_action( 'admin_enqueue_scripts', 'st_rankcss_enqueue_color_picker' );
}
