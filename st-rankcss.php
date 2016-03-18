<?php
header('Content-Type: text/css; charset=utf-8');
include_once(dirname( __FILE__ ) . '/../../../wp-load.php');

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
?>

@charset "UTF-8";
/*----------------------------------
ランク
-----------------------------------*/

.rankst-wrap {
	background-color: #ffffe0;
	padding: 10px;
	margin-bottom: 10px;
}

.rankst {
	margin-bottom: 10px;
	overflow: hidden;
}

.rankst p {
	margin-bottom: 5px;
	overflow: hidden;
}

.rankst-cont blockquote {
	background-color: transparent;
	background-image: none;
	padding:0px;
	margin-top: 0px;
	border: none;
}

.rankst-cont {
	margin: 0px;
}

.rankst-contb {
	margin-bottom:10px;
}

.rankst-l {
	text-align:center;
}

.rankstlink-l {
	width: 100%;
	text-align: center;
}

.rankstlink-r {
	float: right;
	width: 100%;
}

/*スター*/

.st-star {
	color:#FFB400;
}

/*詳細ページへのリンクボタン*/
.rankstlink-l p a {
	display: block;
	width: 90%;
	text-align: center;
	padding: 10px;
	background: <?php echo sanitize_hex_color($GLOBALS['stcssdata3']); ?>;
	color: <?php echo sanitize_hex_color($GLOBALS['stcssdata1']); ?>;
	text-decoration: none;
	margin-right: auto;
	margin-left: auto;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	font-weight:bold;
}

.rankstlink-l p a:hover {
	-moz-opacity: 0.8;
	opacity: 0.8;
}

.rankstlink-b p a {
	display: block;
	width: 90%;
	text-align: center;
	padding: 10px;
	background-color: #09C;
	color: <?php echo sanitize_hex_color($GLOBALS['stcssdata1']); ?>;
	text-decoration: none;
	margin-right: auto;
	margin-left: auto;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	font-weight:bold;
}

.rankstlink-b p a:hover {
	-moz-opacity: 0.8;
	opacity: 0.8;
}

/*アフィリエイトのリンクボタン*/
.rankstlink-r p a {
	display: block;
	width: 90%;
	text-align: center;
	padding: 10px;
	background-color: <?php echo sanitize_hex_color($GLOBALS['stcssdata2']); ?>;
	color: <?php echo sanitize_hex_color($GLOBALS['stcssdata1']); ?>;
	text-decoration: none;
	margin-right: auto;
	margin-left: auto;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	font-weight:bold;
}

.rankstlink-r p a:hover {
	-moz-opacity: 0.8;
	opacity: 0.8;
}

.rankstlink-a p a {
	display: block;
	width: 90%;
	text-align: center;
	padding: 10px;
	background-color: <?php echo sanitize_hex_color($GLOBALS['stcssdata2']); ?>;
	color: <?php echo sanitize_hex_color($GLOBALS['stcssdata1']); ?>;
	text-decoration: none;
	margin-right: auto;
	margin-left: auto;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	font-weight:bold;
}

.rankstlink-a p a:hover {
	-moz-opacity: 0.8;
	opacity: 0.8;
}


.rankst-box .clearfix.rankst .rankst-l a img, .rankst-box .clearfix.rankst .rankst-l iframe {
	padding: 5px;
	padding-bottom: 10px;
	max-width:100%;
	box-sizing: border-box;
	margin:0 auto;
}

.rankst-cont p, .rankst-cont,.rankst-contb p, .rankst-contb {
	font-size: 16px;
	line-height: 25px;
}

.rankst-cont ul, .rankst-cont ol{
	padding:10px 20px;
	margin-bottom:10px;
}

.post .rankst-cont li {
	font-size: 16px;
	line-height: 25px;
}
.rankst-cont li {
	font-size: 16px;
	line-height: 25px;
}
.rankh4, .post .rankh4, #side .rankh4 {
	background-repeat: no-repeat;
	background-position: left center;
	padding-top: 20px;
	padding-right: 20px;
	padding-bottom: 10px;
	padding-left: 80px;
	background-image: url(images/oukan.png);
	margin-bottom: 10px;
	border-bottom-width: 1px;
	border-bottom-style: dotted;
	border-bottom-color: #ABA732;
	background-color : transparent ;
	color:#000;
}

/* 中見出し */
.rankh3 {
	position: relative;
	background: <?php echo sanitize_hex_color($GLOBALS['stcssdata4']); ?>!important;
	color: <?php echo sanitize_hex_color($GLOBALS['stcssdata5']); ?>!important;
	font-size: 20px;
	line-height: 27px;
	margin-bottom: 20px;
	padding: 10px 20px!important;
	border-bottom:none!important;
}

