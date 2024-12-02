document.getElementById("btnMenu").addEventListener("click",
  function () {
    let menu = document.getElementById('menu');
    let titulo = document.querySelector('#titulo');
    menu.classList.toggle('hidden');
    titulo.classList.toggle('hidden');
  }
)


