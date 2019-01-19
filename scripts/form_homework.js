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
function show_form(no, title, goals, desciption, logistics, date, location) {
  const filename = document.getElementById('previous-file-name');

  if (title) {
    isEdit = true;
    currentNo = no;
    previousLocation = location;
    location = location.split('/');
    // populate the form elements
    form.getElementsByClassName('title_input')[0].value = title;
    form.getElementsByClassName('goals_input')[0].value = goals;
    form.getElementsByClassName('description_input')[0].value = desciption;
    form.getElementsByClassName('logistics_input')[0].value = logistics;
    form.getElementsByClassName('date_input')[0].value = date;
    filename.innerHTML = location[location.length - 1];
    filename.classList = '';
  } else {
    filename.classList.add('none');
    isEdit = false;
  }

  form.style.display = 'block';
}

/**
 *
 */
function sumbit_form() {
  let error = false;
  let fileChanged = true;

  const title = form.getElementsByClassName('title_input')[0];
  if (title.value.length < 1) {
    title.style.borderWidth = '2px';
    title.style.borderColor = style.getPropertyValue('--color-error');
    error = true;
  }
  const goals = form.getElementsByClassName('goals_input')[0];
  if (goals.value.length < 1) {
    goals.style.borderWidth = '2px';
    goals.style.borderColor = style.getPropertyValue('--color-error');
    error = true;
  }
  const description = form.getElementsByClassName('description_input')[0];
  if (description.value.length < 1) {
    description.style.borderWidth = '2px';
    description.style.borderColor = style.getPropertyValue('--color-error');
    error = true;
  }
  const logistics = form.getElementsByClassName('logistics_input')[0];
  if (logistics.value.length < 1) {
    logistics.style.borderWidth = '2px';
    logistics.style.borderColor = style.getPropertyValue('--color-error');
    error = true;
  }
  const date = form.getElementsByClassName('date_input')[0];
  if (date.value.length < 1) {
    date.style.borderWidth = '2px';
    date.style.borderColor = style.getPropertyValue('--color-error');
    error = true;
  }
  let file = form.getElementsByClassName('file-upload')[0];
  if (file.files[0] === undefined) {
    if (isEdit) {
      fileChanged = false;
    } else {
      file.style.backgroundColor = style.getPropertyValue('--color-error');
      error = true;
    }
  }

  if (!error) {
    if (isEdit) {
      if (fileChanged) {
        upload_file(file.files[0], (json) => update_form_data(JSON.stringify({
          'no': currentNo,
          'title': title.value,
          'goals': goals.value,
          'description': description.value,
          'logistics': logistics.value,
          'date': date.value,
          'location': json['location'],
        })));
      } else {
        file = document.getElementById('previous-file-name').innerHTML;
        update_form_data(JSON.stringify({
          'no': currentNo,
          'title': title.value,
          'goals': goals.value,
          'description': description.value,
          'logistics': logistics.value,
          'date': date.value,
          'location': previousLocation,
        }));
      }
    } else {
      // Upload the file
      upload_file(file.files[0], (json) => post_form_data(JSON.stringify({
        'title': title.value,
        'goals': goals.value,
        'description': description.value,
        'logistics': logistics.value,
        'date': date.value,
        'location': json['location'],
      }))); // also posts the data and updates DOM
    }
    close_form();
    return;
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
  fetch('../server/endpoint_homework.php', {
    method: 'DELETE',
    headers: {'content-type': 'application/json'},
    body: JSON.stringify({'no': no}),
  }).then((response)=>{
    response.json().then((json)=>{
      if (json['delete'] == 'ok') {
        const element = document.getElementById('homework_box_'+json['no']);
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
  fetch('../server/endpoint_homework.php', {
    method: 'POST',
    headers: {'content-type': 'application/json'},
    body: data,
  }).then((response) => {
    response.json().then((json)=>{
      // Add the new element
      document.getElementById('homework-list').appendChild(
          list_item(json['no'], json['title'], json['goals'],
              json['description'], json['logistics'],
              json['date'], json['location']));
      // Scroll to the added element
      document.getElementById('homework_box_'+json['no']).scrollIntoView({behavior: 'smooth'});
    });
  });
}

/**
 *
 * @param {*} data
 */
function update_form_data(data) {
  fetch('../server/endpoint_homework.php', {
    method: 'PUT',
    headers: {'content-type': 'application/json'},
    body: data,
  }).then((response) =>{
    response.json().then((json) =>{
      // Update the corresponding element
      const old_element = document.getElementById('homework_box_'+json['no']);
      old_element.parentElement.replaceChild(list_item(json['no'], json['title'], json['goals'],
          json['description'], json['logistics'], json['date'], json['location']), old_element);
    });
  });
}

/**
 *
 * @param {*} file
 */
async function upload_file(file, handler) {
  const data = new FormData();
  data.append('files[]', file);

  fetch('../server/file_upload.php', {
    method: 'POST',
    body: data,
  }).then((response) => {
    response.json().then((json)=> handler(json));
  });
}
