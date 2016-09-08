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
