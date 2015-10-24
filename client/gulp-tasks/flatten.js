"use strict";
(function () {
    var gulp = require('gulp'),
        rename = require('gulp-rename'),
        connect = require('gulp-connect'),
        flatten = require('gulp-flatten');

    gulp.task('vendors_font_awesome', function (done) {
        gulp.src([
            './bower_components/font-awesome/fonts/*.*'
        ])
            .pipe(flatten())
            .pipe(gulp.dest('./www/fonts/font-awesome', {overwrite: true}))
            .on('end', done);
    });

    gulp.task('index', function() {

        return gulp.src("./app/app.html")
            .pipe(rename({ basename: "index"}))
            .pipe(gulp.dest("./www", {overwrite: true}))
            .pipe(connect.reload());

    });

}());
