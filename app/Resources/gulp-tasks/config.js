"use strict";

var makePath = (root, obj) => {
    for (let value in obj) {
        obj[value] = root + obj[value];
    }
    return obj;
};

var basedir = './';
var config = {
    dev: makePath(basedir + 'app/', {
        root: '',
        i18n: 'src/i18n',
        html: 'views/',
        sass: 'src/scss/',
        js: 'src/js/',
        svg: 'src/svg/',
        media: 'src/assets/img/',
        fonts: 'src/assets/fonts/'
    }),
    prod: makePath('../../web/', {
        root: '',
        html: '',
        css: 'css/',
        js: 'js/',
        svg: 'svg/',
        media: 'img/',
        fonts: 'webfonts/'
    }),
    isProduction : function() {
        return process.env.NODE_ENV == 'production';
    }
};


module.exports = config;
