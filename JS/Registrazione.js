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

function onJsonCheckEmail(json) {
    if (form.email = !json.exists) {
        document.querySelector('#Email p').classList.add('hidden');
    } else {
        const p = document.querySelector('#Email p');
        p.textContent = 'Email già utilizzata';
        p.classList.remove('hidden');
    }
}

function onResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function checkEmail(event) {
    const emailValue = document.querySelector('#Email input').value;

    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailValue).toLowerCase())) {
        const p = document.querySelector('#Email p');
        p.textContent = 'Email non valida';
        p.classList.remove('hidden');
        form.email = false;
    } else {
        fetch("checkEmail.php?q="+encodeURIComponent(String(emailValue).toLowerCase())).then(onResponse).then(onJsonCheckEmail);
    }
}

function checkPassword(event) {
    const passwordValue = document.querySelector('#Password input').value;
    const p = document.querySelector('#Password p');

    if (passwordValue.length >= 8) {
        p.classList.add('hidden');
        form.password = true;
    } else {
        p.classList.remove('hidden');
        form.password = false;
    }
}

function checkConfermaPassword(event) {
    const confirmPasswordValue = document.querySelector('#ConfermaPassword input').value;
    const passwordValue = document.querySelector('#Password input').value;

    console.log(confirmPasswordValue + ' ->>  ' + passwordValue);
    console.log(confirmPasswordValue === passwordValue);

    const p = document.querySelector('#ConfermaPassword p');

    if (confirmPasswordValue === passwordValue) {
        p.classList.add('hidden');
        form.password = true;
    } else {
        p.classList.remove('hidden');
        form.password = false;
    }
}

function checkRegistrazione(event) {

    const checkbox = document.querySelectorAll('.allow input');
    for(let items of checkbox) {
        form[items.name] = items.checked
        if(!items.checked)
            items.parentNode.parentNode.querySelector('p').classList.remove('hidden');
        else 
            items.parentNode.parentNode.querySelector('p').classList.add('hidden');
    }

    console.log(Object.keys(form).length !== 8)
    console.log(Object.values(form));

    if (Object.keys(form).length !== 8 || Object.values(form).includes(false)) 
        event.preventDefault();
    
}

const form = {'upload': true};
document.querySelector('#Email input').addEventListener('blur', checkEmail);
document.querySelector('#Nome input').addEventListener('blur', checkVuoto);
document.querySelector('#Cognome input').addEventListener('blur', checkVuoto);
document.querySelector('#Nazione input').addEventListener('blur', checkVuoto);
document.querySelector('#Password input').addEventListener('blur', checkPassword);
document.querySelector('#ConfermaPassword input').addEventListener('blur', checkConfermaPassword);
document.querySelector('form').addEventListener('submit', checkRegistrazione);
