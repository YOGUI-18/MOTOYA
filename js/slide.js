const slides = document.querySelectorAll('.carrousei');
let btnAnt = document.querySelector('#btnAnterior');
let btnSig = document.querySelector('#btnSiguiente');
btnAnt.addEventListener('click', slideAnterior);
btnSig.addEventListener('click', slideSiguiente);

let pos = 0;

function mostrarSlide(index) {
    slides.forEach((slide,i) =>  {
        slide.classList.add('hidden');
        if (i===index) {
            slide.classList.remove('hidden');
        }
    });
}

mostrarSlide(pos);
function slideAnterior(){
    pos= (pos-1 % slides.length) % slides.length;
mostrarSlide(pos);
}

function slideSiguiente(){
pos= (pos+1) % slides.length;
mostrarSlide(pos);
}

let touchIzq = 0;
let touchDer = 0;

const mostrarSlieMobile = () => {
  if (touchIzq < touchDer) slideSiguiente();
  if (touchIzq > touchDer) slideAnterior();
};

slides.forEach((slide) => {
  slide.addEventListener('touchstart', (e) => {
    touchDer = e.changedTouches[0].screenX; mostrarSlieMobile();
  });
});

setInterval(slideSiguiente, 5000)

