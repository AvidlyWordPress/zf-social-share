
var gulp     = require('gulp');  
var sass     = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var rename   = require('gulp-rename');
var watch    = require('gulp-watch');

var input  = './styles/scss/**/*.scss';
var output = './styles/css/';

gulp.task('sass', function () {
  return gulp
  // Find all .scss files
  .src(input)
  // Run Sass on those files
  .pipe(sass())
  // Write the resulting CSS in the output folder
  .pipe(gulp.dest(output));
});

gulp.task('minify', function() {
  return gulp.src('./styles/css/style.css')
  .pipe(cleanCSS())
  .pipe(rename({
    suffix: '.min'
  }))
  .pipe(gulp.dest(output));
});

gulp.task('default',['sass', 'minify']);

gulp.task('watch', function() {
  return gulp
    // Watch the input folder for change,
    // and run `sass` task when something happens
    .watch(input, ['sass'])
    // When there is a change,
    // log a message in the console
    .on('change', function(event) {
      console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });
});