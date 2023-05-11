(function () {
  const menuToggle = document.querySelector('.menu-toggle');
  const body = document.querySelector('body');

  menuToggle.addEventListener('click', (e) => {
    body.classList.toggle('hide-sidebar');
  });
})();
