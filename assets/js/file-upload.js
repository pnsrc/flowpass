const fileButton = document.getElementById('form-input_file');
const chosenImg = document.getElementById('chosen_image');
const fileName = document.getElementById('file_name');

fileButton.onchange = () => {
  const reader = new FileReader();
  reader.readAsDataURL(fileButton.files[0]);
  reader.onload = () => {
    chosenImg.setAttribute('src', reader.result);
  }
  fileName.textContent = fileButton.files[0].name;
}