"use strict";
(function () {
    var gulp = require('gulp'),
        connect = require('gulp-connect'),
        open = require('gulp-open');

    gulp.task('default', [ 'watch' ]);
    gulp.task('app', [  'app_sass', 'app_js','index']);
    gulp.task('vendors', [ 'vendors_sass', 'vendors_js' ]);

    gulp.task('watch', ['connect'], function () {
        gulp.watch('./app/app.html', ['index']);
        gulp.watch([
            './app/*.scss',
            './app/**/*.scss',
            './app/**/**/*.scss'
        ], ['app_sass']);
        gulp.watch([
            './app/app.js',
            './app/controllers/*.js',
            './app/controllers/**/*.js',
            './app/factories/*.js'
        ], ['app_js']);
        gulp.watch([
            './app/controllers/*.html',
            './app/controllers/**/*.html'
        ], ['app_js']);
    });

    gulp.task('connect', ['app', 'vendors'], function () {
        var port = 8002;
        connect.server({
            livereload: true,
            port: port,
            root: './www'
        });
        gulp.src('./')
            .pipe(open({uri: 'http://localhost:' + port}));
    });
}());