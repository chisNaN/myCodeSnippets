const bin = (haystack, searched, start = 0, end = haystack.length) => {
  console.log(start, end);
  if (start >= end) return -1
  let median = ~~((start + end) / 2)
  if(searched === haystack[median]) {
    return median
  } else if (searched < haystack[median]) {
    console.log('lower');
    return bin(haystack, searched, start, median - 1)
  } else {
    console.log('higher');
    return bin(haystack, searched, median + 1, end)
  }
}

const output = bin([...'abcdefghijklmnop'], '')
console.log(output);
