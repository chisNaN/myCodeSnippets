# Calculate your age in JavaScript

### function

```js
// retrieving a date range by year

function dateRangeYear(start, end = new Date().toJSON().substr(0, 10)) {
  const dStart = +new Date(start);
  const dEnd = +new Date(end);
  return ~~((dEnd - dStart) / (31557600000));
 }
 ```

### Usage

`console.log(dateRangeYear('1985-10-05'));`
