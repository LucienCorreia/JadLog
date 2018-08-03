<?php

namespace JadLog;

class Item {
	protected $sku;
	protected $price;
	protected $width;
	protected $agroup;
	protected $length;
	protected $height;
	protected $weigth;
	protected $amount;

	public function __construct(array $options) {
		$this->sku = $options['sku'];
		$this->price = $options['price'];
		$this->width = $options['width'];
		$this->agroup = $options['agroup'];
		$this->length = $options['length'];
		$this->weigth = $options['weight'];
		$this->amount = $options['amount'];
	}

	public function toArray() : array {
		return (array) $this;
	}
}