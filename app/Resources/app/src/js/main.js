import Barba from 'barba.js'
import TweenLite from 'gsap'
import Menu from './modules/_m-menu'
import Header from './modules/_m-header'
import isTouch from './helpers/_h-isTouch.js'
import VideoFull from './modules/_m-video-full'
import Animations from './modules/_m-animations'
import Wines from './modules/_m-wines'
import Preloader from 'preloader.js'
import Team from './modules/_m-team'

var teamBlock = Team();
var productPage = Wines();

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
            TweenLite.to('.m-preloader-page', 1.5, {
                y: 0,
                ease: Expo.easeInOut,
                onComplete: () => {
                    window.scrollTo(0, 0);
                    Menu.fastHide();
                    resolve()
                }
            })
            TweenLite.to('.m-preloader-page__wrapper', 1.5, {
                y: 0,
                ease: Expo.easeInOut,
                delay: .5
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
        setTimeout(()=> {

            TweenLite.to('.m-preloader-page__wrapper', 1.5, {
                y: '105%',
                ease: Expo.easeInOut,
            })
            TweenLite.to('.m-preloader-page', 1.5, {
                y: '105%',
                ease: Expo.easeInOut,
                delay: .5,
                onComplete: () => {
                    TweenLite.set('.m-preloader-page', {
                        y: '-105%',
                    });
                    TweenLite.set('.m-preloader-page__wrapper', {
                        y: '-105%',
                    });
                    setTimeout(()=>{
                        _this.done();
                    }, 1)
                }
            })

        }, 1000)
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
        VideoFull.init();
        productPage.isActive() && productPage.destroy();
    },
    onEnterCompleted: function() {
        console.log('onEnterCompleted');
        teamBlock.init();
        Animations().init();
        Animations().intro();
    }
});


const Products = Barba.BaseView.extend({
    namespace: 'products',
    onLeave: function() {
    },
    onEnter: function() {
        productPage.init();
    },
    onEnterCompleted: function() {
        console.log('onEnterCompleted');
        Animations().init();
        Animations().intro();
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

    preloader.addCompletionListener(() => {
        HomePage.init();
        Products.init();
        Barba.Pjax.start();
        Barba.Prefetch.init();
        VideoFull.init();
        setTimeout(()=> {
            Animations().removeLoader(() => {
                Animations().intro();
            });
        }, 1)
    });
    preloader.start();

}

