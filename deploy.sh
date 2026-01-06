set -e

echo "Running deploy script on remote host: $(hostname)"

cd "${{ secrets.APP_PATH }}"

echo "Deploying branch: main"

git fetch --all --prune
git reset --hard origin/main

touch database/database.sqlite

composer install --no-interaction --prefer-dist --no-dev --optimize-autoloader

php artisan migrate --force
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

chmod -R 775 storage bootstrap/cache

git --no-pager log -1 --pretty=oneline

echo "The app has been built and deployed!"
