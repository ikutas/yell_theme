<?php

// 直接アクセスを禁止
if ( !defined( 'ABSPATH' ) ) {
     exit;
}

if ( isset($GLOBALS['stdata50']) && $GLOBALS['stdata50'] === 'yes' ) {
	get_template_part( 'st-header-nowidemenu' ); //メニューはワイドにしない
} else {
	get_template_part( 'st-header-widemenu' ); //メニューもワイドにする
}