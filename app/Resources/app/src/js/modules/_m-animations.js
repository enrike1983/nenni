import TweenLite from 'gsap'
// import inView from 'inview'
import inView from 'in-view'
import VanillaTilt from 'vanilla-tilt'

const Animations = function() {

    var _doc = document;

    inView.threshold(0.5);

    function _fadeLetters() {

        var _phrases = _doc.querySelectorAll('.a-fade-letter');


        if (_phrases) {

            inView('.a-fade-letter')
            .on('enter', el => {
                // el.classList.add('is-animated');
                Array.prototype.forEach.call(el.querySelectorAll('span'), function(_el, i){
                    TweenLite.to(_el, 2, {
                        opacity: 1,
                        y: 0,
                        delay: .1 * i
                    })
                });
            });

            Array.prototype.forEach.call(_phrases, function(phrase, i){
                var _wordList = phrase.textContent.split(" ");
                phrase.innerHTML = "";
                _wordList.forEach(function(el, i){
                    var _word = el.replace(/([^\x00-\x80]|\w)/g, "<span>$&</span>");
                    phrase.innerHTML += '<div>' + _word + '</div>';
                });
            });
        }

    }

    function _scaleOpacity() {
        inView('.a-scale-opacity')
        .on('enter', el => {
            TweenLite.to(el, 1, {
                opacity: 1,
                scale: 1
            });
        });
    }

    function _fadeIn() {
        inView('.a-fade-in')
        .on('enter', el => {
            TweenLite.to(el, 1.5, {
                opacity: 1,
                y: 0,
                rotation: 0,
                delay: .2
            });
        });
    }

    function _handlerVideo() {
        inView('.m-video-tag')
        .on('enter', el => {
            el.play();
        })
        .on('exit', el => {
            el.pause();
        });
    }

    function _tilt() {
        VanillaTilt.init(document.querySelector(".a-tilt"), {
            max: 5,
            speed: 100
        });
    }

    function _removeLoader(cb) {
        TweenLite.to('.m-preloader__loading', 1.5, {
            rotationY: '180deg',
            ease: Expo.easeInOut
        });
        TweenLite.to('.m-preloader__logo .m-logo', 1.5, {
            rotationY: 0,
            ease: Expo.easeInOut,
            onComplete: function(){
                TweenLite.to('.m-preloader', 1, {
                    opacity: 0,
                    display: 'none',
                    ease: Expo.easeInOut,
                    onComplete: function(){
                        cb()
                    }
                })
            }
        })
    }

    function _init() {
        _tilt();
        _fadeIn();
        _fadeLetters();
        _scaleOpacity();
        _handlerVideo();
    }

    return {
        init: _init,
        removeLoader: _removeLoader
    }

}

export default Animations

