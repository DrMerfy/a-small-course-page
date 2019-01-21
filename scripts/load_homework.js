// Load tutor specific fields
if ( userRole === 'tutor') {
  document.getElementById('options').innerHTML = '<button class="new_document_btn" onclick="show_form()"><i class="plus-icon"></i>Προσθήκη νέου εγγράφου</button>';
}

// Load documents
const ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    const response = JSON.parse(this.responseText)['homework'];
    for (item of response) {
      document.getElementById('homework-list').appendChild(
          list_item(item['no'], item['title'], item['goals'],
              item['description'], item['logistics'],
              item['date'], item['location']));
    }
  }
};

ajax.open('GET', '../server/endpoint_homework.php', true);
ajax.setRequestHeader('Content-Type', 'application/json');
ajax.send();

/**
 *
 * @param {*} no
 * @param {*} title
 * @param {*} goals
 * @param {*} description
 * @param {*} logistics
 * @param {*} date
 * @param {*} location
 * @return {*}
 */
function list_item(no, title, goals, description, logistics, date, location) {
  let item = (
    '<div class="header">'+
      '<h2>'+title+'</h2>');

  // Add the edit/delete buttons only for the right user
  if (userRole === 'tutor') {
    item += '<button class="edit_btn" onclick='+
    '"show_form(`'+no+'`,`'+title+'`,`'+goals+'`,`'+description+'`,`'+logistics+'`,`'+date+'`,`'+location+'`)"></button>'+
            '<button class="delete_btn" onclick='+
            '"delete_form(`'+no+'`)"></button>';
  }

  // Rest of the tags remain the same
  item += '</div>'+
          '<h3><span class="bold-text">Στόχοι: </span></h3>'+
          '<ul>';

  // Append the goals as a list
  goals = goals.split(',');
  for (goal of goals) {
    item += '<li>'+goal+'</li>';
  }
  item += '</ul>'+
          '<h3 class="bold-text">Εκφώνηση:</h3>'+
          '<p>'+description+'<a href="'+location+'">εκφώνηση εργασίας</a></p>'+
          '<h3 class="bold-text">Παραδοτέα:</h3>'+      
          '<ul>';

  // Append logistics as a list
  logistics = logistics.split(',');
  for (logistic of logistics) {
    item += '<li>'+logistic+'</li>';
  }
                
  item += '</ul>'+
          '<p><span class="empasize-text">Ημερομηνία παράδοσης: </span>'+date+'</p>';

  container = document.createElement('li');
  container.classList.add('list-box', 'homework-box');
  container.id = 'homework_box_'+no;
  container.innerHTML = item;

  return container;
}
