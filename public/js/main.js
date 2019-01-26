const displayNav = document.querySelector('.displayNav');
const toggler = document.querySelector('.toggler');

toggler.addEventListener('click', ()=>{
  displayNav.classList.toggle('active');
});

