const browserSync = require('browser-sync').create();
const gulp = require('gulp');
const sass = require('gulp-sass');
const del = require('del');

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
        .pipe(gulp.dest('./css/js'));
});

gulp.task('styles', () => {
    return gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./css/'));
});


gulp.task('start', ()=> {
    return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/jquery/dist/jquery.min.js', 'node_modules/popper.js/dist/umd/popper.min.js'])
        .pipe(gulp.dest('css/js'));
});

gulp.task('clean', () => {
    return del([
        'css/main.css',
    ]);
});

gulp.task('watch', () => {
    gulp.watch('sass/**/*.scss', (done) => {
        gulp.series(['clean', 'styles'])(done);
    });

});

gulp.task('default', gulp.series(['browserSync','clean','js', 'styles', 'watch']));

