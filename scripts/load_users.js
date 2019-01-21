// Load users
const ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    const response = JSON.parse(this.responseText)['users'];
    for (item of response) {
      document.querySelector('table').appendChild(
          list_item(item['no'], item['name'], item['surname'],
              item['email'], item['password'], item['role']));
    }
  }
};

ajax.open('GET', '../server/endpoint_users.php', true);
ajax.setRequestHeader('Content-Type', 'application/json');
ajax.send();

/**
 * @param {*} no
 * @param {*} name
 * @param {*} surname
 * @param {*} email
 * @param {*} password
 * @param {*} role
 * @return {*}
 */
function list_item(no, name, surname, email, password, role) {
  let item = (
    '<td onclick="show_form(`'+no+'`,`'+name+'`,`'+surname+'`,`'+email+'`,`'+password+'`,`'+role+'`)">'+name+'</td>'+
    '<td onclick="show_form(`'+no+'`,`'+name+'`,`'+surname+'`,`'+email+'`,`'+password+'`,`'+role+'`)">'+surname+'</td>'+
    '<td onclick="show_form(`'+no+'`,`'+name+'`,`'+surname+'`,`'+email+'`,`'+password+'`,`'+role+'`)">'+email+'</td>'+
    '<td onclick="show_form(`'+no+'`,`'+name+'`,`'+surname+'`,`'+email+'`,`'+password+'`,`'+role+'`)">'+password+'</td>'+
    '<td onclick="show_form(`'+no+'`,`'+name+'`,`'+surname+'`,`'+email+'`,`'+password+'`,`'+role+'`)">'+role+'</td>'+
    '<td>'+'<button class="delete_btn" onclick='+
    '"delete_form(`'+no+'`);"></button>'+'</td>');

  container = document.createElement('tr');
  container.id = 'table_item_'+no;
  container.innerHTML = item;

  return container;
}