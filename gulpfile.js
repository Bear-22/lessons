//СБОРКА ДЛЯ  ЛОКАЛЬНОЙ ВЕРСТКИ на OpenServer
//!!!ВАЖНО в функции browsersync указать название домена

//https://webdesign-master.ru/blog/tools/gulp-4-lesson.html
//https://www.youtube.com/watch?v=stFOy0Noahg
//https://fls.guru/gulp.html
/*
* 1.Установить gulp:  npm i
* 2. если выдает ошибку по конвертеру webp картинок отдельно запустить : npm install webp-converter@2.2.3 --save-dev
* 3.конвертация шрифтов: полодить файлы .ttf сюда #src/assets/fonts/fonts_convert,
*    запустить конвертацию: gulp convert
* 4.импорт библиотек из node-modules: gulp modules
* 5.запуск проекта: gulp
*
* */

let fs = require('fs')
const {src, dest} = require('gulp'),
    gulp = require('gulp'),
    scss = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),
    browserSync = require("browser-sync").create(),
    uglify = require('gulp-uglify-es').default,
    autoprefixer = require('gulp-autoprefixer'),
    imagemin = require('gulp-imagemin'),
    del = require('del'),
    media = require('gulp-group-css-media-queries'),//собирает все медиа запросы в конец файла
    cleanCSS = require('gulp-clean-css'),//  сжимает css
    rename = require('gulp-rename'), // дублирует два файла сжатый и не сжатый
    webp = require('gulp-webp'),//Convert images to WebP
    //преобразовует тег img в picture и дублирует картинку в формат webp
    webpHTML = require('gulp-webp-html'),
    webpCss = require('gulp-webp-css'),
    fileinclude = require('gulp-file-include'),
    svgSprite = require('gulp-svg-sprite'),
    ttf2woff = require('gulp-ttf2woff'),
    ttf2woff2 = require('gulp-ttf2woff2'),
    ttf2eot = require('gulp-ttf2eot'),
    ttf2svg = require('gulp-ttf-svg');


let assets = 'assets';
let sourse = '#src';
let wp = 'assets';

let path = {
    build: {
        html:'/',
        css:'/assets/css/',
        js:'/assets/js/',
        img:'/assets/images/',
        fonts:'/assets/fonts/',
        lib:'/assets/lib/',
    },
    wp: {
        css: wp + '/css/',
        js: wp + '/js/',
        img: wp + '/img/',
        fonts: wp + '/fonts/',
        lib: wp + '/lib/',
    },
    src: {
        html: [sourse + '/**/*.html', '!' + sourse + '/**/_*.html'],
        php: './**/*.php',
        css: sourse + '/assets/scss/*.scss',

        js: sourse + '/assets/js/*.js',

        img: sourse + '/assets/img/**/*.{jpg,jpeg,png,svg,gif,ico,webp}',
        fontsTTF: sourse + '/assets/fonts/fonts_ttf/*.ttf',
        fontsConvert: sourse + '/assets/fonts/fonts_convert/*.{svg,eot,ttf,woff,woff2,otf}',
        lib: sourse + '/assets/lib/**/*.*',
        modul: sourse + '/assets/lib/',
    },
    watch: {
        html: sourse + '/**/*.html',
        php: './**/*.php',
        css: sourse + '/assets/scss/**/*.scss',
        js: sourse + '/assets/js/**/*.js',
        img: sourse + '/assets/images/**/*.{jpg,jpeg,png,svg,gif,ico,webp}',
        lib: sourse + '/assets/lib/**/*.*',
    },
    clean: ['./' + assets + '/']
}


function browsersync() {
    browserSync.init({
        proxy: 'lessons',// указать название хоста в опен сервере
    });

}

function html() {

    return src(path.src.html)
        .pipe(browserSync.stream())
}

function php() {
    return src(path.src.php)
        .pipe(browserSync.stream())
}


function styles() {
    return src(path.src.css)  // Берем файлы из источников
        .pipe(sourcemaps.init())
        .pipe(scss({outputStyle: 'expanded'}))  // Сжимаем scss
        .pipe(media())
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 3 versions'],
            grid: true
        }))

        .pipe(dest(path.wp.css)) //выгружаем не сжатый файл
        .pipe(cleanCSS())  //сжимаем файл
        .pipe(rename({
            extname: '.min.css'
        }))
        .pipe(dest(path.wp.css))  // Выгружаем сжатый готовый файл в папку назначения
        .pipe(sourcemaps.write(path.src.css))
        .pipe(browserSync.stream())
}



