"use strict";

var gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    uglifycss = require('gulp-uglifycss'),
    htmlmin = require('gulp-htmlmin'),
    config =  require('./config.js');

gulp.task('uglify:js', function() {
    return gulp.src([config.prod.js+'/*.js'])
        .pipe(uglify())
        .pipe(gulp.dest(config.prod.js))
});

gulp.task('uglify:css', function() {
    return gulp.src([config.prod.css+'/*.css'])
        .pipe(uglifycss())
        .pipe(gulp.dest(config.prod.css))
});

gulp.task('uglify:html', function() {
  return gulp.src(config.prod.html+'/**/*.html')
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest(config.prod.html));
});
