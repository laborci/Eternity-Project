var gulp = require('gulp');
var prefixer = require('gulp-autoprefixer');
var less = require('gulp-less');
var glob = require("glob");
var frontend = require("./config/global/js/gulp-entry-points");
var uglifycss = require("gulp-uglifycss");
var googleWebFonts = require("gulp-google-webfonts");

gulp.task('default', function () {
	gulp.start('build');
	var source;
	for (source in frontend) {
		gulp.watch(source + '/**/*.less', function (event) {
			gulp.start('compile-less');
		});
	}
});

gulp.task('build', function () {
	gulp.start('fonts');
	gulp.start('compile-less');
});

gulp.task('fonts', function () {
	gulp.src('node_modules/@fortawesome/fontawesome-pro/webfonts/*').pipe(gulp.dest('public/dist/fonts/fontawesome'));

	for (var folder in frontend) {
		var options = {
			fontsDir: 'dist/fonts/google-fonts/',
			cssDir: 'dist/' + frontend[folder] + '/',
			cssFilename: 'google-fonts.css',
			outBaseDir: '',
			relativePaths: true,
		};

		gulp.src(folder + '/google-fonts')
			.pipe(googleWebFonts(options))
			.pipe(gulp.dest('public'));
	}
});


gulp.task('compile-less', function () {
	var entries = getEntries();
	var source;
	for (source in entries) {
		gulp
			.src(source)
			.pipe(less({
				paths:['./node_modules']
			}))
			.pipe(uglifycss({
				"maxLineLen": 80,
				"uglyComments": true
			}))
			.pipe(prefixer('last 2 versions', 'ie 9'))
			.pipe(gulp.dest('./public/dist/' + entries[source]));
	}
});

function getEntries() {
	var entries = {};
	var folder;
	for (folder in frontend) {
		Object.assign(entries, getFolderEntries(folder, frontend[folder]));
	}
	return entries;
}

function getFolderEntries(folder, target) {
	var items = {};
	var sources = glob.sync(folder + "/*.less");
	for (var source of sources) {
		items[source] = target;
	}
	return (items);
}