#[List currencies from **FIXER API**](http://api.fixer.io/latest)

>Copy paste this function in the Google spreadsheet script editor (corresponding to your active spreadsheet)

```js
function convertFromEuro(currency) {
    // Make a GET request and log the returned content.
    var r = UrlFetchApp.fetch('http://api.fixer.io/latest');
    var data = JSON.parse(r.getContentText());
    //Logger.log(~~data.rates.[currency]);
    return ~~data.rates[currency];
}
```
:bulb: Use it in a cell spreadsheet

=convertFromEuro("RUB")
