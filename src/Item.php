<?php

namespace JadLog;

class Item {
	protected $sku;
	protected $width;
	protected $price;
	protected $agroup;
	protected $length;
	protected $height;
	protected $weigth;
	protected $amount;

	public function __construct(array $options) {
		$this->sku = $options['sku'];
		$this->width = $options['width'];
		$this->price = $options['price'];
		$this->height = $options['height'];
		$this->length = $options['length'];
		$this->weigth = $options['weigth'];
		$this->amount = $options['amount'];
		$this->agroup = 'true';
	}

	public function toArray() : array {
		return [
			'sku' => $this->sku,
			'quantidade' => $this->amount,
			'valor' => $this->price,
			'altura' => $this->height,
			'comprimento' => $this->length,
			'largura' => $this->width,
			'peso' => $this->weigth,
			'agrupar' => $this->agroup
		];
	}
}