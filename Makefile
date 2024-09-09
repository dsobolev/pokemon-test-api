DOCKER = docker compose
PHP_CONT = $(DOCKER) exec laravel.test
SAIL =  vendor/bin/sail

.PHONY: artisan php up test

up:
	$(SAIL) up

php:
	$(PHP_CONT) php -a

artisan: ## example usage: make artisan c="make:controller"
	@$(eval c ?=)
	$(SAIL) artisan $(c)

test: ## example usage: make test OR make test f="path_to_test_file"
	@$(eval f ?=)
	$(SAIL) artisan test $(f) --testdox
