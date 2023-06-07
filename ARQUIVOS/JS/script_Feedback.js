let BoxTarefa = document.querySelectorAll("main .box--feedbacks .box__tarefa");
let BoxTarefaLength = BoxTarefa.length;
for(let c = 0; c < BoxTarefaLength; c ++){

    if(c % 2 != 0){
        BoxTarefa[c].classList.add("justifySelf_end");
    }

}