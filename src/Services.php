<?php

namespace JadLog;

use Item;

class Services extends JadLog {

	private $apiUrl = 'http://api.getmodal.com.br/v1/cotacao/consultar';

	private $items;
	private $services;
	private $cepSource;
	private $cepDestiny;

	public function __construct() {
		parent::__construct();
	}

	public function setServices(array $services) : Object {
		$this->services = $services;

		return $this;
	}

	public function setCepSource($cep) : Object {
		$this->cepSource = $cep;

		return $this;
	}

	public function setCepDestiny($cep) : Object {
		$this->cepDestiny = $cep;

		return $this;
	}

	public function setItems(array $items) : Object {
		foreach($items as $k => $v) {
			$item = new Item($v);
			$this->items = $item->toArray();
		}

		return $this;
	}

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
                        'transportadora_codigos_servicos' => implode($this->services, ','),
                        'cep_origem' => $this->cepSource,
						'cep_destino' => $this->cepDestiny,
						'volumes' => $this->items
                    ],
                ]);

            return json_decode($response->getBody());
        } catch (Exception $e) {
            return $e->getMessage();
        }
	}

}