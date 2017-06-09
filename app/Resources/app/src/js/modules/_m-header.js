import TweenLite from 'gsap'

const Header = function() {

    var didScroll = false;
    var lastScrollTop = 0;
    var delta = 0;
    var _d = document;
    var _header = _d.querySelector('.m-header');


    function _init() {
        didScroll = false;
        lastScrollTop = 0;
        delta = 0;
        _d = document;
        _header = _d.querySelector('.m-header');
        _handleScroll();
    }


    function _hasScrolled() {

        var headerHeight = _header.offsetHeight;
        var st = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;

        if (Math.abs(lastScrollTop - st) <= delta)
            return;

        if (st > window.innerHeight/2) {
            _header.classList.add('is-active');
        } else {
            _header.classList.remove('is-active');
        }

        lastScrollTop = st;

    }

    function _handleScroll() {

        setInterval(function() {
            if (!didScroll) {
                _hasScrolled();
                didScroll = false;
            }
        }, 250);

    }


    return {
        init: _init
    }

}()

export default Header

