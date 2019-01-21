/**
 *
 * @param {*} name
 * @return {*}
 */
function getCookie(name) {
    cookies = decodeURIComponent(document.cookie).split(';');
    for (c of cookies) {
      const searchVal = name+'=';
      // Trim
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
  
      if (c.indexOf(searchVal) == 0) {
        return c.substring(searchVal.length, c.length);
      }
    }
    return '';
  }