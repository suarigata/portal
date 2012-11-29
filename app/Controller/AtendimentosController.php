<?php
class AtendimentosController extends AppController{

	public function index(){
		//$this->set('ticket', $this->Atendimento->createTicket('12337215180', 'blablabla', 1));
		//$this->set('cod', $this->Atendimento->getTicketByCod(190));
		//$this->set('cpf', $this->Atendimento->getTicketByCpf('12337215180'));
		$this->set('resposta', $this->Atendimento->respond(189, 'uiui'));
		//$this->set('consulta', $this->Entrega->consultarEntrega(1));
	}
	
	public function seleciona(){
		$inverso = array(1=>'Sugestão', 2=>'Dúvida', 3=>'Reclamação', 4=>'Pedido');
		$this->set('tipoChamada', $inverso);
		if (!empty($this->data)) {
			$cliente = CakeSession::read('cliente');
			$pedido = $this->data['Ticket'];
			$texto = $pedido['texto'];
			$tipo = $pedido['tipo'];
			$ticket = $this->Atendimento->createTicket($cliente['cpf'], $texto, $tipo);
			$this->Session->setFlash('Seu ticket foi criado com sucesso');
			$this->redirect(array('controller' => 'clientes','action' => 'dadosCliente'));
		}					
	}
	
	public function consulta(){
		$cliente = CakeSession::read('cliente');
		$ids = $this->Atendimento->getTicketByCpf($cliente['cpf']);
		if($ids['Erro'] == null){
			$ticket = array();
			$ids = explode('|' , $ids['CodigoAcompanhamento']);
			$this->set('ids',$ids);
			foreach($ids as $id){
				$ticket[$id] = $this->Atendimento->getTicketByCod($id);
				$x = $ticket[$id];
				$x['Texto'] = explode('|', $x['Texto']);
				$x['Data'] = explode('|', $x['Data']);
				$ticket[$id]=$x;
			}
			$this->set('ticket', $ticket);
		}
		else $this->Session->setFlash('ERRO');
	}
	
	public function respondeTicket($id){
		$this->set('id', $id);
		if (!empty($this->data)) {
			$texto = $this->data['Resposta']['texto'];
			$resposta = $this->Atendimento->respond($id,$texto);
			$this->Session->setFlash('Sua Resposta foi enviada');
			$this->redirect(array('action' => 'consulta'));
		}
	}
}
?>