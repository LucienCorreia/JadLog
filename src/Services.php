<?php

namespace JadLog;

/**
 * @author Lucien
 * @link https://github.com/LucienCorreia/JadLog GitHub
 */
use GuzzleHttp\Client;

class Services extends JadLog {

	/**
	 * @var string URL da API
	 */
	private $apiUrl = 'http://api.getmodal.com.br/v1/cotacao/consultar';

	/**
	 * @var array Itens da entrega
	 */
	private $items;

	/**
	 * @var array Serviços para consulta
	 */
	private $services;

	/**
	 * @var string Cep de origem
	 */
	private $cepSource;

	/**
	 * @var string Cep de destino
	 */
	private $cepDestiny;

	/**
	 * Seta os parametros
	 */
	public function __construct() {
		parent::__construct();
		$this->cepSource = config('jadlog.cep_source');
	}

	/**
	 * Seta os serviços
	 * 
	 * @param array $services
	 * @return Services
	 */
	public function setServices(array $services) : Services {
		$this->services = collect($services);

		return $this;
	}

	/**
	 * Seta o cep de origem
	 * 
	 * @param string $cep
	 * @return Services
	 */
	public function setCepSource($cep) : Services {
		$this->cepSource = $cep;

		return $this;
	}

	/**
	 * Seta o cep de destino
	 * 
	 * @param string $cep
	 * @return Services
	 */
	public function setCepDestiny($cep) : Services {
		$this->cepDestiny = $cep;

		return $this;
	}

	/**
	 * Seta os itens para entrega
	 * 
	 * @param array $items
	 * @return Services
	 */
	public function setItems(array $items) : Services {
		foreach($items as $k => $v) {
			$item = new Item($v);
			$this->items[] = $item->toArray();
		}

		return $this;
	}

	/**
	 * Efetua e retorna o resultado da consulta
	 * 
	 * @return array
	 */
	public function get() {
		$client = new Client();

		try {
            $response = $client->post($this->apiUrl,
                [
                    'headers' => [
						'Content-Type' => 'application/json',
						'GMKEY' => parent::$gmkey,
						'GMTOKEN' => parent::$gmtoken
                    ],
                    'json' => [
                        'transportadora_codigos_servicos' => !blank($this->services) ? $this->services->implode(',') : '',
                        'cep_origem' => $this->cepSource,
						'cep_destino' => $this->cepDestiny,
						'volumes' => $this->items
                    ],
				]);

			$return = [];

			foreach (json_decode($response->getBody()->getContents())->resposta as $k => $v) {
				$return[] = new Response($v->calculos[0]);
			}

            return $return;
        } catch (Exception $e) {
            return $e->getMessage();
        }
	}
}