(function () {
  const menuToggle = document.querySelector('.menu-toggle');
  const body = document.querySelector('body');

  menuToggle.addEventListener('click', (e) => {
    body.classList.toggle('hide-sidebar');
  });
})();

function addOneSecond(hours, minutes, seconds) {
  const date = new Date();
  date.setHours(parseInt(hours));
  date.setMinutes(parseInt(minutes));
  date.setSeconds(parseInt(seconds) + 1);

  const formattedHours = `${date.getHours()}`.padStart(2, '0');
  const formattedMinutes = `${date.getMinutes()}`.padStart(2, '0');
  const formattedSeconds = `${date.getSeconds()}`.padStart(2, '0');
  return `${formattedHours}:${formattedMinutes}:${formattedSeconds}`;
}

function activeClock() {
  const activeClock = document.querySelector('[active-clock]');
  if (!activeClock) return;

  setInterval(() => {
    const parts = activeClock.innerHTML.split(':');
    activeClock.innerHTML = addOneSecond(...parts);
  }, 1000);
}

activeClock();
