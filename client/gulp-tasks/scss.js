"use strict";
(function () {
    var gulp = require('gulp'),
        sass = require('gulp-sass'),
        minifyCss = require('gulp-minify-css'),
        connect = require('gulp-connect'),
        clean = require('gulp-clean'),
        rename = require('gulp-rename');

    gulp.task('clean_css', function () {
        return gulp.src(['./www/css'], {read: false})
            .pipe(clean());
    });

    gulp.task('app_sass', ['clean_css', 'vendors_sass'], function (done) {
        gulp.src(['./app/app.scss'])
            .pipe(sass({
                errLogToConsole: true
            }))
            .pipe(gulp.dest('./tmp/css/'))
            .pipe(rename({extname: '.min.css'}))
            .pipe(gulp.dest('./www/css/', {overwrite: true}))
            .pipe(connect.reload())
            .on('end', done);
    });

    gulp.task('vendors_sass', ['vendors_font_awesome'], function (done) {
        gulp.src([
            './app/vendors/*.scss'
        ])
            .pipe(sass({
                errLogToConsole: true
            }))
            .pipe(gulp.dest('./tmp/css/'))
            .pipe(minifyCss({
                keepSpecialComments: 0
            }))
            .pipe(rename({extname: '.min.css'}))
            .pipe(gulp.dest('./www/css/', {overwrite: true}))
            .pipe(connect.reload())
            .on('end', done);
    });


}());