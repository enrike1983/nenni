import Barba from 'barba.js'
import TweenLite from 'gsap'
import Menu from './modules/_m-menu'
import Header from './modules/_m-header'
import isTouch from './helpers/_h-isTouch.js'
import VideoFull from './modules/_m-video-full'
import Animations from './modules/_m-animations'


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
    HomePage.init();
    Barba.Pjax.start()
    Barba.Prefetch.init();
    VideoFull.init()
    setTimeout(()=> {
        Animations().removeLoader(function(){
            Animations().init()
            // TweenLite.set('.m-intro-site .m-title', {
            //     opacity: 1
            // })
            TweenLite.to('.m-intro-site .m-logo', 1, {
                y: "-200%",
                ease: Expo.easeInOut
            })
        });
    }, 1)
}

