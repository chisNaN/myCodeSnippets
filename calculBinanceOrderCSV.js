function myFunction() {
  const ss = SpreadsheetApp.getActiveSpreadsheet();
  const sheet = ss.getSheets()[0];
  const sideOrder = sheet.getRange(2, 5, sheet.getLastRow() - 1);
  const amountTraded = sheet.getRange(2, 11, sheet.getLastRow() - 1);
  const status = sheet.getRange(2, 12, sheet.getLastRow() - 1);
  const amountTradedValues = amountTraded.getValues();
  const statusValues = status.getValues()
  const sideOrderValues = sideOrder.getValues();
  let max =statusValues.length
  const buys = {}
  const sells = {}
  
  while(max--) {
    if (statusValues[max][0] === 'FILLED') {
      if (sideOrderValues[max][0] === 'BUY') {
        const amount = amountTradedValues[max][0]
        const tickerSymbol = amount.substr(amount.lastIndexOf('.') + 11)
        const amountNumericFormat = +amount.substr(0, amount.lastIndexOf('.') + 11).replaceAll(',','')
        Object.assign(buys, { [tickerSymbol]: buys[tickerSymbol]  ? buys[tickerSymbol] + amountNumericFormat: amountNumericFormat })
      } else {
        const amount = amountTradedValues[max][0]
        const tickerSymbol = amount.substr(amount.lastIndexOf('.') + 11)
        const amountNumericFormat = +amount.substr(0, amount.lastIndexOf('.') + 11).replaceAll(',','')
        Object.assign(sells, { [tickerSymbol]: sells[tickerSymbol]  ? sells[tickerSymbol] + amountNumericFormat: amountNumericFormat })
      }
    } // end FILLED
  }// end while
  Logger.log('----- BUYS ------')
  Logger.log(JSON.stringify(buys))
  Logger.log('----- SELLS ------')
  Logger.log(JSON.stringify(sells))
  const diff = {}
  for(const [ticker, amount] of Object.entries(buys)) {
    Object.assign(diff, { [ticker]: sells[ticker] ? sells[ticker] - amount : amount})
  }
  Logger.log('------ DIFF ------')
  Logger.log(diff)
} // end function
