"use strict";

var gulp = require('gulp'),
    browserify = require('browserify'),
    babelify = require('babelify'),
    printError = require('./printError.js'),
    printSuccess = require('./printSuccess.js'),
    source = require('vinyl-source-stream'),
    browserSync = require('browser-sync'),
    reload = browserSync.reload,
    config =  require('./config.js');

gulp.task('browserify', function() {
    var b = browserify({
        debug: true,
        entries: config.dev.js+'main.js',
        paths: [config.dev.js],
        extensions: ['.js'],
        cache: {},
        packageCache: {},
        transform: [
            babelify.configure({
                presets: ["es2015"]
            })
        ]
    });

    var bundle = function() {
        return b.bundle()
            .on('error', (err) => {
                printError('browserify', err.message);
            })
        .pipe(source('app.js'))
        .pipe(gulp.dest(config.prod.js))
        .pipe(reload({stream: true}));
    };

    if(!config.isProduction()) {
        b.plugin('watchify', {poll: true})
        .on('update', bundle)
        .on("log", (message) => {
            printSuccess('browserify', message);
        });
    }

    return bundle();
});
