import './bootstrap';

const flashMsg = document.querySelector('.flash-msg');
if (flashMsg) {
  setTimeout(() => flashMsg.remove(), 4000);
}
