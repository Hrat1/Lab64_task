$(document).ready(function() {
    $(".table-links").css({
        'width': ($(".table-links-wrap").width() + 'px')
    });
    setInterval(function () {
        $(".table-links").css({
            'width': ($(".table-links-wrap").width() + 'px')
        });
    },100);
});


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
