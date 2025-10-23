const errorBox = document.querySelector('.error');
if (errorBox) {
  errorBox.style.transition = 'all 0.5s ease-in-out';
  setTimeout(() => {
    errorBox.style.top = '-150px';
    errorBox.style.opacity = 0;
    setTimeout(() => {
      errorBox.style.display = 'none';
    }, 500);
  }, 5000);
}
