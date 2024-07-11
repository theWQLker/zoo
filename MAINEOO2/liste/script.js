let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-item');
const totalSlides = slides.length;

function moveSlide(direction) {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
    slides[currentSlide].classList.add('active');
    document.querySelector('.carousel').style.transform = `translateX(${-currentSlide * 100}%)`;
}

setInterval(() => {
    moveSlide(1);
}, 2500);
