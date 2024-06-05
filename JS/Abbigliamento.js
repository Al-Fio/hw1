/*Shop Abbigliamento*/ 
let currentPositionAbbigliamento = 1; 
let MAXCAROSELLOABBIGLIAMENTO; 

function prevAbbigliamento() {
    const divShop = document.querySelectorAll('#AbbigliamentoTiro .caroselloShop');
    const dash = document.querySelectorAll('#AbbigliamentoTiro .dashDiv button');

    currentPositionAbbigliamento = prevShopFunction(divShop, currentPositionAbbigliamento);

    dashOrder(dash, currentPositionAbbigliamento);
}

function nextAbbigliamento() {
    const divShop = document.querySelectorAll('#AbbigliamentoTiro .caroselloShop');
    const dash = document.querySelectorAll('#AbbigliamentoTiro .dashDiv button');

    currentPositionAbbigliamento = nextShopFunction(divShop, currentPositionAbbigliamento, MAXCAROSELLOABBIGLIAMENTO);

    dashOrder(dash, currentPositionAbbigliamento);
}

function dashAbbigliamento (event) {
    const dash = event.currentTarget;
    const divShop = document.querySelectorAll('#AbbigliamentoTiro .caroselloShop');
    const dashList = document.querySelectorAll('#AbbigliamentoTiro .dashDiv button');

    currentPositionAbbigliamento = changeShopFunction(dash, divShop);

    dashOrder(dashList, currentPositionAbbigliamento);
}

const nextShopAbbigliamento = document.querySelectorAll('#AbbigliamentoTiro button')[1];
nextShopAbbigliamento.addEventListener('click', nextAbbigliamento);

const prevShopAbbigliamento = document.querySelectorAll('#AbbigliamentoTiro button')[0];
prevShopAbbigliamento.addEventListener('click', prevAbbigliamento);

const dashShopAbbigliamento = document.querySelectorAll('#AbbigliamentoTiro .dashDiv button');
for (const item of dashShopAbbigliamento)   
    item.addEventListener('click', dashAbbigliamento);

function onJsonAbbigliamento(json) {
    const dashDiv = document.querySelector('#AbbigliamentoTiro .dashDiv');
    const caroselloDiv = document.querySelector('#AbbigliamentoTiro .divImgShop');
    
    MAXCAROSELLOABBIGLIAMENTO = showShop(json, caroselloDiv);

    for(let j = 1; j < MAXCAROSELLOABBIGLIAMENTO-1; j++) {
        const dash = document.createElement('button');
        dash.dataset.dash = j;
        
        if(j === 1) dash.classList.add('orange');
        else dash.classList.add('gray');

        dashDiv.appendChild(dash);
        dash.addEventListener('click', dashAbbigliamento);
    }
}

const formDataAbbigliamento = new FormData();
formDataAbbigliamento.append('ricerca', 'abbigliamento');
const dataShopAbbigliamento = {method: 'post', body: formDataAbbigliamento}
fetch('searchProductByCategory.php', dataShopAbbigliamento).then(onResponse).then(onJsonAbbigliamento);
/****************************************************/