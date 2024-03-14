var imageIndex = 0; // Index to keep track of the current image and description

// Array of image paths and descriptions
var images = ['images/Picture1.jpg', 'images/Picture1.1.jpg'];
var descriptions = ['Description of Picture1', 'Description of Picture2'];

function changeImage() {
    var img = document.getElementById('campusImage');
    var desc = document.getElementById('imageDescription');
    
    
    // Change to the next image and description
    imageIndex = (imageIndex + 1) % images.length;
    img.src = images[imageIndex];
    desc.innerHTML = descriptions[imageIndex];
}
