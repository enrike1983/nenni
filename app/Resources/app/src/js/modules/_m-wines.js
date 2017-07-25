import TweenLite from 'gsap';
import isTouch from '../helpers/_h-isTouch.js'

let carousel,slides,canScroll,normalScroll;
let scrollings = [];
let prevTime;
var i = 0;

const getAverage = (elements, number) => {
    var sum = 0;
    var lastElements = elements.slice(Math.max(elements.length - number, 1));

    for(var k = 0; k < lastElements.length; k++){
        sum = sum + lastElements[k];
    }

    return Math.ceil(sum/number);
}

const getScrollTop = () => {
    if(typeof pageYOffset!= 'undefined') {
        return pageYOffset;
    }
    else{
        var B = document.body;
        var D = document.documentElement;
        D= (D.clientHeight)? D: B;
        return D.scrollTop;
    }
}

const init = ()=>{
    carousel = document.querySelector('.m-wine-carousel');
    slides = carousel.querySelectorAll('.m-wine-carousel__slide:not(.m-wine-carousel__slide--intro)');
    if(!carousel) return;
    canScroll = true;
    normalScroll = false;
    i = -1;    
    attachEvents();
}

const onScroll = () => {
    // if(getScrollTop() <= 0) {
    //     document.body.classList.add('lock');
    //     // kidsWrapperEl.style.position = 'fixed';
    //     normalScroll = false;
    // } else {
    //     // scrollerMenu.classList.remove('active')
    // }
}

const onWheel = (e) => {

    e.preventDefault();

    if(normalScroll) return;

    var curTime = new Date().getTime();

    e = e || window.event;
    var value = e.wheelDelta || -e.deltaY || -e.detail;
    var delta = Math.max(-1, Math.min(1, value));

    if(scrollings.length > 149){
        scrollings.shift();
    }

    scrollings.push(Math.abs(value));

    var timeDiff = curTime-prevTime;
    prevTime = curTime;

    if(timeDiff > 200){
        scrollings = [];
    }

    if(canScroll){
        var averageEnd = getAverage(scrollings, 10);
        var averageMiddle = getAverage(scrollings, 70);
        var isAccelerating = averageEnd >= averageMiddle;

        if(isAccelerating){
            if (delta < 0) {
                slideNext();
            }else {
                slidePrev();
            }
        }
    }

    return false;
}


const gotoSlide = (dir) => {

    if(!canScroll) return;

    canScroll = false;

    var sign = dir == 'next' ? 1 : -1;

    var currentSlide = slides[i]
    var wineId = currentSlide.querySelector('.m-wine-sheet__id');
    var wineBottle = currentSlide.querySelector('.m-wine-sheet__bottle');
    var wineInfo = currentSlide.querySelector('.m-wine-sheet__info');

    var nextSlide = slides[i+sign]
    var nextSlideWineId = nextSlide.querySelector('.m-wine-sheet__id');
    var nextSlideWineBottle = nextSlide.querySelector('.m-wine-sheet__bottle');
    var nextSlideWineInfo = nextSlide.querySelector('.m-wine-sheet__info');

    var tl = new TimelineMax({
        onComplete : () => {
            canScroll = true;
            i += sign;
            // console.log('completed',i);
        }
    });

    tl

    .to(wineId, .6, {
        y:(-sign*50),
        opacity: 0,
        ease: Power1.easeIn
    })

    .to(wineInfo, .6, {
        y:-sign*50,
        opacity: 0,
        ease: Power2.easeIn
    },'-=.8')

    .to(wineBottle, .5, {
        x:-sign*10,
        opacity: 0,
        ease: Power2.easeIn
    },'+=.1')

    .fromTo(nextSlideWineBottle, .7, {
        x:sign*10,
        opacity: 0
    },{
        x:0,
        opacity: 1,
        ease: Power2.easeOut
    },'+=.2')

    .fromTo(nextSlideWineId, .5, {
        y:sign*50,
        opacity: 0,
    },{
        y:0,
        opacity: 1,
        ease: Power2.easeOut
    })

    .fromTo(nextSlideWineInfo, .5, {
        y:sign*50,
        opacity: 0,
    },{
        y:0,
        opacity: 1,
        ease: Power2.easeOut
    },"-=.9")
}

const slideNext = () => {
    if(i == -1) {
        if(!canScroll) return;

        canScroll = false;
        var nextSlide = slides[0]
        var nextSlideWineId = nextSlide.querySelector('.m-wine-sheet__id');
        var nextSlideWineBottle = nextSlide.querySelector('.m-wine-sheet__bottle');
        var nextSlideWineInfo = nextSlide.querySelector('.m-wine-sheet__info');

        var tl2 = new TimelineMax({
            onComplete : () => {
                canScroll = true;
                i=0;
            }
        });

        tl2

        .fromTo(carousel, 2, {
            y : 0
        }, {
            y : -window.innerHeight,
            ease : Power4.easeIn,
        })

        .fromTo(nextSlideWineBottle, .6, {
            x:-10,
            opacity: 0
        },{
            x:0,
            opacity: 1,
            ease: Power2.easeOut
        })

        .fromTo(nextSlideWineId, .6, {
            y:50,
            opacity: 0
        },{
            y:0,
            opacity: 1,
            ease: Power2.easeOut
        })

        .fromTo(nextSlideWineInfo, .5, {
            y:50,
            opacity: 0
        },{
            y:0,
            opacity: 1,
            ease: Power2.easeOut
        },"-=.9")

    } else {
        if(i < slides.length-1 && i >=0) {
            gotoSlide('next');
        } else {
            if(!isTouch) {
                // document.body.classList.remove('lock');
                // normalScroll = true;
            }
        }
    }
}

const slidePrev = () => {
    console.log(i);
    if(i>0) {
        gotoSlide('prev');
    }
}


const attachEvents = () => {
    if(!isTouch){
        window.addEventListener('scroll', onScroll);
        window.addEventListener('wheel', onWheel);
    }
}


export default () => {
    return {
        init    
    }
    
}


