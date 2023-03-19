//nav bar listener fot toggler
const navbarToggler = document.querySelector('.navbar__toggler');
const navbarList = document.querySelector('ul');

navbarToggler.addEventListener('click', () => {
  navbarList.classList.toggle('expanded');
  navbarToggler.classList.toggle('active');
});

//card animation
var cards = document.querySelectorAll('.card');
cards.forEach(function (card) {
  card.addEventListener('click', function () {
    card.classList.toggle('is-flipped');
  });
});