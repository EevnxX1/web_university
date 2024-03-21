const menuToggle = document.querySelector('.menu-toggle input');
const nav = document.querySelector('nav ul');

// Jika menuToggle di click maka tambahkan class slide(dibagian nav (ul).
menuToggle.addEventListener('click', function () {
  nav.classList.toggle('slide');
});
