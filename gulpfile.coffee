gulp = require 'gulp'
stylus = require 'gulp-stylus'
concat = require 'gulp-concat'
autoprefixer = require 'gulp-autoprefixer'
jade = require 'gulp-jade'
sourcemaps = require 'gulp-sourcemaps'
uncss = require 'gulp-uncss'
webserver = require 'gulp-webserver'
watch = require 'gulp-watch'
del = require 'del'


gulp.task 'jade', ->
	return gulp.src './public/temp/**/*.jade'
		.pipe do jade
		.pipe gulp.dest './develop'

gulp.task 'stylus', ->
	return gulp.src './public/styles/**/*.styl'
		.pipe concat 'style.styl'
		.pipe do sourcemaps.init
		.pipe do stylus
		.pipe do sourcemaps.write
		.pipe uncss {
			html: ['./develop/index.html']
		}
		.pipe autoprefixer {
			browsers: ['last 5 versions']
		}
		.pipe gulp.dest './develop/css'

gulp.task 'watch', ->
	gulp.watch './public/styles/**/*.styl', ['stylus']
	gulp.watch './public/temp/**/*.jade', ['jade']
	return

gulp.task 'webserver', ->
	return gulp.src './'
		.pipe webserver {
			livereload: true,
			directoryListing: true,
			open: true
		}

gulp.task 'default', ['webserver', 'watch']