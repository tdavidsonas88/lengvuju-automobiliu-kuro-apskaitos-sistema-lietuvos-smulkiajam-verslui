<?php

/* /app/View/Helper/LinkHelper.php */
App::uses('AppHelper', 'View/Helper');

class TranslationHelper extends AppHelper {
    public function t($word){
		include('lang.php');
		$default = ($_GET['lang'] == '') ? 'lt' : $_GET['lang'];
		return $lang[$default][$word];
    }
}
?>
