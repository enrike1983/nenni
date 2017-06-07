"use strict";
var gutil = require('gulp-util');

var printSuccess = function(task, message) {
    gutil.log(gutil.colors.white.bgGreen.bold(task), gutil.colors.green(message));
};

module.exports = printSuccess;