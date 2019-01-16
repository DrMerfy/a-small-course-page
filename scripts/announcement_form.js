const style = getComputedStyle(document.body);
const form = document.getElementsByClassName('modal-form')[0];

let isEdit = false; // Used to specify if the sumbit will edit an existing form
let currentNo = 0;
/**
 *
 */
function show_form(no, date, subject, text, isLinked) {
  if (date) {
    isEdit = true;
    currentNo = no;
    // populate the form elements
    form.getElementsByClassName('date_input')[0].innerHTML = date;
    form.getElementsByClassName('subject_input')[0].value = subject;
    form.getElementsByClassName('text_input')[0].value = text;
    form.getElementsByClassName('isLinked_input')[0].checked = (isLinked == 1)?true:false;
  } else {
    const d = new Date();
    form.getElementsByClassName('date_input')[0].innerHTML = d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear();
  }

  form.style.display = 'block';
}

/**
 *
 */
function sumbit_form() {
  let error = false;
  const subject = form.getElementsByClassName('subject_input')[0];
  if (subject.value.length < 1) {
    subject.style.borderWidth = '2px';
    subject.style.borderColor = style.getPropertyValue('--color-error');
    error = true;
  }
  const text = form.getElementsByClassName('text_input')[0];
  if (text.value.length < 1) {
    text.style.borderWidth = '2px';
    text.style.borderColor = style.getPropertyValue('--color-error');
    error = true;
  }
  const isLinked = form.getElementsByClassName('isLinked_input')[0].checked;

  if (!error) {
    if (isEdit) {
      update_form_date(currentNo, subject.value, text.value, isLinked);
    } else {
      post_form_data(subject.value, text.value, isLinked);
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
 * @param {*} no 
 */
function delete_form(no) {
  const ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
    console.log(this.responseText);

    if (this.readyState == 4 && this.status == 200) {
      const response = JSON.parse(this.responseText);
      // Delete the item
      const item = document.getElementById('announce_box_'+response['no']);
      console.log(item);
      item.parentNode.removeChild(item);
    }
  };

  ajax.open('DELETE', '../server/announcement_endpoint.php', true);
  ajax.setRequestHeader('Content-Type', 'application/json');
  ajax.send(JSON.stringify({'no': no}));
}

/**
 *
 * @param {string} subject 
 * @param {string} text 
 * @param {bool} isLinked 
 */
function post_form_data(subject, text, isLinked) {
  const ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 201) {
      const item = JSON.parse(this.responseText);
      // Add the new item
      document.getElementById('announcements-list').appendChild(
        list_item(item['no'], item['date'],
              item['subject'], item['text'], item['isLinked']));
    }
  };

  ajax.open('POST', '../server/announcement_endpoint.php', true);
  ajax.setRequestHeader('Content-Type', 'application/json');
  ajax.send(JSON.stringify({'subject': subject, 'text': text, 'isLinked': isLinked}));
};

/**
 *
 * @param {*} no
 * @param {*} subject 
 * @param {*} text 
 * @param {*} isLinked 
 */
function update_form_date(no, subject, text, isLinked) {
  const ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 201) {
      const response = JSON.parse(this.responseText);
      const old_item = document.getElementById('announce_box_'+response['no']);

      document.getElementById('announcements-list')
          .replaceChild(list_item(no, response['date'], subject, text, isLinked), old_item);
    }
  };

  ajax.open('PUT', '../server/announcement_endpoint.php', true);
  ajax.setRequestHeader('Content-Type', 'application/json');
  ajax.send(JSON.stringify({'no': no, 'subject': subject, 'text': text, 'isLinked': isLinked}));
}
