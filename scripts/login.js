const style = getComputedStyle(document.body);

/**
 *
 * @param {*} event
 */
function checkForEnter(event) {
  // 13 == 'Enter'
  if (event.keyCode === 13) {
    requestLogin();
  }
}

/**
 * Sents the login request to the server.
 */
function requestLogin() {
  clearWarnings();
  const email = document.getElementsByName('email')[0].value;
  const pass = document.getElementsByName('password')[0].value;

  const ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const response = JSON.parse(this.responseText);
      // Check status
      if (response['login'] === 'fail') {
        if (response['error'] === 'email unknown') {
          showWrongEmail();
        } else if (response['error'] === 'passwords no match') {
          showWrongPass();
        }
      } else if (response['login'] === 'success') {
        // Redirect to the main page
        window.location = './pages/start.php';
      }
    }
  };

  ajax.open('POST', '../server/login.php', true);
  ajax.setRequestHeader('Content-Type', 'application/json');
  ajax.send(JSON.stringify({'email': email, 'password': pass}));
}

/**
 * Modifies the DOM to display that there is
 * something wrong with the mail given.
 */
function showWrongEmail() {
  const email = document.getElementsByName('email')[0];
  const error_message = document.getElementById('error_message');

  email.style.borderColor = style.getPropertyValue('--color-error');
  error_message.innerHTML = 'This email is not registered.';
}

/**
 * Modifies the DOM to display that there is
 * something wrong with the password given.
 */
function showWrongPass() {
  const password = document.getElementsByName('password')[0];
  const error_message = document.getElementById('error_message');

  password.style.borderColor = style.getPropertyValue('--color-error');
  error_message.innerHTML = 'Wrong password.';
}

/**
 *
 */
function clearWarnings() {
  const email = document.getElementsByName('email')[0];
  const password = document.getElementsByName('password')[0];
  const error_message = document.getElementById('error_message');

  email.style.borderColor = 'white';
  password.style.borderColor = 'white';
  error_message.innerHTML = '';
}
