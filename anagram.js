function anagram(s1, s2) {

  let s1Length = s1.length;
  
  if(s1Length !== s2.length) {
    return false;
  }

  while(s1Length--) {

    if(!~s2.indexOf(s1[s1Length])) {
      return false;
    }
  }
  return true;
}
