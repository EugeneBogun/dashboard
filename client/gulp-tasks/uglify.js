"use strict";
(function () {
    //var gulp = require('gulp'),
    //    concat = require('gulp-concat'),
    //    replace = require('gulp-replace-task'),
    //    templateCache = require('gulp-angular-templatecache'),
    //    ngAnnotate = require('gulp-ng-annotate'),
    //    uglify = require('gulp-uglifyjs'),
    //    clean = require('gulp-clean'),
    //    argv = require('minimist')(process.argv),
    //    chmod = require('gulp-chmod');

// gulp watch --API_URL=http://mbugay.dev1.justcoded.com/xpertnews/wp-json

    //gulp.task('template_js', ['clean_tmp'], function (done) {
    //    gulp.src('./templates/**/*.html')
    //        .pipe(templateCache({standalone: true, root: 'templates/', module: 'feedsyApp.templates'}))
    //        .pipe(chmod(777))
    //        .pipe(gulp.dest('./tmp/js'))
    //        .on('end', done);
    //});

    //gulp.task('clean_js', function () {
    //    return gulp.src(['./www/js'], {read: false})
    //        .pipe(chmod(777))
    //        .pipe(clean());
    //});

    //gulp.task('concat_annotate_js', ['patch', 'clean_js', 'template_js'], function (done) {
    //
    //    gulp.src([
    //        './js/app.js',
    //        './js/factories/*.js',
    //        './js/factories.js',
    //        './js/services/*.js',
    //        './js/services.js',
    //        './js/controllers/modal/*.js',
    //        './js/controllers/*.js',
    //        './js/controllers.js',
    //        './js/directives/*.js',
    //        './js/directives.js',
    //        './js/filters.js'
    //    ])
    //        .pipe(concat('app.js'))
    //        .pipe(replace({
    //            patterns: [
    //                {
    //                    match: 'appPath',
    //                    replacement: "com.feedsy." + argv.appPath
    //                },
    //                {
    //                    match: 'appVersion',
    //                    replacement: require('../version.json').version
    //                },
    //                {
    //                    match: 'apiURL',
    //                    replacement: argv.apiURL
    //                },
    //                {
    //                    match: 'appName',
    //                    replacement: argv.appName
    //                },
    //                {
    //                    match: 'appGoogleAnalytics',
    //                    replacement: argv.appGoogleAnalytics
    //                },
    //                {
    //                    match: 'appGoogleProjectId',
    //                    replacement: argv.appGoogleProjectId
    //                },
    //                {
    //                    match: 'appPushWooshId',
    //                    replacement: argv.appPushWooshId
    //                }
    //            ]
    //        }))
    //        .pipe(ngAnnotate({single_quotes: true}))
    //        .pipe(gulp.dest('./tmp/js'))
    //        .on('end', done);
    //});


    //gulp.task('uglify_js', ['concat_annotate_js'], function (done) {
    //    gulp.src('./tmp/js/*.js')
    //        .pipe(uglify('common.min.js'))
    //        .pipe(gulp.dest('./www/js'))
    //        .on('end', done);
    //});

}());