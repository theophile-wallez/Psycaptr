var elementOld = null;
var openClass = "FAQ-question-reponses--open";

function toggleAccordion(element) {
    content = element.querySelector(".FAQ-reponse");

    if(elementOld != null){
        elementOld.classList.remove(openClass);
        contentOld = elementOld.querySelector(".FAQ-reponse");
        contentOld.style.maxHeight = "0px";
    }

    if(elementOld !== element){
        element.classList.add(openClass);
        content.style.maxHeight = content.scrollHeight + "px";
        elementOld = element;
    }else{
        elementOld = null;
    }
}
