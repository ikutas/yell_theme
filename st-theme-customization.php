<?php

function st_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'st_logo_image',
		array(
			'title' => 'ロゴ画像',
			'priority' => 10,
		) );

	$wp_customize->add_setting( 'st_logo_image',
		array(
			'default' => '',
			'type' => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'logo_Image',
		array(
			'label' => '画像',
			'section' => 'st_logo_image',
			'settings' => 'st_logo_image',
		)
	) );

		/*-------------------------------------------------------
		基本カラー
		-------------------------------------------------------*/

		$wp_customize->add_section( 'colors',
			array(
				'title' => __( '基本カラー', 'st' ),
				'description' => '[!] 細かく修正するには<b>テーマ管理画面にて「オリジナルテーマカスタマイザーを使用する」をオン</b>にする必要があります。',
				'priority' => 30,
			) );

if ( isset( $GLOBALS["stdata1"] ) && $GLOBALS["stdata1"] === 'yes' ) {



		$wp_customize->add_setting( 'st_menu_logocolor',
			array(
			'default' => '#1a1a1a',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_logocolor', array(
			'label' => __( 'タイトル色など', 'st' ),
			'description' => 'サイトタイトルとその下のキャプションのカラー',
			'section' => 'colors',
			'settings' => 'st_menu_logocolor',
		) ) );

		//メニューバー

		$wp_customize->add_setting( 'st_menu_navbarcolor_t',
			array(
			'default' => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_navbarcolor_t', array(
			'label' => __( 'メニュー', 'st' ),
			'section' => 'colors',
			'description' => '背景色上部',
			'settings' => 'st_menu_navbarcolor_t',
		) ) );

		$wp_customize->add_setting( 'st_menu_navbarcolor',
			array(
			'default' => '#f3f3f3',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_navbarcolor', array(
			'label' => __( '', 'st' ),
			'section' => 'colors',
			'description' => '背景色下部',
			'settings' => 'st_menu_navbarcolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_navbartextcolor',
			array(
			'default' => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_navbartextcolor', array(
			'label' => __( '', 'st' ),
			'description' => '文字色',
			'section' => 'colors',
			'settings' => 'st_menu_navbartextcolor',
		) ) );

		//ドロップダウンメニュー背景

		$wp_customize->add_setting( 'st_menu_navbar_undercolor',
			array(
			'default' => '#f3f3f3',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_navbar_undercolor', array(
			'label' => __( '', 'st' ),
			'section' => 'colors',
			'description' => 'ドロップダウンメニュー背景色',
			'settings' => 'st_menu_navbar_undercolor',
		) ) );

		//固定ページサイドメニュー

		//第二階層以下
		$wp_customize->add_setting( 'st_menu_pagelist_childtextcolor',
			array(
			'default' => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_pagelist_childtextcolor', array(
			'label' => __( 'サイド固定ページメニュー', 'st' ),
			'section' => 'colors',
			'description' => '第二階層の文字色',
			'settings' => 'st_menu_pagelist_childtextcolor',
		) ) );

		//固定ページサイドメニュー背景
		$wp_customize->add_setting( 'st_menu_pagelist_bgcolor',
			array(
			'default' => '#f3f3f3',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_pagelist_bgcolor', array(
			'label' => __( '', 'st' ),
			'description' => '背景色',
			'section' => 'colors',
			'settings' => 'st_menu_pagelist_bgcolor',
		) ) );

		//スマホ基本色

		$wp_customize->add_setting( 'st_menu_sumartcolor',
			array(
			'default' => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_sumartcolor', array(
			'label' => __( 'スマートフォン', 'st' ),
			'description' => 'アコーディオンメニューとページトップボタン',
			'section' => 'colors',
			'settings' => 'st_menu_sumartcolor',
		) ) );
			

		//スマホメニュー文字色

		$wp_customize->add_setting( 'st_menu_sumartmenutextcolor',
			array(
			'default' => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_sumartmenutextcolor', array(
			'label' => __( '', 'st' ),
			'description' => 'スマホメニュー文字色',
			'section' => 'colors',
			'settings' => 'st_menu_sumartmenutextcolor',
		) ) );

		/*ヘッダーウィジェットの背景色*/

		$wp_customize->add_setting( 'st_headerwidget_bgcolor', 
			array(
			'default' => '#f3f3f3',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_headerwidget_bgcolor', array(
			'label' => __( 'ヘッダーウィジェット', 'st' ),
			'section' => 'colors',
			'description' => '背景色',
			'settings' => 'st_headerwidget_bgcolor',
		) ) );




		//追加のデザイン

		$wp_customize->add_setting( 'st_header_border_color',
			array(
			'default' => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_header_border_color', array(
			'label' => __( 'ヘッダー', 'st' ),
			'section' => 'colors',
			'description' => '上に3pxのラインを追加',
			'settings' => 'st_header_border_color',
		) ) );


		/*ヘッダー*/

		$wp_customize->add_setting( 'st_headerbox_bg_color_t',
			array(
			'default' => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_headerbox_bg_color_t', array(
			'label' => __( '', 'st' ),
			'section' => 'colors',
			'description' => '背景色上部',
			'settings' => 'st_headerbox_bg_color_t',
		) ) );

		$wp_customize->add_setting( 'st_headerbox_bg_color',
			array(
			'default' => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_headerbox_bg_color', array(
			'label' => __( '', 'st' ),
			'section' => 'colors',
			'description' => '背景色下部',
			'settings' => 'st_headerbox_bg_color',
		) ) );

		/*フッター*/

		$wp_customize->add_setting( 'st_footer_bg_color_t',
			array(
			'default' => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_footer_bg_color_t', array(
			'label' => __( 'フッター', 'st' ),
			'section' => 'colors',
			'description' => '背景色上部',
			'settings' => 'st_footer_bg_color_t',
		) ) );

		$wp_customize->add_setting( 'st_footer_bg_color',
			array(
			'default' => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_footer_bg_color', array(
			'label' => __( '', 'st' ),
			'section' => 'colors',
			'description' => '背景色下部',
			'settings' => 'st_footer_bg_color',
		) ) );

		$wp_customize->add_setting( 'st_footer_bg_text_color',
			array(
			'default' => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_footer_bg_text_color', array(
			'label' => __( '', 'st' ),
			'section' => 'colors',
			'description' => '文字色',
			'settings' => 'st_footer_bg_text_color',
		) ) );

		/*-------------------------------------------------------
		各見出し
		-------------------------------------------------------*/

		$wp_customize->add_section( 'tagcolors',
			array(
				'title' => __( '[+] 各見出し色', 'st' ),
				'description' => '細かく修正するには<b>テーマ管理画面にて「オリジナルテーマカスタマイザーを使用する」をオン</b>にする必要があります。',
				'priority' => 40,
			) );



		/*h2タグ*/

		$wp_customize->add_setting( 'st_menu_bgcolor', 			
			array(
			'default' => '#f3f3f3',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );


		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_bgcolor', array(
			'label' => __( 'H2タグ（吹き出し）', 'st' ),
			'description' => '背景色',
			'section' => 'tagcolors',
			'settings' => 'st_menu_bgcolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_color', 
			array(
			'default' => '#1a1a1a',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_color', array(
			'label' => __( '', 'st' ),
			'description' => '文字色',
			'section' => 'tagcolors',
			'settings' => 'st_menu_color',
		) ) );

		/*h3タグ*/

		$wp_customize->add_setting( 'st_menu_h3textcolor', 			
			array(
			'default' => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_h3textcolor', array(
			'label' => __( 'H3タグ', 'st' ),
			'description' => '文字と下線色',
			'section' => 'tagcolors',
			'settings' => 'st_menu_h3textcolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_h3bgcolor', 			
			array(
			'default' => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_h3bgcolor', array(
			'label' => __( '', 'st' ),
			'description' => '背景色',
			'section' => 'tagcolors',
			'settings' => 'st_menu_h3bgcolor',
		) ) );

		/*h4タグ*/

		$wp_customize->add_setting( 'st_menu_h4bgcolor', 			
			array(
			'default' => '#f3f3f3',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_h4bgcolor', array(
			'label' => __( 'H4タグ', 'st' ),
			'section' => 'tagcolors',
			'description' => '背景色',
			'settings' => 'st_menu_h4bgcolor',
		) ) );

		/*サイドバー見出し色*/

		$wp_customize->add_setting( 'st_menu_h4sidetextcolor', 			
			array(
			'default' => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_h4sidetextcolor', array(
			'label' => __( 'サイドバー見出し色', 'st' ),
			'section' => 'tagcolors',
			'settings' => 'st_menu_h4sidetextcolor',
		) ) );


		/*-------------------------------------------------------
		オプションカラー
		-------------------------------------------------------*/

		$wp_customize->add_section( 'optioncolors',
			array(
				'title' => __( '[+] オプションカラー', 'st' ),
				'description' => '管理画面で使用する事で表示されるアイテムのカラー調整',
				'priority' => 50,
			) );



		/*RSS（購読する）ボタン*/

		$wp_customize->add_setting( 'st_rss_color', 
			array(
			'default' => '#87BF31',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_rss_color', array(
			'label' => __( 'RSS（購読する）ボタン', 'st' ),
			'section' => 'optioncolors',
			'settings' => 'st_rss_color',
		) ) );
        
        		//お知らせ

		$wp_customize->add_setting( 'st_menu_newsbarcolor_t',
			array(
			'default' => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_newsbarcolor_t', array(
			'label' => __( 'お知らせ', 'st' ),
			'section' => 'optioncolors',
			'description' => '背景色上部',
			'settings' => 'st_menu_newsbarcolor_t',
		) ) );

		$wp_customize->add_setting( 'st_menu_newsbarcolor',
			array(
			'default' => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_newsbarcolor', array(
			'label' => __( '', 'st' ),
			'section' => 'optioncolors',
			'description' => '背景色下部',
			'settings' => 'st_menu_newsbarcolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_newsbartextcolor',
			array(
			'default' => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_newsbartextcolor', array(
			'label' => __( '', 'st' ),
			'section' => 'optioncolors',
			'description' => '文字色',
			'settings' => 'st_menu_newsbartextcolor',
		) ) );

        
        

		/*任意お薦め記事*/

		$wp_customize->add_setting( 'st_menu_osusumemidasitextcolor', 			
			array(
			'default' => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_osusumemidasitextcolor', array(
			'label' => __( 'おすすめ記事', 'st' ),
			'section' => 'optioncolors',
			'description' => '文字色',
			'settings' => 'st_menu_osusumemidasitextcolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_osusumemidasicolor', 			
			array(
			'default' => '#FEB20A',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_osusumemidasicolor', array(
			'label' => __( '', 'st' ),
			'section' => 'optioncolors',
			'description' => '背景色',
			'settings' => 'st_menu_osusumemidasicolor',
		) ) );


		/*任意お薦め記事No*/

		$wp_customize->add_setting( 'st_menu_osusumemidasinocolor', 			
			array(
			'default' => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_osusumemidasinocolor', array(
			'label' => __( '', 'st' ),
			'section' => 'optioncolors',
			'description' => 'ナンバー色',
			'settings' => 'st_menu_osusumemidasinocolor',
		) ) );

		$wp_customize->add_setting( 'st_menu_osusumemidasinobgcolor', 			
			array(
			'default' => '#FEB20A',
			'sanitize_callback' => 'sanitize_hex_color',
			'sanitize_js_callback' => 'maybe_hash_hex_color',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st_menu_osusumemidasinobgcolor', array(
			'label' => __( '', 'st' ),
			'section' => 'optioncolors',
			'description' => 'ナンバー背景色',
			'settings' => 'st_menu_osusumemidasinobgcolor',
		) ) );





	}
}

	add_action( 'customize_register', 'st_customize_register' );


