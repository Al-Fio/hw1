function validazione(event) {
    const items = document.querySelector('#ErroreCredenziali');
    if(items !== null)
        items.classList.add('hidden');

    if(form.email.value.length == 0 ||
       form.password.value.length == 0) {

        document.querySelector('#ErroreVuoto').classList.remove('hidden');

        event.preventDefault();
    }
        
}

const form = document.forms['formLogin'];
form.addEventListener('submit', validazione);
