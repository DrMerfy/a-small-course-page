const list = document.getElementById('announcements-list');

// Load announcements
const ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    const response = JSON.parse(this.responseText)['announcements'];
    for (item of response) {
      document.getElementById('announcements-list')
          .innerHTML += list_item(item['no'], item['date'],
              item['subject'], item['text'], item['isLinked']);
    }
  }
};

ajax.open('GET', '../server/announcement_endpoint.php', true);
ajax.setRequestHeader('Content-Type', 'application/json');
ajax.send();

// Load tutor specific fields
if ('<%= Session["UserName"] %>' == 'tutor') {
  
}
{/* <i class="plus-icon"></i>
            <a href="#">Προσθήκη νέας ανακοίνωσης</a> */}

/**
 * 
 * @param {*} no 
 * @param {*} date 
 * @param {*} subject 
 * @param {*} text 
 * @param {*} isLinked 
 */
function list_item(no, date, subject, text, isLinked) {
  let item = (
    '<li class="list-box">'+
        '<h2>Ανακοίνωση '+no+'</h2>'+
        '<p><span class="bold-text">Ημερομηνία: </span>'+date+'</p>'+
       '<p class="subject"><span class="bold-text">Θέμα: </span>'+subject+'</p>'+
        '<p>'+text+'</p>');

  if (isLinked != 0) {
    item += '<a href="./homework.php">«Εργασίες»</a>';
  }
  item += '</li>';
  return item;
}
