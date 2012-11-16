<?php
class EntregasController extends AppController{
	
	public function index(){
		//$this->set('prazo', $this->Entrega->calculaCusto(14526738, 1,));
		$this->set('trans', $this->Entrega->listaTransportadoras());
		//$this->set('nova', $this->Entrega->novaEntrega(14526738, 1, ));
		$this->set('cancela', $this->Entrega->cancelarEntrega('1'));
		$this->set('consulta', $this->Entrega->consultarEntrega('1'));
	}
}
?>