.rankh3:after {
	content: '';
	position: absolute;
	border-top: 10px solid <?php echo sanitize_hex_color($GLOBALS['stcssdata4']); ?>;
	border-right: 10px solid transparent;
	border-left: 10px solid transparent;
	bottom: -10px;
	left: 30px;
	border-radius: 2px;
}

.rankh3:before {
	content: '';
	position: absolute;
	border-top: 10px solid <?php echo sanitize_hex_color($GLOBALS['stcssdata4']); ?>;
	border-right: 10px solid transparent;
	border-left: 10px solid transparent;
	bottom: -10px;
	left: 30px;
}
/*-------------------------------------
旧バージョン

.rankh3{
	position:relative;
	padding:20px;
	text-align:center;
	background:<?php echo sanitize_hex_color($GLOBALS['stcssdata4']); ?>;
	box-shadow:
		10px 0 0 0 <?php echo sanitize_hex_color($GLOBALS['stcssdata4']); ?>,
		-10px 0 0 0 <?php echo sanitize_hex_color($GLOBALS['stcssdata4']); ?>,
		0 3px 3px 0 rgba(0,0,0,0.1);
	color:<?php echo sanitize_hex_color($GLOBALS['stcssdata5']); ?>!important;
	margin-bottom:10px;
	border:none!important;
}

.rankh3:before{
	content:" ";
	position:absolute;
	top:100%;
	left:-10px;
	width:0;
	height:0;
	border-width:0 10px 10px 0;
	border-style:solid;
	border-color:transparent;
	border-right-color:#1a1a1a;
}

.rankst-cont h3 {
	font-size: 16px;
	line-height: 20px;
	margin-bottom:10px;
	border:none;
}
-------------------------------------*/
.post .rankst-cont h4 , .rankst-cont h4 {
background-color:#FCFC88;
padding:10px;
margin-bottom:10px;
}

/*サイドバー*/
#side .rankst-ls img {
	max-width: 100% !important;
	margin:0 auto;
}

#side .rankst-ls {
	text-align:center;
}

/*media Queries タブレットサイズ
----------------------------------------------------*/
@media only screen and (max-width: 780px) {
	#side aside {
	}
}

/*media Queries タブレットサイズ
----------------------------------------------------*/
@media only screen and (min-width: 414px) {
	.rankst-box .clearfix.rankst .rankst-l a img {
		float: left;
		padding-top: 5px;
		padding-left: 0px;
		padding-bottom: 10px;
		padding-right: 0px;
	}

	.rankst-cont {
		margin: 0 0 0 165px;
	}

	.rankst-r {
		position:relative;
		z-index:1;
		float: right;
		width: 100%;
		margin: 0 0 0 -150px;
	}

	.rankst-l {
		position:relative;
		z-index:2;
		float: left;
		width: 150px;
	}

	.rankst-wrap {
		background-color: <?php echo sanitize_hex_color($GLOBALS['stcssdata6']); ?>;
		padding: 20px;
		margin-bottom: 10px;
	}

	.rankst-cont p, .rankst-cont, .rankst-contb p, .rankst-contb {
		font-size: 14px;
		line-height: 27px;
	}

	.post .rankst-cont li {
		font-size: 14px;
		line-height: 27px;
	}

	.rankst-wrap li , .rankst-wrap li, .rankst-cont li, .rankst-cont li {
		font-size: 14px;
		line-height: 27px;
	}
	/*-- ここまで --*/
}

/*media Queries PCサイズ
----------------------------------------------------*/
@media only screen and (min-width: 781px) {
	.rankstlink-l {
		float: left;
		width: 50%;
	}

	.rankstlink-r {
		float: right;
		width: 50%;
	}
	/*----------------------------------
	ランク-1カラム
	-----------------------------------*/
	.colum1 .rankst-r {
		float: right;
		width: 100%;
		margin: 0 0 0 -320px;
	}

	.colum1 .rankst-r p, .colum1 .rankst-cont {
		font-size: 14px;
		line-height: 27px;
		margin-bottom: 20px;
	}

	.colum1 .rankst-l {
		float: left;
		width: 300px;
	}

	.colum1 .rankst-cont {
		margin: 0 0 0 320px;
	}

	.colum1 .rankst-wrap .rankst-cont li , .colum1 .rankst-cont li{
		font-size: 14px;
		line-height: 27px;
	}
	/*-- ここまで --*/
}
