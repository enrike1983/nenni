"use strict";
var gutil = require('gulp-util');

var printError = function(task, message) {
    gutil.log(gutil.colors.white.bgRed.bold(task), gutil.colors.red(message));
    gutil.beep();
};

module.exports = printError;