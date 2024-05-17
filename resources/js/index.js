const getStringsDifference = (str1, str2) => {
  const lines1 = str1.split('\n');
  const lines2 = str2.split('\n');

  let i = 0;
  let j = 0;
  const result = [];

  while (i < lines1.length || j < lines2.length) {
    if (i < lines1.length && j < lines2.length && lines1[i] === lines2[j]) {
      // Same line in both strings
      result.push(`<span style="color: grey">${lines1[i]}</span>`);
      i++;
      j++;
    } else {
      if (i < lines1.length) {
        // Line removed
        result.push(`<span style="color: red">${lines1[i]}</span>`);
        i++;
      }
      if (j < lines2.length) {
        // Line added
        result.push(`<span style="color: green">${lines2[j]}</span>`);
        j++;
      }
    }
  }

  return result.join('<br>');
};

window.getStringsDifference = getStringsDifference;
