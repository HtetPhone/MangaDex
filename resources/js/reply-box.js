let replyBtn  = document.querySelectorAll(".reply-btn") ;
let replyBox  = document.querySelectorAll(".reply-box") ;

replyBtn.forEach( btn => {
    btn.addEventListener('click', function() {
        replyBox.forEach(box => {
            if(box.id == btn.id) {
                box.classList.toggle('d-none');
                if(box.classList.contains('d-none')) {
                    btn.innerHTML = 'Reply';
                }else {
                    btn.innerHTML = 'Cancle';
                }
            }
        })
    })
});
