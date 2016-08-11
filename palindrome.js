function palindrome(palindrome) {
  
  let lengthPal = palindrome.length;
  
  if(lengthPal === 1) {
    return true;
  }

  let leftToRight = '';
  let rightToLeft = '';
  let i = 0;
  
  while(lengthPal--) {
    leftToRight += palindrome[lengthPal];
    rightToLeft += palindrome[i];
    i++;
  }

  return rightToLeft.toLowerCase() === leftToRight.toLowerCase();
}

function palindromeShort (str) {
  let s1 = Array.from(str).join('').toLowerCase();
  let s2 = Array.from(str).reverse().join('').toLowerCase();
  
  return s1 === s2;
}
