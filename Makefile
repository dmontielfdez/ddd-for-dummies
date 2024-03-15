help: ## Prints this help.
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

start: ## Start all docker-compose
	@./vendor/bin/sail up -d
	@npm run dev

stop: ## Stop all docker-compose
	@./vendor/bin/sail stop

bash: ## Stop all docker-compose
	@./vendor/bin/sail bash

initDb: ## Run migrations
	@./vendor/bin/sail exec laravel.test php artisan migrate
	@./vendor/bin/sail exec laravel.test php artisan db:seed

phpstan:
	@./vendor/bin/sail exec laravel.test vendor/bin/phpstan analyse --memory-limit=2G --level 9 ./src -c phpstan.neon

composer:
	@./vendor/bin/sail composer install
