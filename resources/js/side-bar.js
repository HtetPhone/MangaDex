const sideBar = document.getElementById('sideBar')
const sideBarBtn = document.getElementById('sideBarBtn')

sideBarBtn.addEventListener('click', () => {
    sideBar.classList.toggle('d-none')
    if(sideBar.classList.contains('d-none')) {
        sideBarBtn.innerHTML = `<i class="bi bi-list h5"></i>`
    }else {
        sideBarBtn.innerHTML = `<i class="bi bi-x h5"></i>`
    }
})