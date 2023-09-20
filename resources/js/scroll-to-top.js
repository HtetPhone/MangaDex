//scroll to top
const sttBtn = document.querySelector('#sttBtn');
window.onscroll = () => {
    if(document.body.scrollTop > 20  || document.documentElement.scrollTop > 20) {
        sttBtn.classList.remove('d-none');
        console.log("gt20");
    }else {
        sttBtn.classList.add('d-none');
        console.log('lt20');
    }
};
