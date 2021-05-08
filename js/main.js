// $(document).ready(function() {
//     $(".table-links").css({
//         'width': ($(".table-links-wrap").width() + 'px')
//     });
//     setInterval(function () {
//         $(".table-links").css({
//             'width': ($(".table-links-wrap").width() + 'px')
//         });
//     },100);
// });

let usernameField = document.querySelector('[name="add_username"]');
let passwordField = document.querySelector('[name="add_password"]');

passwordField.addEventListener('keypress', function ( event ) {
    removeWhiteSpace(event);
});

usernameField.addEventListener('keypress', function ( event ) {
    removeWhiteSpace(event);
});

function removeWhiteSpace(event){
    let key = event.keyCode;
    if (key === 32) {
        event.preventDefault();
    }
}

const deleteAdminModal = document.getElementById('deleteAdmin');
deleteAdminModal.addEventListener('show.mdb.modal', (event) => {
    const button = event.relatedTarget;
    const recipient = button.getAttribute('data-mdb-username');
    const recUserId = button.getAttribute('data-mdb-id');
    const modalUsername = deleteAdminModal.querySelector('.modal-adminUsername');
    const modalId = deleteAdminModal.querySelector('#modal-userid');
    // const modalBodyInput = exampleModal.querySelector('.modal-body input')

    modalUsername.textContent = `${recipient}`
    modalId.textContent = `${recUserId}`
    // modalBodyInput.value = recipient
})
