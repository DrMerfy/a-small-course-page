
/**
 * Sents the login request to the server.
 */
function requestLogin() {
  const email = document.getElementsByName('email')[0].value;
  const pass = document.getElementsByName('password')[0].value;

  const ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log('Response', this.responseText);
    }
  };

  ajax.open('POST', '../server/login.php', true);
  ajax.setRequestHeader('Content-Type', 'application/json');
  ajax.send(JSON.stringify({'email': email, 'password': pass}));
}
