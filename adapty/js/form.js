window.addEventListener('load', function () {

    const input = document.querySelector("#phone");
    const form = document.querySelector("#contact-form");
    const message = document.querySelector("#error-phone");

    const iti = window.intlTelInput(input, {
        hiddenInput: "full_phone",
        utilsScript: "/intl-tel-input/js/utils.js?1690975972744" // just for formatting/placeholders etc
    });

    form.onsubmit = () => {
        if(!iti.isValidNumber()) {
            message.innerHTML = "Invalid number. Please try again.";
            return false;
        }
    };

    const urlParams = new URLSearchParams(window.location.search);
    const fullPhone = urlParams.get('full_phone')
    if(fullPhone) {
        message.innerHTML = `Submitted hidden input value: ${fullPhone}`;
    }
})








