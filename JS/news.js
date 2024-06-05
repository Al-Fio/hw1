function onJsonNews(json) {
    const news = document.querySelector("#News");
    news.innerHTML = '';

    let numResult = json.data.length;
    if(numResult > 3) numResult = 3; 

    for (let i = 0; i < numResult; i++) {
        const doc = json.data[i];
        const title = doc.title;
        const img_url = doc.image_url;
        const url = doc.url;
        const notizia = document.createElement('div');
        notizia.classList.add('notizia');
        notizia.classList.add('spaceBetween');
        notizia.classList.add('column');
        const img = document.createElement('img');
        img.src = img_url;
        const linkNotizia = document.createElement('a');
        linkNotizia.textContent = 'Scopri di più'
        linkNotizia.href = url;
        linkNotizia.classList.add = ('linkNotizia');
        linkNotizia.textContent = title;
        linkNotizia.target = '_blank';


        notizia.appendChild(img);
        notizia.appendChild(linkNotizia);
        news.appendChild(notizia);
    } 

}

function onResponse(response) {
    return response.json();
}

function onFailure(error) {
    console.log('Error:' + error);
}

fetch('news.php').then(onResponse, onFailure).then(onJsonNews);
