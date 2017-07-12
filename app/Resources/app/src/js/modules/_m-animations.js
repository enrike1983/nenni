import TweenLite from 'gsap'
// import inView from 'inview'
import isTouch from '../helpers/_h-isTouch.js'
import inView from 'in-view'
import splitText from '../modules/_m-splittext'
import VanillaTilt from 'vanilla-tilt'
import parallaxMonitor from 'scrollmonitor-parallax'

const Animations = function() {

    var _doc = document;

    inView.threshold(0.05);

    function _parallax() {

        var _elements = _doc.querySelectorAll('.a-parallax');
        if (_elements) {
            Array.prototype.forEach.call(_elements, function(el, i){
                var child = el.querySelector('.a-parallax__child');
                var parallaxRoot = parallaxMonitor.create(el);
                var parallaxChild = parallaxRoot.add(child, {
                    start: {
                        y: -200,
                        scale: 1.3
                    },
                    end: {
                        y: 200,
                        scale: 1
                    }
                });
            });
        }

    }

    function _fadeLetters() {

        var _phrases = _doc.querySelectorAll('.a-fade-letter');
        var delay;

        if (_phrases) {

            inView('.a-fade-letter')
            .on('enter', phrase => {

                delay = phrase.getAttribute('data-delay') || 0;

                if (!phrase.classList.contains('is-animated')) {

                    var tl = new TimelineLite({
                            delay: delay*.5
                        }),
                        mySplitText = new SplitText(phrase, {type:"words, chars"}),
                        chars = mySplitText.chars;


                    phrase.style.opacity = 1;

                    tl.staggerFromTo(chars, 2,
                        {
                            opacity: 0,
                            y: 10
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
                scale: 1,
                ease: Expo.easeInOut
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

    function _showCta() {
        inView('.m-cta')
        .on('enter', el => {
            el.classList.add('is-animated');
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
        VanillaTilt.init(document.querySelectorAll(".a-tilt"));
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
        });
    }

    function _intro() {
        TweenLite.to('.m-intro-site .m-logo', 1, {
            y: "-200%",
            ease: Expo.easeInOut
        })
        // TweenLite.to('[data-intro-scale]', 1, {
        //     scale: 1,
        //     ease: Expo.easeInOut
        // })
    }

    function _init() {
        console.log('Animations init')
        console.log(isTouch)
        if (!isTouch) {
            _parallax();
            _tilt();
        }
        _fadeIn();
        _fadeLetters();
        _fadeWord();
        _staggerY();
        _scaleOpacity();
        _handlerVideo();
        _showCta();
    }

    return {
        init: _init,
        intro: _intro,
        removeLoader: _removeLoader
    }

}

export default Animations