if ( isset( $GLOBALS["stdata1"] ) && $GLOBALS["stdata1"] === 'yes' ) {

	function st_customize_css() {
		//初期カラー
		$menu_color = get_theme_mod( 'st_menu_color', '#1a1a1a' );
		$menu_bgcolor = get_theme_mod( 'st_menu_bgcolor', '#f3f3f3' );
		$menu_h3textcolor = get_theme_mod( 'st_menu_h3textcolor', '#000' ); //h3のテキスト色
		$menu_h3bgcolor = get_theme_mod( 'st_menu_h3bgcolor', '#fff' ); //h3の背景色
		$menu_h4sidetextcolor = get_theme_mod( 'st_menu_h4sidetextcolor', '#000' ); //サイドバー見出し
		$menu_h4bgcolor = get_theme_mod( 'st_menu_h4bgcolor', '#f3f3f3' );
		$menu_logocolor = get_theme_mod( 'st_menu_logocolor', '#1a1a1a' );
		$menu_rsscolor = get_theme_mod( 'st_rss_color', '#87BF31' );
		$menu_newsbarcolor = get_theme_mod( 'st_menu_newsbarcolor', '#fff' );
		$menu_newsbarcolor_t = get_theme_mod( 'st_menu_newsbarcolor_t', '#fff' );
		$menu_newsbartextcolor = get_theme_mod( 'st_menu_newsbartextcolor', '#000' );
		$menu_navbarcolor = get_theme_mod( 'st_menu_navbarcolor', '#f3f3f3' );
		$menu_navbar_undercolor = get_theme_mod( 'st_menu_navbar_undercolor', '#f3f3f3' );
		$menu_navbarcolor_t = get_theme_mod( 'st_menu_navbarcolor_t', '#fff' );
		$menu_navbartextcolor = get_theme_mod( 'st_menu_navbartextcolor', '#000' );
		$menu_sumartmenutextcolor = get_theme_mod( 'st_menu_sumartmenutextcolor', '#000' ); //スマホメニュー
		$menu_sumartcolor = get_theme_mod( 'st_menu_sumartcolor', '#000' ); //スマホメニュー
		$menu_pagelist_bgcolor = get_theme_mod( 'st_menu_pagelist_bgcolor', '#f3f3f3' );
		$menu_pagelist_childtextcolor = get_theme_mod( 'st_menu_pagelist_childtextcolor', '#000' );

		$st_header_border_color = get_theme_mod( 'st_header_border_color', '#fff' );
		$st_headerbox_bg_color_t = get_theme_mod( 'st_headerbox_bg_color_t', '#fff' );
		$st_headerbox_bg_color = get_theme_mod( 'st_headerbox_bg_color', '#fff' );

		$st_footer_bg_color_t = get_theme_mod( 'st_footer_bg_color_t', '#fff' );
		$st_footer_bg_color = get_theme_mod( 'st_footer_bg_color', '#fff' );
		$st_footer_bg_text_color = get_theme_mod( 'st_footer_bg_text_color', '#000' );

		$menu_st_headerwidget_bgcolor = get_theme_mod( 'st_headerwidget_bgcolor', '#f3f3f3' );
		//任意記事
		$menu_osusumemidasitextcolor = get_theme_mod( 'st_menu_osusumemidasitextcolor', '#fff' );
		$menu_osusumemidasicolor = get_theme_mod( 'st_menu_osusumemidasicolor', '#FEB20A' );
		$menu_osusumemidasinocolor = get_theme_mod( 'st_menu_osusumemidasinocolor', '#fff' );
		$menu_osusumemidasinobgcolor = get_theme_mod( 'st_menu_osusumemidasinobgcolor', '#FEB20A' );



		?>

		<style type="text/css">
			/*グループ1
			------------------------------------------------------------*/
			/*ブログタイトル*/

			header .sitename a {
				color: <?php echo $menu_logocolor;
?>;
			}

			/*ヘッダーリンク*/	
			#header-r .footermenust li {
				border-right-color:<?php echo $menu_logocolor;
?>;

			}

			#header-r .footermenust a {
				color: <?php echo $menu_logocolor;
?>;
			}

			/*ページトップ*/
			#page-top a {
				background: <?php echo $menu_sumartcolor;
