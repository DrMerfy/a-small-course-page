const style = getComputedStyle(document.body);
const form = document.getElementsByClassName('modal-form')[0];

/**
 *
 */
function show_form() {
  const d = new Date();

  form.getElementsByClassName('date_input')[0].innerHTML = d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear();
  form.style.display = 'block';
}

/**
 *
 */
function sumbit_form() {
  let error = false;
  const subject = form.getElementsByClassName('subject_input')[0];
  if (subject.value.length < 1) {
    subject.style.borderColor = style.getPropertyValue('--color-error');
    error = true;
  }
  const text = form.getElementsByClassName('text_input')[0];
  if (text.value.length < 1) {
    text.style.borderColor = style.getPropertyValue('--color-error');
    error = true;
  }
  const isLinked = form.getElementsByClassName('isLinked_input')[0].checked;
  console.log(subject, text, isLinked);
  if (!error) {
    close_form();
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
