function toggleMobileMenu(menu) {
    menu.classList.toggle('open');
}
let sections = document.querySelectorAll('.section')
let links = document.querySelectorAll(".js-link");
window.addEventListener('scroll',()=>{
    
    sections.forEach(section =>{

        let top = window.scrollY;
        let offset = section.offsetTop;
        let heightSection = section.offsetHeight;
        let idSection =section.getAttribute('id');


    })


})

function scrollSection(event){
    event.preventDefault();
    const href = event.currentTarget.getAttribute('href');
    const section = document.querySelector(href);
    const topSection = section.offsetTop - 70;
    window.scrollTo({
        top: topSection,
        behavior:'smooth'
    });
}
links.forEach(link =>{

    link.addEventListener('click',scrollSection);

})


let arrow = document.querySelectorAll('.arrow-up');
let clicado = false;
let clicado1 = false;
let clicado2 = false;
let textoOculto =  document.querySelectorAll('.hide-text');
let boxInformation = document.querySelectorAll('.box-information');
function showUp() {
    if (!clicado) {
        arrow[0].style.transform = "rotate(180deg)";
        textoOculto[0].style.fontSize = '16px'
        boxInformation[0].style.height = '170px'
        console.log('clicou');
        clicado = true;
    } else if(clicado) {
        console.log('já clicado');
        arrow[0].style.transform = "rotate(0deg)";
        textoOculto[0].style.fontSize = '0px'
        boxInformation[0].style.height = '100px'
        clicado = false
    }

}

function showUp1() {
    if (!clicado1) {
        arrow[1].style.transform = "rotate(180deg)";
        textoOculto[1].style.fontSize = '16px'
        boxInformation[1].style.height = '170px'
        console.log('clicou');
        clicado1 = true;
    } else if(clicado1) {
        console.log('já clicado');
        arrow[1].style.transform = "rotate(0deg)";
        textoOculto[1].style.fontSize = '0px'
        boxInformation[1].style.height = '100px'
        clicado1 = false
    }

}
function showUp2() {
    if (!clicado2) {
        arrow[2].style.transform = "rotate(180deg)";
        textoOculto[2].style.fontSize = '16px'
        boxInformation[2].style.height = '170px'
        console.log('clicou');
        clicado2 = true;
    } else if(clicado2) {
        console.log('já clicado');
        arrow[2].style.transform = "rotate(0deg)";
        textoOculto[2].style.fontSize = '0px'
        boxInformation[2].style.height = '100px'
        clicado2 = false
    }

}

email = document.getElementById('iemail')
const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

function validateEmail(){
  
  if(!emailRegex.test(email.value) || email.value === '') {

    email.style.border = '1px solid red'
    textErro.style.display = 'block'
    return false
  }
  else{

    email.style.border = '1px solid black'
    textErro.style.display = 'none'
    localStorage.setItem("iemail", email.value);
    return true
  }
  }
