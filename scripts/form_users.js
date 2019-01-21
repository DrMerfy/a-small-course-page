const style = getComputedStyle(document.body);
const form = document.getElementsByClassName('modal-form')[0];

let isEdit = false; // Used to specify if the sumbit will edit an existing form
let currentNo = 0;
let previousLocation;

/**
 *
 * @param {*} no
 * @param {*} title
 * @param {*} desciption
 * @param {*} location
 */
function show_form(no, name, surname, email, password, role) {

  if (name) {
    isEdit = true;
    currentNo = no;
    // populate the form elements
    form.getElementsByClassName('name_input')[0].value = name;
    form.getElementsByClassName('surname_input')[0].value = surname;
    form.getElementsByClassName('email_input')[0].value = email;
    form.getElementsByClassName('password_input')[0].value = password;
    form.getElementsByClassName('role_input')[0].value = role;
  } else {
    isEdit = false;
  }

  form.style.display = 'block';
}

/**
 *
 */
function sumbit_form() {
  let error = false;

  const name = form.getElementsByClassName('name_input')[0];
  if (name.value.length < 1) {
    name.style.borderWidth = '2px';
    name.style.borderColor = style.getPropertyValue('--color-error');
    error = true;
  }
  const surname = form.getElementsByClassName('surname_input')[0];
  if (surname.value.length < 1) {
    surname.style.borderWidth = '2px';
    surname.style.borderColor = style.getPropertyValue('--color-error');
    error = true;
  }
  const email = form.getElementsByClassName('email_input')[0];
  if (email.value.length < 1) {
    email.style.borderWidth = '2px';
    email.style.borderColor = style.getPropertyValue('--color-error');
    error = true;
  }
  const password = form.getElementsByClassName('password_input')[0];
  if (password.value.length < 1) {
    password.style.borderWidth = '2px';
    password.style.borderColor = style.getPropertyValue('--color-error');
    error = true;
  }
  const role = form.getElementsByClassName('role_input')[0];
  if (role.value.length < 1) {
    role.style.borderWidth = '2px';
    role.style.borderColor = style.getPropertyValue('--color-error');
    error = true;
  }

  if (!error) {
    let success;
    if (isEdit) {
      success = update_form_data(JSON.stringify({
        'no': currentNo,
        'name': name.value,
        'surname': surname.value,
        'email': email.value,
        'password': password.value,
        'role': role.value,
      }));
    } else {
      success = post_form_data(JSON.stringify({
        'name': name.value,
        'surname': surname.value,
        'email': email.value,
        'password': password.value,
        'role': role.value,
      }));
    }
    success.then((result) => {
      if (result) {
        close_form();
      }
    });
  }
}

/**
 *
 * @param {*} event
 */
function checkForEnterAndSumbit(event) {
  // 13 == 'Enter'
  if (event.keyCode === 13) {
    sumbit_form();
  }
}

/**
 *
 */
function close_form() {
  form.style.display = 'none';
}

/**
 *
 * @param {*} data
 */
function delete_form(no) {
  fetch('../server/endpoint_users.php', {
    method: 'DELETE',
    headers: {'content-type': 'application/json'},
    body: JSON.stringify({'no': no}),
  }).then((response)=>{
    response.json().then((json)=>{
      if (json['delete'] == 'ok') {
        const element = document.getElementById('table_item_'+json['no']);
        element.parentElement.removeChild(element);
      }
    });
  });
}

/**
 *
 * @param {*} data 
 */
async function post_form_data(data) {
  const response = await fetch('../server/endpoint_users.php', {
    method: 'POST',
    headers: {'content-type': 'application/json'},
    body: data,
  });

  const json = await response.json();
  if (response.status == 400 && json['error'] == 'email already in use') {
    const email = form.getElementsByClassName('email_input')[0];
    email.style.borderWidth = '2px';
    email.style.borderColor = style.getPropertyValue('--color-error');
    return false;
  }

  // Add the new element
  document.querySelector('table').appendChild(
      list_item(json['no'], json['name'], json['surname'],
          json['email'], json['password'],
          json['role']));
  // Scroll to the added element
  document.getElementById('table_item_'+json['no']).scrollIntoView({behavior: 'smooth'});
  return true;
}

/**
 *
 * @param {*} data
 */
async function update_form_data(data) {
  const response = await fetch('../server/endpoint_users.php', {
    method: 'PUT',
    headers: {'content-type': 'application/json'},
    body: data,
  });

  const json = await response.json();
  if (response.status == 400 && json['error'] == 'email already in use') {
    const email = form.getElementsByClassName('email_input')[0];
    email.style.borderWidth = '2px';
    email.style.borderColor = style.getPropertyValue('--color-error');
    return false;
  }

  // Update the corresponding element
  const old_element = document.getElementById('table_item_'+json['no']);
  old_element.parentElement.replaceChild(list_item(json['no'], json['name'], json['surname'],
      json['email'], json['password'], json['role']), old_element);
  return true;
}
