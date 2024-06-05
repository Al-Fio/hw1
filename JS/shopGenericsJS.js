// Funzioni ausiliari per gli shop (AbbigliamentoTiro, Serie90, DT11)
function dashOrder(dash, currentPosition) {
    for (const item of dash) {
        item.classList.remove('orange');
        item.classList.add('gray');

        if(parseInt(item.dataset.dash) === currentPosition) {
            item.classList.remove('gray');
            item.classList.add('orange'); 
        }
    }
}

function nextShopFunction(divShop, currentPosition, MaxCarosello)  {
    if (currentPosition < MaxCarosello - 2) {
        divShop[currentPosition - 1].classList.add('hidden');
        divShop[currentPosition + 2].classList.remove('hidden');

        currentPosition++;
    }

    return currentPosition;
}

function prevShopFunction(divShop, currentPosition) {
    if (currentPosition > 1) {
        divShop[currentPosition + 1].classList.add('hidden');
        divShop[currentPosition - 2].classList.remove('hidden');

        currentPosition--;
    }

    return currentPosition;
}
 
function changeShopFunction(dash, divShop) {
    const position = parseInt(dash.dataset.dash);

    for (const item of divShop) {
        item.classList.add('hidden');
    }

    divShop[position - 1].classList.remove('hidden');
    divShop[position].classList.remove('hidden');
    divShop[position + 1].classList.remove('hidden');

    return position;
}

function articleAdd(json) {
    if(json['result']) {
        console.log('Articolo aggiunto correttamente');
    } else {
        console.log('Errore aggiungimento articolo');
    }
}

function addCarrello(event){
    const formDataCarrello = new FormData();
    formDataCarrello.append('article', event.currentTarget.dataset.idArticolo);
    const dataCarello = {method: 'post', body: formDataCarrello}
    fetch('addCarrello.php', dataCarello).then(onResponse).then(articleAdd);
}

function shopDivOnLeave(event) {
    const carrello = event.currentTarget.querySelector('.carrello');
    carrello.classList.add('hidden');
}

function shopDivOnHover(event) {
    const carrello = event.currentTarget.querySelector('.carrello');
    carrello.classList.remove('hidden');
}

function showShop(json, caroselloDiv) {
    let i = 1;

    for(let item of json){
        const div = document.createElement('div');
        const img = document.createElement('img');
        const titolo = document.createElement('p');
        
        img.src = '//localhost/hw1/' + item.urlImage;
        titolo.textContent = item.nome + ' ' + item.colore;

        div.classList.add('caroselloShop');
        if(i > 3) div.classList.add('hidden');
        titolo.classList.add('testo');

        div.appendChild(img);
        div.appendChild(titolo);

        if(item.vendibileOnline === '1') {
            const prezzo = document.createElement('p');
            const enfasy = document.createElement('b');
            enfasy.textContent = item.prezzo + ' €';
            prezzo.appendChild(enfasy);
            div.appendChild(prezzo);
        }

        if(login !== 0) {
            const carrello = document.createElement('button');
    
            if(item.vendibileOnline === '1') {
                carrello.textContent = 'Aggiungi al Carrello';
                carrello.addEventListener('click', addCarrello);
            } else {
                carrello.textContent = 'Prodotto non acquistabile online';
            }
    
            carrello.dataset.idArticolo = item.ID;

            carrello.classList.add('carrello');
            carrello.classList.add('hidden');
    
            div.appendChild(carrello);
    
            div.addEventListener('mouseover', shopDivOnHover);
            div.addEventListener('mouseleave', shopDivOnLeave);
        }

        caroselloDiv.appendChild(div);
        i++;
    }

    return i-1;
}

function onResponse(response) {
    return response.json()
}
