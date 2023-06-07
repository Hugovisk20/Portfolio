let BoxProjeto = document.querySelectorAll(".main .box--projeto .box__projeto");
let BoxProjetoLength = BoxProjeto.length;

for(let c = 0; c < BoxProjetoLength; c ++){
    if(c % 2 != 0){
        BoxProjeto[c].classList.add("RowReverse");
    }
}