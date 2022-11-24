
const selectImage = document.querySelector('select-file');
const inputFile = document.querySelector('#file');
const imgArea = document.querySelector('.img-area');


inputFile.addEventListener('change', function(){

    if(document.contains(document.querySelector('.img-area img'))){
        document.querySelector('.img-area img').remove();
    }
    
    const image = this.files[0]
    console.log(image);
    const reader = new FileReader();
    reader.onload = ()=> {

        const imgUrl = reader.result;
        const img = document.createElement('img');
        img.src = imgUrl;
        imgArea.appendChild(img);
        imgArea.classList.add('active');
        imgArea.dataset.img =image.name;
        document.querySelector('.img-text').innerHTML = image.name;
    }
    reader.readAsDataURL(image);
})

