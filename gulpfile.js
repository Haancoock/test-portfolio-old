var gulp = require('gulp'),
	browserSync = require('browser-sync');


	gulp.task('server', function(){
		browserSync({
			port: 3000,
			server:{
				baseDir: 'app'
			}
		});
	});

	gulp.task('watch', function(){
		gulp.watch([
			'app/css/**/*.css',
			'app/*.html',
			'app/js/**/*.js'

			]).on('change', browserSync.reload);
	});


	gulp.task('default', ['server', 'watch']);