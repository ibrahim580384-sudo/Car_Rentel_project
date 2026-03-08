
const track = document.querySelector('.carousel-track');

track.addEventListener('mouseover', () => {
  track.style.animationPlayState = 'paused';
});

track.addEventListener('mouseout', () => {
  track.style.animationPlayState = 'running';
});

document.addEventListener("DOMContentLoaded", function () {

    const hero = document.getElementById("hero");

    const image = [
        "image/back.jpg",
        "image/back1.jpg",
        "image/back2.jpg"
    ];

    let index = 0;

    hero.style.backgroundImage = `url(${image[index]})`;
    hero.style.backgroundImage = `
  linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)),
  url(${image[index]})
`;

    function changeBackground() {

        index = (index + 1) % image.length;

        
        hero.style.setProperty('--next-bg', `url(${image[index]})`);

        hero.style.backgroundImage =` url(${image[index]})`;
    }
    image.forEach(src => {
    const img = new Image();
    img.src = src;
    });
    setInterval(changeBackground, 4000);

});