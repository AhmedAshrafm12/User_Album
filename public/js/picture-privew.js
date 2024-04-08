$(document).ready(function() {
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
          preview.style.display = "block";
            preview.src = URL.createObjectURL(file)
        }
    }
});