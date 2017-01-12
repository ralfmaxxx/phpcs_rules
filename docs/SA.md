## SA STANDARD

### `No empty line between @return and @throws annotation`

Incorrect phpdoc block:
```
/**
 * @return int
 *
 * @throws Exception
 */
```

Correct phpdoc block:
```
/**
 * @return int
 * @throws Exception
 */
```

### `One empty line between last @param and @return annotation`

Incorrect phpdoc block:
```
/**
 * @param int $param
 * @return int
 */
```

Correct phpdoc block:
```
/**
 * @param int $param
 *
 * @return int
 */
```

### `One empty line between last @param and @throws when @return annotation is not present`

Incorrect phpdoc block:
```
/**
 * @param int $param
 * @throws Exception
 */
```

Correct phpdoc block:
```
/**
 * @param int $param
 *
 * @throws Exception
 */
```

### `When array contains more than one line last element should be fallowed by comma`

Incorrect array definition:
```
$a = [
    1,
    2
];

```

Correct array definition:
```
$a = [
    1,
    2
];

```
or:
```
$a = [1,2];

```
or:
or:
```
$a = [1,2,];

```
