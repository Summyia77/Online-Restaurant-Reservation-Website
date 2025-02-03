const header = document.querySelector('header');
window.addEventListener("scroll",sticky())

function sticky(){
    header.classList.toggle('sticky',window.scrollY>0);
}
const sr = ScrollReveal ({
    distance:'60px',duration:2500,reset:true
});
sr.reveal('.home_text',{delay:200,origin:'left'});
sr.reveal('.home_img',{delay:200,origin:'right'});
sr.reveal('.menu, .contact,.about, .container',{delay:200,origin:'bottom'});


    var menuToggle = document.getElementById('menu-toggle');
    var navbar = document.querySelector('.navbar');

    menuToggle.addEventListener('click', function () {
        navbar.classList.toggle('show');
    });

