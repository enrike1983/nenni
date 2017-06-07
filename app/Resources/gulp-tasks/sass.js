"use strict";

var config = require('./config.js'),
    printError = require('./printError.js');

var gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    browserSync = require('browser-sync'),
    autoprefixer = require('gulp-autoprefixer');

gulp.task('sass', function(cb) {
    return gulp.src(config.dev.sass + '*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .on('error', (err) => {
            printError('styles', err.message);
            cb();
        })
        .pipe(autoprefixer({
            browsers: ['last 3 version', 'safari 7', 'ie 10', 'opera 12.1', 'ios 6', 'android 4']
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(config.prod.css))
        .pipe(browserSync.stream());
});