?>;
			}

			/* メニュー */
			nav li a {
				color: <?php echo $menu_logocolor;
?>;
			}

			/*キャプション */

			header h1 {
				color: <?php echo $menu_logocolor;
?>;
			}

			header .descr {
				color: <?php echo $menu_logocolor;
?>;
			}

			/* アコーディオン */
			#s-navi dt.trigger .op {
				color: <?php echo $menu_sumartcolor;
?>;
			}

			.acordion_tree li a {
				color: <?php echo $menu_logocolor;
?>;
			}

			/* サイド見出し */
			aside h4 {
				color: <?php echo $menu_h4sidetextcolor;
?>;
			}

			/* フッター文字 */
			#footer, #footer .copy, #footer .rcopy, #footer .copy a, #footer .rcopy a {
				color: <?php echo $menu_logocolor;
?>;
			}

			/* スマホメニュー文字 */
			.acordion_tree ul.menu li a, .acordion_tree ul.menu li {
				color: <?php echo $menu_sumartmenutextcolor;
?>;
			}

			.acordion_tree ul.menu li {
				border-bottom:dotted 1px <?php echo $menu_sumartmenutextcolor;
?>;
}


			/*グループ2
			------------------------------------------------------------*/
			/* 中見出し */
			h2 {
				background: <?php echo $menu_bgcolor;
?>;
				color: <?php echo $menu_color;
?>;
			}

			h2:after {
				border-top: 10px solid <?php echo $menu_bgcolor;
?>;
			}

			h2:before {
				border-top: 10px solid <?php echo $menu_bgcolor;
?>;
			}

			/*小見出し*/
			.post h3 {

				color: <?php echo $menu_h3textcolor;
?>;
				border-bottom: 1px <?php echo $menu_h3textcolor;
?> dotted;
				background-color: <?php echo $menu_h3bgcolor;
?>;
			}

			.post h4 {
				background-color: <?php echo $menu_h4bgcolor;
?>;
			}

			/*グループ4
			------------------------------------------------------------*/
			/* RSSボタン */
			.rssbox a {
				background-color: <?php echo $menu_rsscolor;
?>;
			}

			/*お知らせ
			------------------------------------------------------------*/
			/*お知らせバーの背景色*/
			.rss-bar {
				border-color: <?php echo $menu_newsbarcolor;
				
?>;

				color: <?php echo $menu_newsbartextcolor;
?>;

				/*Other Browser*/
				background: <?php echo $menu_newsbarcolor;?>;
				/*For Old WebKit*/
				background: -webkit-linear-gradient(
				<?php echo $menu_newsbarcolor_t;?> 0%,
				<?php echo $menu_newsbarcolor;?> 100%
				);
				/*For Modern Browser*/
				background: linear-gradient(
				<?php echo $menu_newsbarcolor_t;?> 0%,
				<?php echo $menu_newsbarcolor;?> 100%
				);

			
			}

			/*固定ページサイドメニュー
			------------------------------------------------------------*/
			/*背景色*/

			#sidebg {
				background:<?php echo $menu_pagelist_bgcolor;?>;
			}

			#side aside .st-pagelists ul li a {
				color: <?php echo $menu_navbartextcolor;
