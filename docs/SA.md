## SA STANDARD

### `No empty line between @return and @throws phpdoc`

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

### `One empty line between last @param and @return phpdoc`

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
