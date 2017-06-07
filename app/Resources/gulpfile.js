"use strict";

var gulp = require('gulp'),
    watch = require('gulp-watch'),
    config =  require('./gulp-tasks/config.js'),
    printSuccess = require('./gulp-tasks/printSuccess.js'),
    runSequence = require('run-sequence'),
    browserSync = require('browser-sync'),
    clean = require('gulp-clean');

var reload = browserSync.reload;

require('require-dir')('./gulp-tasks');

gulp.task('apply-prod-environment', function() {
    process.stdout.write("Setting NODE_ENV to 'production'" + "\n");
    process.env.NODE_ENV = 'production';
    if (process.env.NODE_ENV != 'production') {
        throw new Error("Failed to set NODE_ENV to PRODUCTION!");
    } else {
        printSuccess("Successfully set NODE_ENV to production",'');
    }
});

gulp.task('watch', ['sass','svgsprite','browserify', 'media', 'fonts'], function() {
    watch(config.dev.sass+'**/*.scss', { usePolling: true }, function() {
        gulp.start(['sass']);
    });
    watch(config.prod.html+'**/*.html', { usePolling: true }, reload);

    watch(config.dev.svg+'**/*.svg', { usePolling: true }, function() {
        gulp.start(['svgsprite']);
    });
    watch(config.dev.media+'**/*', { usePolling: true }, function() {
        gulp.start(['media','fonts']);
    });
});

gulp.task('default',['watch']);

gulp.task('clean', function () {
    return gulp.src('web', {read: false})
        .pipe(clean());
});

gulp.task('build', function(){
    runSequence(
        'clean',
        'apply-prod-environment',
        'browserify',
        'sass',
        'svgsprite',
        'media',
        'fonts',
        'uglify:js',
        'uglify:css',
        'uglify:html'
    );
});