function scripts() {
    return src(path.src.js)
        .pipe(fileinclude())
        .pipe(dest(path.wp.js))
        .pipe(uglify())
        .pipe(rename({
            extname: '.min.js'
        }))                         //переименовуем файл
        .pipe(dest(path.wp.js))
        .pipe(browserSync.stream())
}



//library
function lib() {
    return src(path.src.lib)
        .pipe(dest(path.wp.lib))
        .pipe(browserSync.stream())
}


function images() {
    return src(path.src.img)
        .pipe(imagemin([
            imagemin.gifsicle({interlaced: true}),
            imagemin.mozjpeg({quality: 75, progressive: true}),
            imagemin.optipng({optimizationLevel: 5}),
            imagemin.svgo({
                plugins: [
                    {removeViewBox: true},
                    {cleanupIDs: false}
                ]
            })
        ]))
        .pipe(dest(path.wp.img))
        .pipe(browserSync.stream())
}

function fonts() {
    return src(path.src.fontsConvert)
        .pipe(dest(path.wp.fonts))
        .pipe(browserSync.stream())
}

function watchiFiles() {
    gulp.watch([path.watch.html], html);
    gulp.watch([path.watch.php], php);
    gulp.watch([path.watch.css], styles);
    gulp.watch([path.watch.js], scripts);
    //  включить при разработке на хостинге , на локалке включать только по окнчанию работ
    gulp.watch([path.watch.img], images);
    // gulp.watch([path.watch.lib], lib); //папка с библиотеками
}

function clean() {
    return del(path.clean, {
        force: true
    });
}


//convert fonts
gulp.task('convert', function () {
    src(path.src.fontsTTF)
        .pipe(dest(sourse + '/assets/fonts/fonts_convert/'))
        .pipe(ttf2woff())
        .pipe(dest(sourse + '/assets/fonts/fonts_convert/'))
    src(path.src.fontsTTF)
        .pipe(ttf2eot())
        .pipe(dest(sourse + '/assets/fonts/fonts_convert/'))
    src(path.src.fontsTTF)
        .pipe(ttf2svg())
        .pipe(dest(sourse + '/assets/fonts/fonts_convert/'))
    return src(path.src.fontsTTF)
        .pipe(ttf2woff2())
        .pipe(dest(sourse + '/assets/fonts/fonts_convert/'))
})

//sprite
gulp.task('svgSprite', function () {
    return gulp.src([sourse + 'iconsprite/*.svg'])
        .pipe(svgSprite({
            mode: {
                stack: {
                    sprite: '../icons/icon.svg', //file name
                    exampl: true
                }
            }
        }))
})


function fontsStyle(cb) {
    let file_content = fs.readFileSync(sourse + '/assets/scss/_fonts.scss');
    if (file_content == '') {
        fs.writeFile(sourse + '/assets/scss/_fonts.scss', '', cb);
        return fs.readdir(path.build.fonts, function (err, items) {
            if (items) {
                let c_fontname;
                for (var i = 0; i < items.length; i++) {
                    let fontname = items[i].split('.');
                    fontname = fontname[0];
                    console.log(fontname)
                    if (c_fontname != fontname) {
                        fs.appendFile(sourse + '/assets/scss/_fonts.scss', '@include font("' + fontname + '", "' + fontname + '", "400", "normal");\r\n', cb);
                    }
                    c_fontname = fontname;
                }
            }
        })
    }
    cb()
}


let build = gulp.series(clean, gulp.parallel(images, fonts, lib, styles, scripts,  html, php), fontsStyle);
let watch = gulp.parallel(build, watchiFiles, browsersync);

exports.php = php;
exports.html = html;
exports.build = build;
exports.watch = watch;
exports.default = watch;
exports.styles = styles;
exports.scripts = scripts;
exports.images = images;
exports.fontsStyle = fontsStyle;
exports.fonts = fonts;
exports.browsersync = browsersync;
exports.clean = clean;
exports.lib = lib;