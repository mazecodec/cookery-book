const srcToFile = async (src, fileName) => {
  const response = await fetch(src, {
    responseType: "blob",
  });
  const mimeType = response.headers.get('Content-Type');
  const blob = await response.blob();
  return new File([blob], fileName, {type: mimeType});
};

async function loadFileIntoInputFile(inputFile, fileUrl, fileName) {
  if(!inputFile || !fileName || !fileUrl) {
    return;
  }
  const fileToLoad = await srcToFile(fileUrl, fileName);
  const dataTransfer = new DataTransfer();
  dataTransfer.items.add(fileToLoad);
  inputFile.files = dataTransfer.files;
}

(async () => {
  const image = document.querySelector('input[type="file"]#image');
  image.onchange = evt => {
    const preview = document.getElementById('preview');
    const [file] = image.files

    if (file) {
      preview.src = URL.createObjectURL(file)
      preview.style.display = 'block';
    }
  }

  const name = image.dataset?.value?.split('/')[image.dataset.value.split('/').length
  - 1];
  await loadFileIntoInputFile(image, image.dataset?.value, name);
})()
