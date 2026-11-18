/* Compute SHA1 hash of text in a specific cell
=GetSHA1(A1)
Open Tools > Script Editor then paste the following code:
*/
function GetSHA1(input) {
  var rawHash = Utilities.computeDigest(Utilities.DigestAlgorithm.SHA_1, input);
  var txtHash = '';
  for (j = 0; j <rawHash.length; j++) {
    var hashVal = rawHash[j];
    if (hashVal < 0)
      hashVal += 256; 
    if (hashVal.toString(16).length == 1)
     txtHash += "0";
    txtHash += hashVal.toString(16);
    }
  //Logger.log(txtHash);
  return txtHash;
}
