import TweenLite from 'gsap';

const VideoFull = (function() {

    var throttle = function(type, name, obj) {
        obj = obj || window;
        var running = false;
        var func = function() {
            if (running) { return; }
            running = true;
             requestAnimationFrame(function() {
                obj.dispatchEvent(new CustomEvent(name));
                running = false;
            });
        };
        obj.addEventListener(type, func);
    };

    throttle("resize", "optimizedResize");

    function _init() {

        var _el = document.querySelector('.m-video-full video');

        if (_el) {
            _resize();
            window.addEventListener("optimizedResize", function() {
                _resize();
            });
        }
    }

    function _resize() {

        var mediaAspect = 16/9;
        var windowW = window.innerWidth;
        var windowH = window.innerHeight;
        var windowAspect = windowW/windowH;
        var _el = document.querySelector('.m-video-full video');

        windowW = window.innerWidth;
        windowH = window.innerHeight;
        windowAspect = windowW/windowH;

        if (windowAspect < mediaAspect) {
            TweenLite.set(_el, {
                width: windowH*mediaAspect,
                height: windowH,
                y: 0,
                x: -(windowH*mediaAspect-windowW)/2
            });
        } else {
            TweenLite.set(_el, {
                width: windowW,
                height: windowW/mediaAspect,
                y: -(windowW/mediaAspect-windowH)/2,
                x: 0
            });
        }
    }

    return {
        init: _init
    };

}());

export default VideoFull

