# clearip.io PHP client

php client library for clear ip

## Installation

```bash
composer require clearip
```

## usage

Get ip info:

```php

<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Clearip\Client;

$clearip = new Client('API Key Here');

try {

    var_dump($clearip->IPInfoApi->GetAllDataByIP('IP Here'));

} catch (Exception $e) {
    echo $e->getMessage();
}


```

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)
