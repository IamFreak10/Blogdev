<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Perfect Slider</title>

<style>
body{
    margin:0;
    font-family: Arial;
}

.templete{
    width:960px;
    margin:0 auto;
}

.clear{
    overflow:hidden;
}

.slidersection{
    position: relative;
    width: 960px;
    height: 350px;
    overflow: hidden;
}

/* Slides container */
.slides{
    display: flex;
    height: 100%;
    transition: transform 0.6s ease-in-out;
}

/* Each image full width */
.slides img{
    width: 960px;
    height: 350px;
    object-fit: cover;
    flex-shrink: 0;
}

/* Buttons */
.prev, .next{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,0.5);
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 18px;
}

.prev{ left: 15px; }
.next{ right: 15px; }

.prev:hover, .next:hover{
    background: rgba(0,0,0,0.8);
}
</style>
</head>

<body>

<div class="slidersection templete clear">

    <div class="slides" id="slides">
        <img src="images/slide/01.jpg" alt="">
        <img src="images/slide/02.jpg" alt="">
        <img src="images/slide/03.jpg" alt="">
    </div>

    <button class="prev" onclick="prevSlide()">❮</button>
    <button class="next" onclick="nextSlide()">❯</button>

</div>

<script>
let currentIndex = 0;
const slides = document.getElementById("slides");
const totalSlides = slides.children.length;
const slideWidth = 960;

function updateSlide() {
    slides.style.transform = "translateX(-" + (currentIndex * slideWidth) + "px)";
}

function nextSlide() {
    currentIndex++;
    if(currentIndex >= totalSlides){
        currentIndex = 0;
    }
    updateSlide();
}

function prevSlide() {
    currentIndex--;
    if(currentIndex < 0){
        currentIndex = totalSlides - 1;
    }
    updateSlide();
}
</script>

</body>
</html>