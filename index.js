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
function showUp() {
    if (!clicado) {
        arrow[0].style.transform = "rotate(180deg)";
        console.log('clicou');
        clicado = true;
    } else if(clicado) {
        console.log('já clicado');
        arrow[0].style.transform = "rotate(0deg)";
        clicado = false
    }

}
