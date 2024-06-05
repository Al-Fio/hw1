let positionShow = 1;
const MAXPOSITIOSHOW = document.querySelectorAll('.catalogo').length;

let TimeoutID;

// Funzione per il selettore di lingua del sito
function chooseLanguage(event) {
    const newDiv = document.createElement('div');
    newDiv.id = 'DivLanguageSelector';
    newDiv.classList.add('flex');
    newDiv.classList.add('column');

    const newLink = document.createElement('a');
    newLink.textContent = 'English - EN';
    newLink.href = 'https://www.beretta.com/en';
    newDiv.appendChild(newLink);

    const newLink1 = document.createElement('a');
    newLink1.textContent = 'Rest of the World - EN';
    newLink1.href = 'https://www.beretta.com/en';
    newDiv.appendChild(newLink1);

    const newLink2 = document.createElement('a');
    newLink2.textContent = 'German - DE';
    newLink2.href = 'https://www.beretta.com/de-de';
    newDiv.appendChild(newLink2);

    const newLink3 = document.createElement('a');
    newLink3.textContent = 'Spain - SP';
    newLink3.href = 'https://www.beretta.com/es-es';
    newDiv.appendChild(newLink3);

    const languageSelector = document.querySelector('#DivSuperiore div');
    languageSelector.appendChild(newDiv);

    const button = event.currentTarget;
    button.removeEventListener('click', chooseLanguage);
    button.addEventListener('click', cancelLanguage);
}

function cancelLanguage(event) {
    const languageSelector = document.querySelector('#DivLanguageSelector');
    languageSelector.remove();

    const language = event.currentTarget;
    language.addEventListener('click', chooseLanguage);
}

const language = document.querySelector('#DivSuperiore button');
language.addEventListener('click', chooseLanguage);
// ****************************************************************************************


// Funzione per lo show all'interno dell'Header
function nextShow() {
    clearTimeout(TimeoutID);

    let position;

    if (positionShow < MAXPOSITIOSHOW) {
        position = positionShow + 1; 
    } else {
        position = 1;
    }

    const show = document.querySelectorAll('.showDiv');
    for (const item of show) {
        item.classList.add('hidden');
    }

    show[position - 1].classList.remove('hidden');

    const dash = document.querySelectorAll('#ButtonShow img.dash');
    for (const item of dash) {
        item.src = '//localhost/hw1/Immagini/Icon/dash_white.png';
    }

    dash[position - 1].src = '//localhost/hw1/Immagini/Icon/dash_orange.png';

    positionShow = position;

    TimeoutID = setTimeout(nextShow, 3000);
}

TimeoutID = setTimeout(nextShow, 3000);

function prevShow() {
    clearTimeout(TimeoutID);

    let position;

    if (positionShow > 1) {
        position = positionShow - 1; 
    } else {
        position = MAXPOSITIOSHOW;
    }

    const show = document.querySelectorAll('.showDiv');
    for (const item of show) {
        item.classList.add('hidden');
    }

    show[position - 1].classList.remove('hidden');

    const dash = document.querySelectorAll('#ButtonShow img.dash');
    for (const item of dash) {
        item.src = '//localhost/hw1/Immagini/Icon/dash_white.png';
    }

    dash[position - 1].src = '//localhost/hw1/Immagini/Icon/dash_orange.png';

    positionShow = position;

    TimeoutID = setTimeout(nextShow, 3000);
}

function changeHeader(event) {
    clearTimeout(TimeoutID);

    const dash = event.currentTarget;
    const position = parseInt(dash.dataset.show);
    const show = document.querySelectorAll('.showDiv');
    for (const item of show) {
        item.classList.add('hidden');
    }

    show[position - 1].classList.remove('hidden');

    const dashList = document.querySelectorAll('#ButtonShow img.dash');
    for (const item of dashList) {
        item.src = '//localhost/hw1/Immagini/Icon/dash_white.png';
    }

    dashList[position - 1].src = '//localhost/hw1/Immagini/Icon/dash_orange.png';

    positionShow = position;

    TimeoutID = setTimeout(nextShow, 3000);
}

const next = document.querySelector('#Next');
next.addEventListener('click', nextShow);

const prev = document.querySelector('#Prev');
prev.addEventListener('click', prevShow);

const dashHeader = document.querySelectorAll('.dash');
for (const item of dashHeader) {
    item.addEventListener('click', changeHeader)
}

// ***************************************************************************************


// Funzione per il NAV
function headerFunction(event) {
    const div = document.querySelectorAll("#NavBar .divLinkHeader");
    const link = event.currentTarget;

    for (const item of div) {
        item.classList.add('hidden');
        item.classList.remove('spaceAround');
        if (item.dataset.div === link.dataset.elem) {
            item.classList.remove('hidden');
            item.classList.add('spaceAround');
        }
    }   
    
    const nav = document.querySelectorAll('#SuperiorNav, #NavBar');
    for (const item of nav) {
        item.classList.add('onHover');
    }

    let item = document.getElementById('Logo');
    item.src = '//localhost/hw1/Immagini/Icon/Full__Blue.svg'

    // item = document.getElementById('Search');
    // item.parentNode.classList.add('hidden');

    item = document.getElementById('UserCircle');
    item.classList.add('hidden');

    item = document.getElementById('ShoppingCart');
    if(item !== null) item.classList.add('hidden');
}

function headerFunctionLeave() {
    const div = document.querySelectorAll("#NavBar .divLinkHeader");

    for (const item of div) {
        item.classList.add('hidden');
        item.classList.remove('spaceAround');
    }
    const nav = document.querySelectorAll('#SuperiorNav, #NavBar');
    for (const item of nav) {
        item.classList.remove('onHover');
    }

    let item = document.getElementById('Logo');
    item.src = '//localhost/hw1/Immagini/Icon/BerettaSimbolo.svg'

    // item = document.getElementById('Search');
    // item.parentNode.classList.remove('hidden');

    item = document.getElementById('UserCircle');
    item.classList.remove('hidden');

    item = document.getElementById('ShoppingCart');
    if(item !== null) item.classList.remove('hidden');
}

const linkHeader = document.querySelectorAll('#NavBar a.navElement');
for (const item of linkHeader) {
    item.addEventListener('mouseover', headerFunction);
}

const divLinkHeader = document.querySelectorAll('#NavBar .divLinkHeader');
for (const item of divLinkHeader) {
    item.addEventListener('mouseleave', headerFunctionLeave);
}

// ********************************************
function hideRegistrati(event) {    
    const div = document.querySelector('#AccediRegistrati')
    if (div !== null) {div.classList.add('hidden');}
    else {
        const div = document.querySelector('#Logout')
        div.classList.add('hidden');
    }

    event.currentTarget.removeEventListener('click', hideRegistrati);
    event.currentTarget.addEventListener('click', showRegistrati);
}

function showRegistrati(event) {
    const div = document.querySelector('#AccediRegistrati')
    if (div !== null) {div.classList.remove('hidden');}
    else {
        const div = document.querySelector('#Logout')
        div.classList.remove('hidden');
    }

    event.currentTarget.addEventListener('click', hideRegistrati);
    event.currentTarget.removeEventListener('click', showRegistrati);
}

const accediRegistrati = document.querySelector('#ButtonUserCircle');
accediRegistrati.addEventListener('click', showRegistrati);
// ******************************************************************************************************** 



