const userRole = getCookie('role');

// Load tutor specific fields
if ( userRole === 'tutor') {
  document.getElementById('options').innerHTML = '<button class="new_document_btn" onclick="show_form()"><i class="plus-icon"></i>Προσθήκη νέου εγγράφου</button>';
}

// Load documentsn
const ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    const response = JSON.parse(this.responseText)['documents'];
    for (item of response) {
      document.getElementById('documents-list').appendChild(
          list_item(item['no'], item['title'],
              item['description'], item['location']));
    }
  }
};

ajax.open('GET', '../server/endpoint_document.php', true);
ajax.setRequestHeader('Content-Type', 'application/json');
ajax.send();

/**
 *
 * @param {*} no
 * @param {*} isLinked
 * @return {*}
 */
function list_item(no, title, description, location) {
  let item = (
    '<div class="header">'+
      '<h2>'+title+'</h2>');

  // Add the edit/delete buttons only for the right user
  if (userRole === 'tutor') {
    item += '<button class="edit_btn" onclick='+
    '"show_form(`'+no+'`,`'+title+'`,`'+description+'`,`'+location+'`)"></button>'+
            '<button class="delete_btn" onclick='+
            '"delete_form(`'+no+'`)"></button>';
  }

  // Rest of the tags remain the same
  item += '</div>'+
      '<p><span class="bold-text">Περιγραφή: </span>'+description+'</p>'+
      '<a href="'+location+'">Download</a>';

  container = document.createElement('li');
  container.classList.add('list-box', 'doc-box');
  container.id = 'document_box_'+no;
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
