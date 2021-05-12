const browserSync = require('browser-sync').create();
const gulp = require('gulp');
const sass = require('gulp-sass');
const del = require('del');
const fileinclude = require('gulp-file-include');

gulp.task('fileinclude', function() {
   return gulp.src(['index.html'])
        .pipe(fileinclude({
            prefix: '@@',
            basepath: '@file'
        }))
        .pipe(gulp.dest('./'));
});

gulp.task('browserSync', () => {
    browserSync.init({
        server: {
            baseDir: "./"
        },
        notify: false, // Отключаем уведомления
        online: true // Режим работы: true или false
    });
});

gulp.task('js', () => {
    return gulp.src('js/**/*.js')
        .pipe(gulp.dest('./dist/js'));
});

gulp.task('styles', () => {
    return gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./dist/'));
});


gulp.task('start', ()=> {
    return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/jquery/dist/jquery.min.js', 'node_modules/popper.js/dist/umd/popper.min.js'])
        .pipe(gulp.dest('dist/js'));
});

gulp.task('clean', () => {
    return del([
        'dist/main.css',
    ]);
});

gulp.task('watch', () => {
    gulp.watch('sass/**/*.scss', (done) => {
        gulp.series(['clean', 'styles'])(done);
    });

});

gulp.task('default', gulp.series(['browserSync','clean','js', 'styles', 'watch']));

