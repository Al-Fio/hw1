function articleRemove(json) {
    console.log(json);
    if(json['result']) {
        console.log('Articolo rimosso correttamente');
    } else {
        console.log('Errore rimozione articolo');
    }
    fetch('searchCarrelloByUser.php').then(onResponse).then(onJson);
}

function removeCarrello(event) {
    const formDataCarrello = new FormData();
    formDataCarrello.append('article', event.currentTarget.dataset.idArticolo);
    const dataCarello = {method: 'post', body: formDataCarrello}
    fetch('removeCarrello.php', dataCarello).then(onResponse).then(articleRemove);
}

function onJson(json) {
    console.log(json);


    const carrello = document.querySelector('#ContenitoreProdotti');

    carrello.innerHTML='';
    
    if(json.result === false) {
        console.log('hi');
        const div = document.createElement('div');
        const text = document.createElement('h1');
        const text2 = document.createElement('h2');
        text.textContent = 'Carrello vuoto';
        text2.textContent = 'Torna alla pagina principale ed inizia a fare acquisti';

        div.appendChild(text);
        div.appendChild(text2);

        div.classList.add('vuoto');
        carrello.appendChild(div);
        return;
    }

    

    for(let item of json){
        const div = document.createElement('div');

        const divRight = document.createElement('div');
        const button = document.createElement('button');
        const divLeft = document.createElement('div');
        const img = document.createElement('img');
        const titolo = document.createElement('p');
        
        img.src = '//localhost/SitoCompleto/' + item.urlImage;
        titolo.textContent = item.nome + ' ' + item.colore;
        button.textContent = 'Rimuovi dal Carrello';
        button.dataset.idArticolo = item.ID;

        divRight.classList.add('divRight');
        divLeft.classList.add('divLeft');
        div.classList.add('prodotti');
        button.classList.add('button');
        titolo.classList.add('testo');

        divRight.appendChild(button);
        divLeft.appendChild(img);
        divLeft.appendChild(titolo);

        if(item.vendibileOnline === '1') {
            const prezzo = document.createElement('p');
            const enfasy = document.createElement('b');
            enfasy.textContent = item.prezzo + ' €';
            prezzo.appendChild(enfasy);
            divLeft.appendChild(prezzo);
        }
        
        div.appendChild(divLeft);
        div.appendChild(divRight);

        carrello.appendChild(div);

        button.addEventListener('click', removeCarrello);
    }
}

function onResponse(response) {
    return response.json()
}

if(login !== 0) {
    fetch('searchCarrelloByUser.php').then(onResponse).then(onJson);
}

