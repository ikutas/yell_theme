<?php 
if ( isset($GLOBALS['stdata36']) && $GLOBALS['stdata36'] === 'yes' ) {
}else{
?>
<h4 class="point"><i class="fa fa-th-list"></i>&nbsp; 関連記事</h4>
<?php
		if ( isset($GLOBALS['stdata5']) && $GLOBALS['stdata5'] === 'yes' ) {
			get_template_part( 'kanren-thumbnail-off' ); 
		}else{
			get_template_part( 'kanren-thumbnai-on' ); 
		}
}
?>