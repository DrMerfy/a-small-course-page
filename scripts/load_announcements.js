const userRole = getCookie('role');

// Load tutor specific fields
if ( userRole === 'tutor') {
  document.getElementById('options').innerHTML = '<button class="new_announcement_btn" onclick="show_form()"><i class="plus-icon"></i>Προσθήκη νέας ανακοίνωσης</button>';
}

// Load announcements
const ajax = new XMLHttpRequest();
ajax.onreadystatechange = function(loading) {
  if (this.readyState == 4 && this.status == 200) {
    const response = JSON.parse(this.responseText)['announcements'];
    for (item of response) {
      document.getElementById('announcements-list').appendChild(
          list_item(item['no'], item['date'],
              item['subject'], item['text'], item['isLinked']));
    }
  }
};

ajax.open('GET', '../server/announcement_endpoint.php', true);
ajax.setRequestHeader('Content-Type', 'application/json');
ajax.send();

/**
 *
 * @param {*} no
 * @param {*} date
 * @param {*} subject
 * @param {*} text
 * @param {*} isLinked
 * @return {*}
 */
function list_item(no, date, subject, text, isLinked) {
  let item = (
    '<div class="header">'+
      '<h2>Ανακοίνωση '+no+'</h2>');

  // Add the edit/delete buttons only for the right user
  if (userRole === 'tutor') {
    item += '<button class="edit_btn" onclick='+
    '"show_form(`'+no+'`,`'+date+'`,`'+subject+'`,`'+text+'`,`'+isLinked+'`)"></button>'+
            '<button class="delete_btn" onclick='+
            '"delete_form(`'+no+'`)"></button>';
  }

  // Rest of the tags remain the same
  item += '</div>'+
          '<p><span class="bold-text">Ημερομηνία: </span>'+date+'</p>'+
          '<p class="subject"><span class="bold-text">Θέμα: </span>'+subject+'</p>'+
          '<p>'+text+'</p>';

  if (isLinked != 0) {
    item += '<a href="./homework.php">«Εργασίες»</a>';
  }

  container = document.createElement('li');
  container.classList.add('list-box');
  container.id = 'announce_box_'+no;
  container.innerHTML = item;

  return container;
}

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
