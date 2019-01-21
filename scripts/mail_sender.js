const style = getComputedStyle(document.body);

/**
 *
 */
async function send_mail() {
  const sender = document.getElementsByName('sender')[0];
  if (sender.value.length < 1) {
    sender.style.borderWidth = '2px';
    sender.style.borderColor = style.getPropertyValue('--color-error');
    return;
  }
  const subject = document.getElementsByName('subject')[0];
  if (subject.value.length < 1) {
    subject.style.borderWidth = '2px';
    subject.style.borderColor = style.getPropertyValue('--color-error');
    return;
  }
  const message = document.getElementsByName('message')[0];
  if (message.value.length < 1) {
    message.style.borderWidth = '2px';
    message.style.borderColor = style.getPropertyValue('--color-error');
    return;
  }

  const response = await fetch('../server/send_mail.php', {
    method: 'POST',
    headers: {'content-type': 'application/json'},
    body: JSON.stringify({
      'sender': sender.value,
      'subject': subject.value,
      'message': message.value,
    }),
  });
  // response.text().then((text)=>console.log(text));
  const json = await response.json();

  if (response.status == 200 && json['sent'] == 'ok') {
    const sent = document.getElementById('message_sent');
    sent.classList = 'fade-in';
  }
}