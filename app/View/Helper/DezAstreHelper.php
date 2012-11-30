<?php
class DezAstreHelper extends AppHelper{
	
	public $helpers = array('Js','Html','Form');
	
	public function quantidade($codigo,$quantidade){
		
		$componente='<div class="quantDiv">';
		$componente.=$this->Form->button('-',array('type' => 'button','id' => $codigo.'m'));
		$componente.=$this->Form->input($codigo,array('div' => false,'value' => $quantidade,'readonly' => 'readonly','label' => false));
		$componente.=$this->Form->button('+',array('type' => 'button','id' => $codigo.'p'));
		$componente.='</div>';
		
		$componente.='<script>
				$("#'.$codigo.'m").click(function(){
						quantidade('.$codigo.',-1);
					});
				$("#'.$codigo.'p").click(function(){
						quantidade('.$codigo.',1);
					});
				</script>';
// 		$this->Js->get('#'.$codigo.'m');
// 		$this->Js->event('click', "quantidade($codigo,-1);", array('stop' => false));
// 		$this->Js->get('#'.$codigo.'p');
// 		$this->Js->event('click', "quantidade($codigo,1);", array('stop' => false));
		
		return $componente;
	}
}
?>