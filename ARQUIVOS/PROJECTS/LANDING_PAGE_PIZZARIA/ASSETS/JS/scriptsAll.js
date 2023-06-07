let header = document.querySelector(".header");
window.addEventListener("scroll", () => {

    if(window.pageYOffset > 580){
        header.classList.add("header__small");
    }else if(window.pageYOffset < 100){
        header.classList.remove("header__small");
    }

})

function scrollWindow(element){

    let elemento = document.getElementsByClassName(element)[0];
    let elementoPosition = elemento.offsetTop;
    console.log(elementoPosition);
    window.scrollTo(0, (elementoPosition - 100));

}

let BoxFeed = document.querySelectorAll(".box--testemunhas .box__feed");
BoxFeed.forEach(element => {
    element.addEventListener("transitionend", transitionEndCarrossel);
});

let index = BoxFeed.length;
let c = 0;

function transitionEndCarrossel(){

    if(c == 5){

        BoxFeed.forEach(element => {
            element.style.transition = "none";
            element.style.transform = `translateX(0%)`;
        });

        c = 0;

        setTimeout(() => {

            BoxFeed.forEach(element => {
                element.style.transition = "All .4s ease";;
            });

        }, 500)

    }

}

function avançaCarrossel(){  
    
    if(c < index ){

        c ++;
        
        BoxFeed.forEach(element => {
            element.style.transform = `translateX(-${c * 100}%)`;
        });

    }
    console.log(c)
}

setInterval(avançaCarrossel, 3000);

let BoxIconHeader = document.querySelector(".box__icon--header");
BoxIconHeader.addEventListener("click", () => {

    header.classList.toggle("header__open");

})