?>;

				/*Other Browser*/
				background: <?php echo $menu_navbarcolor;?>;
				/*For Old WebKit*/
				background: -webkit-linear-gradient(
				<?php echo $menu_navbarcolor_t;?> 0%,
				<?php echo $menu_navbarcolor;?> 100%
				);
				/*For Modern Browser*/
				background: linear-gradient(
				<?php echo $menu_navbarcolor_t;?> 0%,
				<?php echo $menu_navbarcolor;?> 100%
				);
			}

			#side aside .st-pagelists .children a {
				border-bottom-color: <?php echo $menu_pagelist_childtextcolor;		
?>;
				color: <?php echo $menu_pagelist_childtextcolor;
?>;
			}

			#side aside .st-pagelists .children li .children a,
			#side aside .st-pagelists .children li .children .children li a {
			color: <?php echo $menu_pagelist_childtextcolor;
?>;
			}


			/*追加カラー
			------------------------------------------------------------*/
			/*ヘッダー線*/
			#wrapper{
				border-top:solid 3px <?php echo $st_header_border_color;
?>!important;
			}

			/*ヘッダー*/
			#headbox {
				padding:0px 15px 0px;
				margin: 0px -15px 0;

				/*Other Browser*/
				background: <?php echo $st_headerbox_bg_color;?>;
				/*For Old WebKit*/
				background: -webkit-linear-gradient(
				<?php echo $st_headerbox_bg_color_t;?> 0%,
				<?php echo $st_headerbox_bg_color;?> 100%
				);
				/*For Modern Browser*/
				background: linear-gradient(
				<?php echo $st_headerbox_bg_color_t;?> 0%,
				<?php echo $st_headerbox_bg_color;?> 100%
				);
			}

			/*フッター*/
			footer {

				margin: 0 -15px;

				/*Other Browser*/
				background: <?php echo $st_footer_bg_color;?>;
				/*For Old WebKit*/
				background: -webkit-linear-gradient(
				<?php echo $st_footer_bg_color_t;?> 0%,
				<?php echo $st_footer_bg_color;?> 100%
				);
				/*For Modern Browser*/
				background: linear-gradient(
				<?php echo $st_footer_bg_color_t;?> 0%,
				<?php echo $st_footer_bg_color;?> 100%
				);
			}

			footer,footer p,footer a{
				color:<?php echo $st_footer_bg_text_color;
?>!important;
			}

			footer .footermenust li {
				border-right-color: <?php echo $st_footer_bg_text_color;
?>!important;
			}

			/*任意の人気記事
			------------------------------------------------------------*/

			.post h4.p-entry {
				background:<?php echo $menu_osusumemidasicolor;
?>;
				color:<?php echo $menu_osusumemidasitextcolor;
?>;
			}

			.poprank-no2{
				background:<?php echo $menu_osusumemidasinobgcolor;
?>;
				color:<?php echo $menu_osusumemidasinocolor;
?>!important;
			}

			/*スクロール用*/
			#side h4.p-entry {
				color:<?php echo $menu_h4sidetextcolor;
