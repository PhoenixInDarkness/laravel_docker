const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/bootstrap.js', 'public/js')// Путь к вашему JS-файлу
    .js('resources/js/front.js', 'public/js')// Путь к вашему JS-файлу
    .js('resources/js/add-adsprofile.js', 'public/js')// Путь к вашему JS-файлу
    .sass('resources/sass/app.scss', 'public/css/scss.css') // Путь к вашему SCSS-файлу
    .css('resources/css/app.css', 'public/css/account.css') // Путь к вашему SCSS-файлу
    .css('resources/css/front.css', 'public/css/front.css') // Путь к вашему SCSS-файлу
    .options({
        processCssUrls: false // Отключение автоматической обработки URL-адресов в CSS
    })
    .autoload({ // Автозагрузка jQuery и Popper.js для Bootstrap
        jquery: ['$', 'window.jQuery', 'jQuery'],
        popper: ['Popper', 'window.Popper']
    });
