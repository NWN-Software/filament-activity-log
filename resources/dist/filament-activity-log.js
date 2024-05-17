var g=(i,r)=>{let s=i.split(`
`),t=r.split(`
`),e=0,n=0,l=[];for(;e<s.length||n<t.length;)e<s.length&&n<t.length&&s[e]===t[n]?(l.push(`<span style="color: grey">${s[e]}</span>`),e++,n++):(e<s.length&&(l.push(`<span style="color: red">${s[e]}</span>`),e++),n<t.length&&(l.push(`<span style="color: green">${t[n]}</span>`),n++));return l.join("<br>")};window.getStringsDifference=g;
