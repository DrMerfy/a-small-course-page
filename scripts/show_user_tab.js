const userRole = getCookie('role');

// Load tutor specific fields
if ( userRole === 'tutor') {
  const item = document.createElement('li');
  item.innerHTML = '<a href="./users.php"><i class="fas fa-user"></i></i>Χρήστες</a>';
  document.getElementById('nav-list').append(item);
}
