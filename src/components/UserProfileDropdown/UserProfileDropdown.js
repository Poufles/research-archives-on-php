
let accountIconContainer = document.querySelector('nav .user-setting');
let userActions = accountIconContainer.querySelector('.user-actions');

accountIconContainer.addEventListener('click', (e) => {
    e.stopPropagation();
    userActions.classList.toggle('disabled');

    const dropdownBody = document.querySelector('nav .dropdown-body');
    if (!dropdownBody.classList.contains('disabled')) dropdownBody.classList.add('disabled');  
});

document.body.addEventListener('click', (e) => {
    let isDisabled = userActions.classList.contains('disabled');
    if (!isDisabled) userActions.classList.add('disabled');
});