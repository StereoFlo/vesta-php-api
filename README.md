# Vesta php api

Вторая версия клиента для api панели управления VestaCP

## Использование

#### Сначала необходимо сформировать хэш

```bash

sudo /usr/local/vesta/bin/v-generate-api-key

```

#### Выполнение запроса

В ответе всегда возвращается массив

```php
$client = new \VestaApi\Client\CurlClient();
$credentials = new \VestaApi\Credentials('server.com', '8083', 'hash');
$vesta = new \VestaApi\Vesta();
$res = $vesta->setClient($client)
    ->setCredentials($credentials)
    ->setCommand(new \VestaApi\Commands\ListUserAccount('admin'))
    ->get();

```

#### Структура комнды

В обязательном порядке объект команды должен содержать самы команду в свойстве command, например:

```php
protected $command = 'v-list-user';
```

Далее вы можете указать формат ответа. Это может быть формат Json или код операции, у случае успешного/ошбычного выполнения.

```php
protected $format = 'json';
```
или

```php
protected $returnCode = 'yes';
```

Далее идут аргументы команды, например имя пользователя для которого по которому необходимо получить информацию.

```php
private $username;
```

Метод toArray, должен возвращать родительский метод с перечислением ваших аргументов в массиве.