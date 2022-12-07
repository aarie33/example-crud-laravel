/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/user.js ***!
  \******************************/
var avatar = document.getElementById('avatar');
var imgPreview = document.getElementById('imgPreview');
avatar.addEventListener('change', function () {
  var file = this.files[0];
  if (file) {
    var reader = new FileReader();
    reader.addEventListener('load', function () {
      imgPreview.setAttribute('src', this.result);
    });
    reader.readAsDataURL(file);
    imgPreview.classList.remove('d-none');
  } else {
    imgPreview.setAttribute('src', '');
    imgPreview.classList.add('d-none');
  }
});
function showPassword(id) {
  var password = document.getElementById(id);
  var type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  var eye = document.getElementById('eye_' + id);
  if (type === 'password') {
    eye.classList.remove('fa-eye-slash');
    eye.classList.add('fa-eye');
  } else {
    eye.classList.remove('fa-eye');
    eye.classList.add('fa-eye-slash');
  }
}
/******/ })()
;