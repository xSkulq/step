import gulp from 'gulp';
import webpackConfig from './webpack.config.js';
import webpack from 'webpack-stream';
import browserSync from 'browser-sync';
import notify from 'gulp-notify';
import plumber from 'gulp-plumber';
import eslint from 'gulp-eslint';
import sass from 'gulp-sass';
import sassGlob from 'gulp-sass-glob'

// gulpタスクの作成
// jsのコンパイル
gulp.task('build-js', function(cb){
  gulp.src('resources/js/app.js')
    .pipe(plumber({
      errorHandler: notify.onError("Error: <%= error.message %>")
    }))
    .pipe(webpack(webpackConfig))
    .pipe(gulp.dest('public/js/'))
    //.pipe(browserSync.reload({stream:true}))
    cb();
});
// cssのコンパイル
gulp.task('build-css', function(cb){
  gulp.src('resources/sass/app.scss')
    .pipe(plumber({
      errorHandler: notify.onError("Error: <%= error.message %>")
    }))
    .pipe(sassGlob())
    .pipe(sass())
    .pipe(gulp.dest('public/css/'))
    //.pipe(browserSync.reload({stream:true}))
    cb();
});
gulp.task('browser-sync', function(cb) {
  const browserSyncOption = {
    proxy: "homestead.test", // 仮想環境のポート
	}
  browserSync.init(browserSyncOption);
  cb();
});
// 自動でリロードするもの
/*gulp.task('bs-reload', function (cb) { // リロードの前に処理が止まってしまう(調べたけれど分からなかったので作業がある程度終ったらもう一度調べる)
  browserSync.reload();
  cb();
});*/
gulp.task('eslint', function(cb) {
  return gulp.src(['resources/js/app.js']) // lint のチェック先を指定
    .pipe(plumber({
      // エラーをハンドル
      errorHandler: function(error) {
        const taskName = 'eslint';
        const title = '[task]' + taskName + ' ' + error.plugin;
        const errorMsg = 'error: ' + error.message;
        // ターミナルにエラーを出力
        console.error(title + '\n' + errorMsg);
        // エラーを通知
        notify.onError({
          title: title,
          message: errorMsg,
          time: 3000
        });
      }
    }))
    .pipe(eslint({ useEslintrc: true })) // .eslintrc を参照
    .pipe(eslint.format())
    .pipe(eslint.failOnError())
    .pipe(plumber.stop());

    cb();
});

// Gulpを使ったファイルの監視
gulp.task('default', gulp.series( gulp.parallel('build-js','build-css','browser-sync','eslint'), function(cb){
  gulp.watch('./resources/js/app.js', gulp.task('build-js'));
  gulp.watch('./resources/sass/app.scss', gulp.task('build-css'));
  gulp.watch('./resources/sass/**/*.scss', gulp.task('build-css'));
  gulp.watch('./resources/sass/object/**/*.scss', gulp.task('build-css'));
  gulp.watch('./resources/sass/**/*', gulp.task('build-css'));
  //gulp.watch("./resources/views/*.blade.php", gulp.task('bs-reload'));
  //gulp.watch("./public/css/app.css", gulp.task('bs-reload'));
  //gulp.watch("./public/**/*.+(js|css)", gulp.task('bs-reload'));
  gulp.watch("./resources/js/app.js", gulp.task('eslint'));
  cb();
}));