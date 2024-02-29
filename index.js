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

        if(top >= offset && top < offset + heightSection){



        }
        console.log(heightSection)
    })


})

