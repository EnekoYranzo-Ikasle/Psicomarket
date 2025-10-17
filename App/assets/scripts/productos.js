
function moverCarrusel(btn, dir) {
  const imageFlag = btn.closest('.imageFlag');
  const track = imageFlag.querySelector('.images');
  const total = track.children.length;

  if (total <= 1) return;

  let idx = Number(track.dataset.index || 0);
  idx = (idx + dir + total) % total;

  track.style.transform = `translateX(-${idx * 100}%)`;
  track.dataset.index = idx;
}

const svgs = document.querySelectorAll('.producto svg');


console.log(svgs);

svgs.forEach(svg => {
    console.log("hola");
});
