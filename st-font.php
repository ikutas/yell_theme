<?php
	if ( isset($GLOBALS['stdata49']) && $GLOBALS['stdata49'] === 'no' ) {

	} elseif ( isset($GLOBALS['stdata49']) && $GLOBALS['stdata49'] === 'josefin' ) {
		echo "<link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>";
	} else {
		echo "<link href='https://fonts.googleapis.com/css?family=PT+Sans+Caption' rel='stylesheet' type='text/css'>";
	}