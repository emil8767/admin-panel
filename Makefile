lint:
	composer exec --verbose phpcs -- --standard=PSR12 app routes tests --ignore=app/Http/Controllers/Auth/ConfirmablePasswordController.php
stan:
	vendor/bin/phpstan analyse app
up:
	head -1 .env || cp .env.example .env || echo "File .env exists, it's ok"
	docker compose up -d --build --remove-orphans --wait
	docker-compose exec app composer install
	docker-compose exec app php artisan key:generate --ansi
	docker-compose exec app php artisan migrate
	echo "Service is ready"