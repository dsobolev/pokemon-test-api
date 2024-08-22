DOCKER = docker compose
PHP_CONT = $(DOCKER) exec laravel.test
SAIL =  vendor/bin/sail

.PHONY: artisan php up

up:
	$(SAIL) up

php:
	$(PHP_CONT) php -a

artisan: ## example usage: make artisan c="make:controller"
	@$(eval c ?=)
	$(SAIL) artisan $(c)
