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
let passwordFieldEd = document.querySelector('[name="edit_password"]');
let usernameFieldEd = document.querySelector('[name="edit_username"]');

usernameField.addEventListener('keypress', function ( event ) {
    removeWhiteSpace(event);
});
passwordField.addEventListener('keypress', function ( event ) {
    removeWhiteSpace(event);
});
usernameFieldEd.addEventListener('keypress', function ( event ) {
    removeWhiteSpace(event);
});

passwordFieldEd.addEventListener('keypress', function ( event ) {
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

    modalUsername.textContent = `${recipient}`
    modalId.textContent = `${recUserId}`
});

const editAdminModal = document.getElementById('editAdmin');
editAdminModal.addEventListener('show.mdb.modal', (event) => {
    const button = event.relatedTarget;
    const errorText = editAdminModal.querySelector('#errorFromBackendEditAdmin');
    const recUsername = button.getAttribute('data-mdb-username');
    const recName = button.getAttribute('data-mdb-name');
    const recPass = button.getAttribute('data-mdb-pass');
    const recUserId = button.getAttribute('data-mdb-id');
    const recUserIdDB = button.getAttribute('data-mdb-id-db');

    const nameInput = editAdminModal.querySelector('#editFullName');
    const usernameInput = editAdminModal.querySelector('#editUsername');
    const passwordInput = editAdminModal.querySelector('#editPass');
    const userId = editAdminModal.querySelector('#editUserId');
    const userIdDB = editAdminModal.querySelector('#editIdDB');

    errorText.textContent = "";
    userId.textContent = `${recUserId}`;
    userIdDB.textContent = `${recUserIdDB}`;
    nameInput.value = recName;
    usernameInput.value = recUsername;
    passwordInput.value = recPass;
});

const addProductModal = document.getElementById('addProductModal');
addProductModal.addEventListener('show.mdb.modal', (event) => {
    let errorText = addProductModal.querySelector('#errorFromBackendAddProduct');
    errorText.textContent = "";
});


function showImage(buttonValues) {
    const recipient = buttonValues.getAttribute('data-mdb-img');
    let viewImageTag = document.getElementById('viewProdImgSrc');
    viewImageTag.src = "/uploads/products/" + recipient;
}








