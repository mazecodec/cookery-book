.PHONY: help

CONTAINER_PHP=php
CONTAINER_NODE=node
CONTAINER_DATABASE=database

VOLUME_DATABASE=cookery-book_db-vol

help: ## Print help.
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n\nTargets:\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-10s\033[0m %s\n", $$1, $$2 }' $(MAKEFILE_LIST)

ps: ## Show containers.
	@docker compose ps

up: # artisan-up yarn-dev
	@pwsh ./run.ps1 &

build: ## Build all containers
	@docker build --no-cache .

start: ## Start all containers
	@docker compose up --force-recreate -d

fresh: stop destroy build start ## Destroy & recreate all containers

stop: ## Stop all containers
	@docker compose stop

restart: stop start ## Restart all containers

destroy: stop ## Destroy all containers
	@docker compose down
#	@docker volume rm ${VOLUME_DATABASE};

cache: ## Cache project
	docker exec ${CONTAINER_PHP} php artisan view:cache
	docker exec ${CONTAINER_PHP} php artisan config:cache
	docker exec ${CONTAINER_PHP} php artisan event:cache
	docker exec ${CONTAINER_PHP} php artisan route:cache

cache-clear: ## Clear cache
	docker exec ${CONTAINER_PHP} php artisan cache:clear
	docker exec ${CONTAINER_PHP} php artisan view:clear
	docker exec ${CONTAINER_PHP} php artisan config:clear
	docker exec ${CONTAINER_PHP} php artisan event:clear
	docker exec ${CONTAINER_PHP} php artisan route:clear

migrate: ## Run migration files
	docker exec ${CONTAINER_PHP} php artisan migrate

migrate-fresh: ## Clear database and run all migrations
	docker exec ${CONTAINER_PHP} php artisan migrate:fresh --seed

npm-install: ## Install frontend assets
	docker exec ${CONTAINER_NODE} npm install

npm-dev: ## Compile front assets for dev
	docker exec ${CONTAINER_NODE} npm run dev

npm-prod: ## Compile front assets for dev
	docker exec ${CONTAINER_NODE} npm run build

logs: ## Print all docker logs
	docker compose logs -f

logs-php: ## Print all php container logs
	docker logs ${CONTAINER_PHP}

logs-node: ## Print all php container logs
	docker logs ${CONTAINER_NODE}

logs-database: ## Print all php container logs
	docker logs ${CONTAINER_DATABASE}

ssh-php: ## SSH inside php container
	docker exec -it ${CONTAINER_PHP} sh

ssh-node: ## SSH inside node container
	docker exec -it ${CONTAINER_NODE} sh

ssh-database: ## SSH inside database container
	docker exec -it ${CONTAINER_DATABASE} sh

test:
	docker exec ${CONTAINER_PHP} php artisan test

test-coverage:
	docker exec ${CONTAINER_PHP} php artisan test --coverage

test-unit:
	docker exec ${CONTAINER_PHP} php artisan test --unit

test-unit-coverage:
	docker exec ${CONTAINER_PHP} php artisan test --unit --coverage

test-feature:
	docker exec ${CONTAINER_PHP} php artisan test --feature

test-feature-coverage:
	docker exec ${CONTAINER_PHP} php artisan test --feature --coverage
