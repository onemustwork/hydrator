# Hydrator
Simple to use hydrator to hydrate an object from array or extract a object to an array.

## Usage
To install the hydrator use the following command;
```
composer require onemustwork/hydrator
```

### Hydrating
To hydrate a object you can use the hydrate method;
```php
$object = new Object(); // The object to hydrate
$data = ['some_field' => 'some_value', 'boolean_field' => true];
$object = $hydrator->hydrate($object, $data);
```

### Extracting
To extract an entity to a array you can use the extract method;
```php
$array = $hydrator->extract($object);
```

### Todo
- Add strategies
- Add unit tests