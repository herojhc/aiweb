@servers(['localhost' => '127.0.0.1'])

@story('deploy')
composer
setup
@endstory

@task('composer')
composer install --no-dev --optimize-autoloader
@endtask

@task('setup')
php artisan down
php artisan key:generate
php artisan passport:keys
php artisan up
@endtask

@task('start')
php artisan down
php artisan view:clear
php artisan clear-compiled
php artisan cache:clear
php artisan config:cache
php artisan up
@endtask

@task('migrate')
php artisan migrate --force
@endtask