const btnOToggle = document.querySelector('.btn-open-toggle')
btnOToggle.addEventListener('click', function () {
    var toggle = document.querySelector('.toggle')
    toggle.classList.toggle('hidden')
})
const btnCToggle = document.querySelector('.btn-close-toggle')
btnCToggle.addEventListener('click', function () {
    var toggle = document.querySelector('.toggle')
    toggle.classList.toggle('hidden')
})