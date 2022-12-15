let images = document.querySelectorAll('.review-photo');
let container = document.querySelector('.images-container');
let toRemove = document.querySelector('.toRemove');
let removeList = [];

images.forEach(image => {
    image.addEventListener('click', (e) => {
        removeList.push(e.target.getAttribute('data-img'));
        container.removeChild(e.target);
        toRemove.value = removeList;
    });
});