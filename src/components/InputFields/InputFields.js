let form = document.querySelector('form');

let componentInputsArr = document.querySelectorAll('form .component.input-field');

componentInputsArr.forEach(inputField => {
    let input =
        inputField.querySelector('input') ||
        inputField.querySelector('textarea');

    input.addEventListener('input', (e) => {
        let svgHint = inputField.querySelector('.svg-hint');
        let value = input.value;

        if (!svgHint) return;

        if (value !== '') svgHint.classList.remove('disabled');
        else svgHint.classList.add('disabled');
    });

    let isPassword = input.getAttribute('type') === 'password';

    if (isPassword) {
        let openEye = inputField.querySelector('svg.open');
        let closedEye = inputField.querySelector('svg.closed');

        openEye.addEventListener('click', (e) => {
            input.setAttribute('type', 'password');
            openEye.classList.add('disabled');
            closedEye.classList.remove('disabled');
        });

        closedEye.addEventListener('click', (e) => {
            input.setAttribute('type', 'text');
            closedEye.classList.add('disabled');
            openEye.classList.remove('disabled');
        });
    };

    let isDropdown = input.getAttribute('type') === "dropdown";

    if (isDropdown) {
        let dropdownOptions = inputField.querySelector('.dropdown-options');

        input.addEventListener('click', (e) => {
            e.stopPropagation();
            e.preventDefault();

            dropdownOptions.classList.remove('disabled');
        });

        document.body.addEventListener('click', (e) => {
            let isEnabled = !dropdownOptions.classList.contains('disabled');

            if (isEnabled) dropdownOptions.classList.add('disabled');
        });

        let options = dropdownOptions.querySelectorAll('.option');

        options.forEach(option => {
            option.addEventListener('click', (e) => {
                e.stopPropagation();

                input.value = option.textContent;
                dropdownOptions.classList.add('disabled');

                let svgHint = inputField.querySelector('.svg-hint');

                svgHint.classList.remove('disabled');
            });
        });
    };

});

let textareas = document.body.querySelectorAll(".component.input-field textarea");

textareas.forEach(textarea => {
    textarea.addEventListener("input", () => {
        textarea.style.height = "auto";
        textarea.style.height = textarea.scrollHeight + "px";
    });
});

let fileUploads = document.querySelectorAll('.component.file-upload');

fileUploads.forEach(fileUpload => {
    const text = fileUpload.querySelector('.text');
    const input = fileUpload.querySelector("input");

    input.addEventListener("change", () => {
        text.textContent = input.files[0]?.name || "Choose file (PDF)";
    });
});