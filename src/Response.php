<?php

namespace JadLog;

class Response {
	public $time;
	public $price;
	public $serviceName;

	public function __construct(Object $response) {
		$this->time = $response->prazo_estimado;
		$this->price = $response->valor_frete;
		$this->serviceName = $response->servico_nome;
	}

	public function getPrice() : float {
		return round($this->price, 2);
	}

	public function getServiceName() : string {
		return $this->serviceName;
	}

	public function getTime() : int {
		return $this->time;
	}
}