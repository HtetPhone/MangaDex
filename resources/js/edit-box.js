let editBtn = document.querySelectorAll('.edit-btn');
let editBox =document.querySelectorAll('.edit-box');

editBtn.forEach( btn => {
    btn.addEventListener('click', function() {
        // console.log('click');
        editBox.forEach( box => {
            if(btn.id == box.id) {
                box.classList.toggle('d-none');
                // console.log(box.classList.contains('d-none'));
                if(box.classList.contains('d-none')) {
                    btn.innerHTML = 'Edit';
                }else {
                    btn.innerHTML = 'Cancle';
                }
            }
        })
    })
})


//reply edit box
let replyEditBtn = document.querySelectorAll('.reply-edit-btn');
let replyEditBox =document.querySelectorAll('.reply-edit-box');

replyEditBtn.forEach( btn => {
    btn.addEventListener('click', function() {
        // console.log('click');
        replyEditBox.forEach( box => {
            if(btn.id == box.id) {
                box.classList.toggle('d-none');
                // console.log(box.classList.contains('d-none'));
                if(box.classList.contains('d-none')) {
                    btn.innerHTML = "<i class='bi bi-pencil-square'></i>";
                }else {
                    btn.innerHTML = "<i class='bi bi-x-circle'></i>";
                }
            }
        })
    })
})
