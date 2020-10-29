# JadLog - Laravel 5

Instale o pacote pelo composer

``` composer require multiplier/jad-log ```

Rode vendor:publish e selecione o número corespondente

``` php artisan vendor:publish ```

insira seu acesso em config/jadlog.php

```php
<?php
return [
	'gmkey' => env('GMKEY', 'GMKEY'),
	'gmtoken' => env('GMTOKEN', 'GMTOKEN'),
	'cep_source' => ''
];
```

### Consultando

```php

use JadLog\Services;

...

$items = [
  [
    'price' => 10.00,
    'height' => 5,
    'width' => 5,
    'length' => 5,
    'weigth' => 0.5,
    'amount' => 1,
    'sku' => 'ABC',
  ]
];

$jadLog = new Services;

$result = [];

$responseJadLog = $jadLog->setCepDestiny('12345-678')
                ->setItems($items)
                ->get();

foreach($responseJadLog as $item) {
  $result[] = [
      'prazo' => $v->getTime(),
      'preco' => $v->getPrice(),
      'servico' => $v->getServiceName()
  ];
}


```
