import TweenLite from 'gsap'
// import inView from 'inview'
import inView from 'in-view'
import splitText from '../modules/_m-splittext'
import VanillaTilt from 'vanilla-tilt'

const Animations = function() {

    var _doc = document;

    inView.offset(10);

    function _fadeLetters() {

        var _phrases = _doc.querySelectorAll('.a-fade-letter');

        if (_phrases) {

            inView('.a-fade-letter')
            .on('enter', phrase => {

                if (!phrase.classList.contains('is-animated')) {

                    var tl = new TimelineLite,
                        mySplitText = new SplitText(phrase, {type:"words, chars"}),
                        chars = mySplitText.chars;

                    phrase.style.opacity = 1;

                    tl.staggerFromTo(chars, 2,
                        {
                            opacity: 0,
                            y: 10,
                        },
                        {
                            opacity: 1,
                            y: 0,
                        }, .1);

                    phrase.classList.add('is-animated');

                }

            });

        }

    }

    function _fadeWord() {

        var _phrases = _doc.querySelectorAll('.a-fade-word');

        if (_phrases) {

            inView('.a-fade-word')
            .on('enter', phrase => {

                if (!phrase.classList.contains('is-animated')) {

                    var tl = new TimelineLite,
                        mySplitText = new SplitText(phrase, {type:"words"}),
                        words = mySplitText.words;

                    phrase.style.opacity = 1;

                    tl.staggerFromTo(words, 2,
                        {
                            opacity: 0,
                            y: 10,
                        },
                        {
                            opacity: 1,
                            y: 0,
                        }, .2, "+=.2");

                    phrase.classList.add('is-animated');

                }

            });

        }

    }

    function _staggerY() {

        var _elements = _doc.querySelectorAll('.a-stagger-y');

        if (_elements) {

            inView('.a-stagger-y')
            .on('enter', element => {

                if (!element.classList.contains('is-animated')) {

                    var tl = new TimelineLite;
                    var _elementsChild = element.querySelectorAll('.a-stagger-y__el');

                    tl.staggerTo(_elementsChild, 1,
                        {
                            y: 0
                        }, .2, "-=.7");

                    element.classList.add('is-animated');

                }

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
        _fadeWord();
        _staggerY();
        _scaleOpacity();
        _handlerVideo();
    }

    return {
        init: _init,
        removeLoader: _removeLoader
    }

}

export default Animations

