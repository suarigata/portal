<?php
class Atendimento extends AppModel{
	
	public function getTicketByCod($id){
		$client = new nusoap_client("http://mpsolucoesweb.com.br/atendimento-cliente/ConsultarTicketServico.php");
		$result = $client->call("ConsultarTicket", array("CodigoAcompanhamento" => $id));
		return $result;
	}
	
	public function getTicketByCpf($cpf){
		$client = new nusoap_client("http://mpsolucoesweb.com.br/atendimento-cliente/ConsultarTicketCPFServico.php");
		$result = $client->call("ConsultarTicketCPF", array("CPF" => $cpf, "Grupo" => 10));
		return $result;
	}
	
	public function createTicket($cpf, $texto, $tipoChamado){
		$client = new nusoap_client("http://mpsolucoesweb.com.br/atendimento-cliente/CriarTicketServico.php");
		$result = $client->call("CriarTicket", array("CPF" => $cpf, "Texto" => $texto, "TipoChamado" => $tipoChamado, "Grupo" => 10));
		return $result;
	}
	
	public function respond($id, $texto){
		$client = new nusoap_client("http://mpsolucoesweb.com.br/atendimento-cliente/ResponderTicketServico.php");
		$result = $client->call("ResponderTicket", array("CodigoAcompanhamento" => $id, "Texto" => $texto));
		return $result;
	}
}
?>