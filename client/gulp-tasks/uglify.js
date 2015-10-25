"use strict";
(function () {
    var gulp = require('gulp'),
        concat = require('gulp-concat'),
        connect = require('gulp-connect'),
        templateCache = require('gulp-angular-templatecache'),
        ngAnnotate = require('gulp-ng-annotate'),
        uglify = require('gulp-uglify'),
        clean = require('gulp-clean'),
        sourcemaps = require('gulp-sourcemaps');

    gulp.task('js', ['vendors_js', 'app_js']);

    gulp.task('template_js', [], function (done) {
        gulp.src([
            './app/controllers/*.html',
            './app/controllers/**/*.html'
        ])
            .pipe(templateCache({standalone: true, root: '/', module: 'app.templates'}))
            .pipe(gulp.dest('./tmp/js', {overwrite: true}))
            .pipe(connect.reload())
            .on('end', done);
    });

    gulp.task('clean_js', function () {
        return gulp.src(['./www/js'], {read: false})
            .pipe(clean());
    });

    gulp.task('vendors_js', ['clean_js'], function (done) {

        gulp.src([
            './bower_components/angular/angular.js',
            './bower_components/angular-resource/angular-resource.js',
            './bower_components/angular-route/angular-route.js',
            './bower_components/angular-sanitize/angular-sanitize.js'
        ])
            .pipe(concat('vendors.min.js'))
            .pipe(uglify())
            .pipe(gulp.dest('./www/js', {overwrite: true}))
            .pipe(connect.reload())
            .on('end', done);
    });

    gulp.task('app_js', ['template_js', 'clean_js', 'vendors_js'], function (done) {
        gulp.src([
            './app/app.js',
            './app/controllers/*.js',
            './app/controllers/**/*.js',
            './app/factories/*.js',
            './tmp/js/templates.js'
        ])
            .pipe(concat('app.min.js'))
            .pipe(ngAnnotate({single_quotes: true}))
            .pipe(sourcemaps.init())
            .pipe(uglify())
            .pipe(sourcemaps.write())
            .pipe(gulp.dest('./www/js', {overwrite: true}))
            .pipe(connect.reload())
            .on('end', done);
    });

}());