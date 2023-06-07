let ImgCarrossel = document.querySelectorAll(".main .box--carrossel .box__img");
let index = ImgCarrossel.length;
let c = 0;
function avançaCard(){

    if(c < index){

        c ++;

        ImgCarrossel.forEach(element => {
            element.style.transform = `translateX(-${c * 100}%)`;
        });

    }else if(c == 7){

        c = 0;

        ImgCarrossel.forEach(element => {
            element.style.transform = `translateX(0%)`;
        });

    }

}
setInterval(avançaCard, 2000);


ImgCarrossel.forEach(element => {
    element.addEventListener("transitionend", transitionEndCards);
});

function transitionEndCards(){

    if(c == 6){

        ImgCarrossel.forEach(element => {

            element.style.transition = `none`;
            element.style.transform = `translateX(0%)`;
            setTimeout(function() {
                element.style.transition = `All .3s ease`;
            }, 500)
            
        });

        c = 0;

    }

}