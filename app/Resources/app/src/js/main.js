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

var styles1 = [
      'color: #000'
    , 'display: block'
    , 'line-height: 28px'
    , 'padding: 10px 10px 10px 10px'
    , 'background: #fff'
    , 'font-weight: lighter'
].join(';');

var styles2 = [
      'color: white'
    , 'display: block'
    , 'line-height: 28px'
    , 'padding: 10px 10px 10px 10px'
    , 'background: #000'
    , 'font-weight: lighter'
].join(';');

console.log('')
console.log('%c Developed by', styles1);
console.log('%cwww.blendmodes.com', styles2);
console.log('')


var teamBlock = Team();
var productPage = Wines();

let timeoutDuration = 3000;

if(isTouch) {
    document.body.classList.add('touch');
} else {
    document.body.classList.add('no-touch');
}


const LoadTransition = Barba.BaseTransition.extend({
    start: function() {
        Promise
            .all([this.newContainerLoading, this.showPreloader()])
            .then(this.hidePreloader.bind(this));
    },
    showPreloader: function() {
        return new Promise((resolve,reject) => {
            TweenLite.fromTo('.m-preloader-page', 1.5, {
                y: '-100%',
            }, {
                y: '0%',
                ease: Expo.easeInOut,
                onComplete: () => {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                    Menu.fastHide();
                    resolve();
                }
            });
        })
    },
    hidePreloader: function() {
        var _this = this,
            _new  = this.newContainer,
            _old  = this.oldContainer;
        _old.style.display = 'none';
        _new.style.visibility = "visible";
        TweenLite.to('.m-preloader-page', 1.5, {
            y: '100%',
            ease: Expo.easeInOut,
            onComplete: () => {
                timeoutDuration = 0;
                _this.done();
            }
        });
    }
});

Barba.Pjax.getTransition = function() {
    var transitionObj = LoadTransition;
    return transitionObj;
};


Menu.init();
Header.init();
VideoFull.init();

const HomePage = Barba.BaseView.extend({
    namespace: 'homepage',
    onLeave: function() {
    },
    onEnter: function() {
        VideoFull.init();
        productPage.isActive() && productPage.destroy();
    },
    onEnterCompleted: function() {
        teamBlock.init();
        setTimeout(()=> {
            Animations().init();
            Animations().intro();
        }, timeoutDuration)
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
        setTimeout(()=> {
            Animations().init();
            Animations().intro();
        }, timeoutDuration)
    }
});

HomePage.init();
Products.init();
Barba.Pjax.start();
Barba.Prefetch.init();

window.onload = function() {

    var preloader = new Preloader({
        concurrency: 2
    })

    var counter = {score: 0};

    preloader.addProgressListener(function (loaded, length) {

        var preloaderDisplay = document.querySelector('.m-preloader__num');

        TweenLite.to(counter, 1, {
            score: loaded / length * 100,
            roundProps: "score",
            onUpdate: function(){
                preloaderDisplay.innerHTML = counter.score;
                TweenLite.to('.m-preloader__logo', 1, {
                    opacity: loaded / length
                })
            },
            ease: Quad.easeInOut
        });

    })

    preloader.addCompletionListener(() => {
        Animations().removeLoader(() => {

        });
    });
    preloader.start();

}

