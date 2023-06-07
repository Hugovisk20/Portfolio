let BoxIcon = document.querySelector(".box__icon--header");
let Header = document.querySelector(".header");

BoxIcon.addEventListener("click", function(){

    Header.classList.toggle("header__active");
    BoxIcon.classList.toggle("icon__rotate")

})

window.addEventListener("scroll", function(){

    Header.classList.remove("header__active");
    BoxIcon.classList.remove("icon__rotate")

})

let BoxInput = document.querySelector(".header .box__input");

BoxInput.addEventListener("change", () => {

    localStorage.setItem("estado", BoxInput.checked);

})

window.addEventListener("load", () => {

    let estado = localStorage.getItem("estado");

    if(estado == "true"){
        BoxInput.checked = true;
    }else{
        BoxInput.checked = false;
    }

})
