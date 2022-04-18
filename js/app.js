"use strict"

const API_URL = "http://localhost/TPE_WINES/api/comment";

async function getComments() {
    //fetch para traer todos los comentarios
    try{
        let response = await fetch(API_URL);
        let comments = await response.json();

        render(comments);
    }
    catch (e){
        console.log(e);
    }
}




function render(comments) {
    let lista = document.querySelector("#list-comments");
    lista.innerHTML = "";
    for (let comment of comments) {
        let html = `<li class="list-group-item"> ${comment.content} - ${comment.qualification} </li>`;
        lista.innerHTML += html; 
    }
}

getComments();