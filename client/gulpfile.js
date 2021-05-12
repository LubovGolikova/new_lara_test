const browserSync = require('browser-sync').create();
const gulp = require('gulp');
const sass = require('gulp-sass');
const del = require('del');

const handlebars = require('gulp-compile-handlebars');
const rename = require('gulp-rename');

gulp.task('partials', function(){
    return gulp.src('./view/partials/*.hbs')
        .pipe(handlebars())
        .pipe(rename(function(path){
            path.extname = '.html';
        }))
        .pipe(gulp.dest('dist'));
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
        'dist/main.dist',
    ]);
});

gulp.task('watch', () => {
    gulp.watch('sass/**/*.scss', (done) => {
        gulp.series(['clean', 'styles'])(done);
    });

});

gulp.task('default', gulp.series(['browserSync','clean','js', 'styles', 'watch']));

