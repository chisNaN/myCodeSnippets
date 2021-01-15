# [List currencies from **FIXER API**](http://api.fixer.io/latest)

>Copy paste this function in the Google script editor (corresponding to your active spreadsheet)

```js
function convertFromEuro(currency) {
    // Make a GET request and log the returned content.
    var r = UrlFetchApp.fetch('http://api.fixer.io/latest');
    var data = JSON.parse(r.getContentText());
    //Logger.log(data.rates[currency]);
    return data.rates[currency].toFixed(2);
}
```
:bulb: Use it in a cell spreadsheet

=convertFromEuro("RUB")

In a JavaScript vanilla style

```js
const convertFromEuro = currency => fetch('https://api.fixer.io/latest').then(r => r.json()).then(r => console.log(r.rates[currency]));
```
