import Barba from 'barba.js'
import TweenLite from 'gsap'
import Menu from './modules/_m-menu'
import Header from './modules/_m-header'
import isTouch from './helpers/_h-isTouch.js'
import VideoFull from './modules/_m-video-full'
import Animations from './modules/_m-animations'
import Preloader from 'preloader.js'


if(isTouch) {
    document.body.classList.add('touch');
} else {
    document.body.classList.add('no-touch');
}

var FadeTransition = Barba.BaseTransition.extend({

    start: function() {
        Promise
            .all([this.newContainerLoading, this.showPreloader()])
            .then(this.hidePreloader.bind(this));
    },
    showPreloader: function() {
        return new Promise(function(resolve){
            console.log('show')
            Menu.hide();
            TweenLite.to('.m-preloader', 1, {
                opacity: 1,
                display: 'block',
                onComplete: () => {
                    window.scrollTo(0, 0);
                    resolve()
                }
            })
        })
    },
    hidePreloader: function() {
        console.log('hide')
        var _this = this,
            _new  = this.newContainer,
            _old  = this.oldContainer;
        _old.style.display = 'none';
        _new.style.visibility = "visible";
        TweenLite.to('.m-preloader', 1, {
            opacity: 0,
            display: 'none',
            onComplete: () => {
                _this.done();
            }
        })
    }

});

Barba.Pjax.getTransition = function() {
    var transitionObj = FadeTransition;
    return transitionObj;
};


Menu.init();
Header.init();

const HomePage = Barba.BaseView.extend({
    namespace: 'homepage',
    onLeave: function() {
    },
    onEnter: function() {
    },
    onEnterCompleted: function() {
    }
});

window.onload = function() {

    var _images = document.querySelectorAll('[data-preload]');
    var _resources = [];

    Array.prototype.forEach.call(_images, function(img, i){
        _resources.push(img.getAttribute('src'));
    });

    var preloader = new Preloader({
        resources: _resources,
        concurrency: 2
    })

    var counter = {score: 0};

    preloader.addProgressListener(function (loaded, length) {
        console.log(loaded, length)

        var preloaderDisplay = document.querySelector('.m-preloader__num');

        TweenLite.to(counter, 1, {
            score: loaded / length * 100,
            roundProps: "score",
            onUpdate: function(){
                preloaderDisplay.innerHTML = counter.score;
            },
            ease: Quad.easeInOut
        });

    })

    preloader.addCompletionListener(function () {
        HomePage.init();
        Barba.Pjax.start();
        Barba.Prefetch.init();
        VideoFull.init();
        setTimeout(()=> {
            Animations().removeLoader(function(){
                Animations().init();
                TweenLite.to('.m-intro-site .m-logo', 1, {
                    y: "-200%",
                    ease: Expo.easeInOut
                })
                TweenLite.to('[data-intro-scale]', 1, {
                    scale: 1,
                    ease: Expo.easeInOut
                })
            });
        }, 1)
    });
    preloader.start();

}

