/*global document: false*/

var topButton = document.getElementById("topFunction");

window.onscroll = function () {scrollFunction(); };

function scrollFunction() {
    if
    (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20
    ) {
     topbutton.style.display = "block";
    } else {
    topbutton.style.display = "none";
    }
}

topbutton.addEventListener("click", backToTop);

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}