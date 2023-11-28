const image = document.querySelector('input[type="file"]#image');

if (image) {
    image.onchange = evt => {
        const preview = document.getElementById('preview');

        if (preview) {
            preview.style.display = 'block';

            const [file] = image.files

            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    }
}
