const selectElement = document.querySelector('#avatarChoose');
const imageElement = document.querySelector('#myImage');

selectElement.addEventListener('change',(event) => {
    const selectedValue = event.target.value;
    imageElement.setAttribute('src',"avatars/" + selectedValue);
})