let topButton = document.getElementById("topFunction");

window.onscroll = function() {scrollFunction()};

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

/* Music Player Button*/
var music = document.querySelector("#music-button");
document.querySelector(".play-pause").addEventListener("click",
function() {
  if (music.paused) {
    music.play();
  } else {
    music.pause();
  }
});
/* 
function musicPlay() {
  var music = document.getElementsById("music-button");
  return music.paused ? music.play() : music.pause();
};*/

