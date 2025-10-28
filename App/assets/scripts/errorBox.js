function showError(message) {
  const errorBox = document.getElementById('error-box');
  if (!errorBox) return;

  errorBox.textContent = 'Error, ' + message;
  errorBox.style.display = 'block';
  errorBox.style.opacity = 1;
  errorBox.style.top = '50px';

  setTimeout(() => {
    errorBox.style.top = '-150px';
    errorBox.style.opacity = 0;
    setTimeout(() => {
      errorBox.style.display = 'none';
    }, 500);
  }, 5000);
}
