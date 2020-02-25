<?php

namespace JadLog;

/**
 * @author Lucien
 * @link https://github.com/LucienCorreia/JadLog GitHub
 */
class Response {

	/**
	 * @var int Prazo de entrega em dias
	 */
	public $time;

	/**
	 * @var float Preço do frete
	 */
	public $price;

	/**
	 * @var string Nome do serviço
	 */
	public $serviceName;

	/**
	 * Seta os atributos
	 * 
	 * @param Object $response
	 */
	public function __construct($response) {
		$this->time = $response->prazo_estimado;
		$this->price = $response->valor_frete;
		$this->serviceName = $response->servico_nome;
	}

	/**
	 * Retorna o preco
	 * 
	 * @return float
	 */
	public function getPrice() : float {
		return round($this->price, 2);
	}

	/**
	 * Retorna o nome do serviço
	 * 
	 * @return string
	 */
	public function getServiceName() : string {
		return $this->serviceName;
	}

	/**
	 * Retorna o prazo de entrega em dias
	 * 
	 * @return int
	 */
	public function getTime() :? int {
		return $this->time;
	}
}
