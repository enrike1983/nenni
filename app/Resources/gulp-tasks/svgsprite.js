"use strict";

var config = require('./config.js');
var gulp = require('gulp'),
    svgstore = require('gulp-svgstore'),
    rename = require('gulp-rename'),
    svgmin = require('gulp-svgmin');

gulp.task('svgsprite', function() {
    return gulp.src(config.dev.svg + '*.svg')
        .pipe(svgmin())
        .pipe(svgstore({
            inlineSvg: true
        }))
        .pipe(rename('sprite.svg'))
        .pipe(gulp.dest(config.prod.svg))
        .pipe(gulp.dest(config.dev.html+'/svg'));
});
