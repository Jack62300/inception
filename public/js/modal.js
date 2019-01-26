const displayNavs = document.querySelector('.opacity0');
const togglers = document.querySelector('.douane');

function loadStyle(event) {
    displayNavs.classList.toggle('active');
}

document.querySelector(".douane").addEventListener("click", loadStyle); 