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


Menu.init();
Header().init();

const HomePage = Barba.BaseView.extend({
    namespace: 'homepage',
    onLeave: function() {
    },
    onEnter: function() {
        // TweenLite.to('.m-intro-site .m-logo', 1.5, {
        //     y: "-200%",
        //     ease: Expo.easeInOut
        // })
    },
    onEnterCompleted: function() {
        console.log('asd')
    }
});

window.onload = function() {

    var preloader = new Preloader({
        resources: [
            'https://source.unsplash.com/random/800x650',
            'https://source.unsplash.com/random/800x610',
            'https://source.unsplash.com/random/770x610',
            'https://source.unsplash.com/random/710x610',
            'https://source.unsplash.com/random/720x610',
            'https://source.unsplash.com/random/730x610',
            'https://source.unsplash.com/random/740x610',
            'https://source.unsplash.com/random/790x610'
        ],
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
            },
            ease: Quad.easeInOut
        });

    })

    preloader.addCompletionListener(function () {
        HomePage.init();
        Barba.Pjax.start()
        Barba.Prefetch.init();
        VideoFull.init()
        setTimeout(()=> {
            Animations().removeLoader(function(){
                Animations().init();
                TweenLite.to('.m-intro-site .m-logo', 1, {
                    y: "-200%",
                    ease: Expo.easeInOut
                })
            });
        }, 1)
    })
    preloader.start()
}

