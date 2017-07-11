import TweenLite from 'gsap'

const Menu = function() {

    var _doc = document;
    var _menu = _doc.querySelector('.m-menu');

    function _setup() {
        _handleEvents();
    }

    function _handleEvents() {

        var _triggerOpen = _doc.querySelector('.m-header .m-hamburger');
        var _triggerClose = _doc.querySelector('.m-menu__close');

        _triggerOpen.addEventListener('click', function() {
            TweenLite.to(_menu, .3, {
                opacity: 1,
                display: 'block',
                scale: 1
            })
        });
        _triggerClose.addEventListener('click', function() {
            _hide()
        });
    }

    function getElementIndex(node) {
        var index = 0;
        while ( (node = node.previousElementSibling) ) {
            index++;
        }
        return index;
    }

    function _handleHover() {
        var _elements = document.querySelectorAll('.m-menu__box-list .a-fade-letter');

        Array.prototype.forEach.call(_elements, function(el, i){
            el.addEventListener("mouseover", function(e) {
                TweenLite.to('.m-bg-' + getElementIndex(this.parentNode), .3, {
                    opacity: 1
                })
            }, false);
            el.addEventListener("mouseout", function(e) {
                TweenLite.to('.m-menu__square-wrapper > div', .3, {
                    opacity: 0
                })
            }, false);
        });
    }


    function _init() {
        _setup();
        _handleHover();
        _handleEvents();
    }

    function _show() {
    }

    function _hide() {
        TweenLite.to(_menu, .3, {
            opacity: 0,
            scale: .99,
            display: 'none'
        })
    }


    return {
        init: _init,
        hide: _hide
    }

}()

export default Menu

