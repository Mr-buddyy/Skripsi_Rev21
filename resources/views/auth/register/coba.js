const alert = document.querySelector('.alert');
const dismissAlertButton = document.querySelector('.alert button');

if (localStorage.getItem('hideAlert')) {
  alert.style.display = "none";
}

if (dismissAlertButton) {
  dismissAlertButton.addEventListener('click', event => {
    event.preventDefault();
    alert.classList.add('alert-hidden');
    localStorage.setItem("hideAlert", true);
  })
}