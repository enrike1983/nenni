"use strict";

var config = require('./config.js');
var gulp = require('gulp'),
    browserSync = require('browser-sync');

gulp.task('server', function () { 
	browserSync.init({
		logLevel: 'info',
        proxy: 'nenni.dev'
	});
});