let dropdownHead = document.querySelector('.dropdown-head');
let dropdownBody = document.querySelector('.dropdown-body');

dropdownHead.addEventListener('click', (e) => {
    e.stopPropagation();
    dropdownBody.classList.toggle('disabled');
});

document.body.addEventListener('click', (e) => {
    let disabled = dropdownBody.classList.contains('disabled');
    
    if (!disabled) dropdownBody.classList.add('disabled');
});