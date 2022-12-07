<script>
    const avatar = document.getElementById('avatar');
    const imgPreview = document.getElementById('imgPreview');

    avatar.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
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
        const password = document.getElementById(id);
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        const eye = document.getElementById('eye_' + id);
        if (type === 'password') {
            eye.classList.remove('fa-eye-slash');
            eye.classList.add('fa-eye');
        } else {
            eye.classList.remove('fa-eye');
            eye.classList.add('fa-eye-slash');
        }
    }
</script>