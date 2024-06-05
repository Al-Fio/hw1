function checkVuoto(event) {
    const input = event.currentTarget;
    const p = input.parentNode.parentNode.querySelector('p');

    if (input.value.length > 0) {
        p.classList.add('hidden');
        form[input.name] = true;
    } else {
        p.classList.remove('hidden');
        form[input.name] = false;
    }
}

function jsonCheckEmail(json) {
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('errorj');
    } else {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errorj');
    }
}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function checkEmail(event) {
    const emailInput = document.querySelector('#email input');

    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        const p = document.querySelector('#email p');
        p.textContent = "Email non valida";
        p.classList.remove('hidden');

        form.email = false;
        
    } else {
        fetch("check_email.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}

function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if (formStatus.password = passwordInput.value.length >= 8) {
        document.querySelector('.password').classList.remove('errorj');
    } else {
        document.querySelector('.password').classList.add('errorj');
    }

}

function checkConfirmPassword(event) {
    const confirmPasswordInput = document.querySelector('.confirm_password input');
    if (formStatus.confirmPassord = confirmPasswordInput.value === document.querySelector('.password input').value) {
        document.querySelector('.confirm_password').classList.remove('errorj');
    } else {
        document.querySelector('.confirm_password').classList.add('errorj');
    }
}

function checkRegistrazione(event) {
    event.preventDefault();

    // let checked = 0;

    const checkbox = document.querySelectorAll('.allow input');
    for(let items of checkbox) {
        console.log(items.checked);
        if(items.value === '1') {
            console.log('ciao sono entrato');
        }
    }

    if (errore > 0) {
        event.preventDefault();
        errore = 0;
    }
}

const form = {'upload': true};
// document.querySelector('#Email input').addEventListener('blur', checkEmail);
document.querySelector('#Nome input').addEventListener('blur', checkVuoto);
document.querySelector('#Cognome input').addEventListener('blur', checkVuoto);
document.querySelector('#Nazione input').addEventListener('blur', checkVuoto);
// document.querySelector('#Password input').addEventListener('blur', checkPassword);
// document.querySelector('#ConfermaPassword input').addEventListener('blur', checkConfermaPassword);
document.querySelector('form').addEventListener('submit', checkRegistrazione);
