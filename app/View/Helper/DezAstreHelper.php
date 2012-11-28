<?php
class DezAstreHelper extends AppHelper{
	
	var $helpers = array('Html','Form');
	
	public function quantidade($codigo,$quantidade){
		
		$componente='<div class="quantDiv">';
		$componente.=$this->Form->button('-',array('type' => 'button','onClick' => 'javascript:alert("ola");'));
		$componente.='<input class="quantText" type="text" name="'.$codigo.'" value="'.$quantidade.'" readonly="readonly" />';
		$componente.='<input type="button" onClick="javascript:alert(\''.$codigo.'\');" value="+" />';
		$componente.='</div>';
		
		return $componente;
	}
}
?>