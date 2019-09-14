function domReady(e){
    
}

document.addEventListener('DOMContentReady', domReady);


function play(e, data, numero){
    e.preventDefault(); //evito il normale comportamento del bottone
    let el = document.getElementById('feedback'); //catturo l'elemento di feedback
    let n = getEstrazione(10); //faccio estrarre un numero da 1 a 100
    if(numero != n) //se corrsiponde a quello memorizzato su redis, ha vinto
        el.innerHTML = `Hai perso, mi spiace. E' uscito il numero ${ n }`;
    else{
        el.innerHTML= `Hai vinto `;
        if(data.includes("personaggi")){
            let personaggio = getPersonaggioMarvel();
            storeCharacter(personaggio);
        }
        else{
            let comic = getComicMarvel();
            storeComic(comic);
        }
    }
}
/** Template */
// CRD operations character
function storeCharacter(data){
    data["csrf-token"] ="ds";
    fetch(url,{
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'    
        },
        method: 'POST',
        credentials: "same-origin",
        body: JSON.stringify(data)
    })
    .then(res => console.log(res))
    .catch(error => console.log(error));
}
function showCharacter(id){
    fetch(url)
    .then(resp => resp.json())
    then(function(data){
    })
    .catch(error => console.log(error));
}
function deleteCharacter(id){
    
}
// CRD operations comic
function storeComic(data){

}
function showComic(id){
    fetch(url)
    .then(resp => resp.json())
    then(function(data){
    })
    .catch(error => console.log(error));
}
function deleteComic(id){

}
/**End template operations */
/**
 * Libreria
 */

//  Estrazione numero da 1 a 100
function getEstrazione(max){
    estr = Math.floor((Math.random() * max) + 1);
    return estr;
}

// Prendo un personaggio random dalla marvel con titolo e immaagine
function getPersonaggioMarvel(){
    let apiKey = `22f5fe1303b0ffd673a3581119ea058b`;
    let hash = `73aa13401993fe2b9cdc099524b39c6b`;
    let ts = `1`;
    let KEY = `ts=${ts}&apikey=${apiKey}&hash=${hash}`;
    let url = `http://gateway.marvel.com/v1/public/characters?offset=${String(getEstrazione(74))}&${KEY}`;
     fetch(url)
    .then(response => {
        if(response.ok) return response.json();
    })
    .then(function(response){
        let elemRandom = getEstrazione(20)-1;
        let elemSelected = response.data.results[elemRandom];
        let img;
        if(img = response.data.results[elemRandom].thumbnail.path)
        if(!img.includes("image_not_available")){
            img += "/portrait_incredible.jpg";
        }
        else{
            img+=".jpg";
        }
        personaggio = {
            id: elemSelected.id,
            name: elemSelected.name,
            image: img
        }
    })
    .catch(error => console.log("Si e' verificato un errore: "+ error));
    while(personaggio == null);
    return personaggio;
}

// Prendo un fumetto random dalla marvel con titolo e immagine. Possibilmente anche descrizione
function getComicMarvel(){
    let apiKey = `22f5fe1303b0ffd673a3581119ea058b`;
    let hash = `73aa13401993fe2b9cdc099524b39c6b`;
    let ts = `1`;
    let KEY = `ts=${ts}&apikey=${apiKey}&hash=${hash}`;
    let url = `http://gateway.marvel.com/v1/public/comics?offset=${String(getEstrazione(74))}&${KEY}`;
     fetch(url)
    .then(response => {
        if(response.ok) return response.json();
    })
    .then(function(response){
        let elemRandom = getEstrazione(20)-1;
        let elemSelected = response.data.results[elemRandom];
        let img = response.data.results[elemRandom].thumbnail.path;
        if(!img.includes("image_not_available")){
            img += "/portrait_incredible.jpg";
        }
        else{
            img+=".jpg";
        }
        comic = {
            id: elemSelected.id,
            name: elemSelected.title,
            image: img
        }
    })
    .catch(error => console.log("Si e' verificato un errore: " + error));
    while(comic == null);
    return comic;
}