?>;
			}

			.poprank-no{
				background:<?php echo $menu_osusumemidasinobgcolor;
?>;
				color:<?php echo $menu_osusumemidasinocolor;
?>!important;
			}


			/*media Queries タブレットサイズ
			----------------------------------------------------*/
			@media only screen and (min-width: 414px) {

				/*追加カラー
				------------------------------------------------------------*/
				/*フッター*/
				footer{
					margin:0 -20px;
				}
				/*ヘッダー*/
				#headbox {
					padding:10px 20px 0px;
					margin: 0px -20px 0;
				}
			}

			/*media Queries PCサイズ
			----------------------------------------------------*/
			@media only screen and (min-width: 781px) {
				nav.smanone {
					border-color: <?php echo $menu_navbarcolor;
?>;

					/*Other Browser*/
					background: <?php echo $menu_navbarcolor;?>;
					/*For Old WebKit*/
					background: -webkit-linear-gradient(
					<?php echo $menu_navbarcolor_t;?> 0%,
					<?php echo $menu_navbarcolor;?> 100%
					);
					/*For Modern Browser*/
					background: linear-gradient(
					<?php echo $menu_navbarcolor_t;?> 0%,
					<?php echo $menu_navbarcolor;?> 100%
					);
				
				}

				header ul.menu li {
					border-right-color: <?php echo $menu_navbarcolor;
?>;
				}

				header ul.menu li a {
					color: <?php echo $menu_navbartextcolor;
?>;

				}

				header ul.menu li li a{
					background: <?php echo $menu_navbar_undercolor;
?>;
					border-top-color: <?php echo $menu_navbarcolor;
?>;

				}

				header .textwidget{
					background:<?php echo $menu_st_headerwidget_bgcolor;
?>;
				}

				/*追加カラー
				------------------------------------------------------------*/
				/*ヘッダー*/
				#headbox {
					padding:5px 30px 0px;
					margin: 0px -30px 0;
				}

				/*フッター*/
				footer{
					margin:0 -30px;
				}


			}
		</style>

		<?php
	}

	add_action( 'wp_head', 'st_customize_css' );
}
