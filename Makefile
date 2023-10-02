lint:
	composer exec --verbose phpcs -- --standard=PSR12 app routes tests --ignore=app/Http/Controllers/Auth/ConfirmablePasswordController.php
stan:
	vendor/bin/phpstan analyse app