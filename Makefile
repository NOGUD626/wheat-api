.PHONY:  setup
setup:
	@make run
	docker-compose exec app bash -c "cd /var/www/laravel-project && composer install"
	docker-compose exec app bash -c "cd /var/www/laravel-project && php -r \"copy('.env.example', '.env');\""
	docker-compose exec app bash -c "cd /var/www/laravel-project && php artisan key:generate"
	@make cache-clear
	@make migration
	@make down

.PHONY:  run
run:
	docker-compose up -d
	
.PHONY:  down
down:
	docker-compose down

.PHONY:  cache-clear
cache-clear:
	docker-compose exec -T app bash -c "cd /var/www/laravel-project && php artisan config:clear"
	docker-compose exec -T app bash -c "cd /var/www/laravel-project && php artisan cache:clear"
	docker-compose exec -T app bash -c "cd /var/www/laravel-project && php artisan route:clear"
	
.PHONY: clean
clean:
	docker-compose down --volumes --remove-orphans
	rm -rf ./docker/db/data
	rm -rf ./docker/db/my.cnf
	rm -rf ./docker/db/sql

.PHONY: migration
migration:
	docker-compose exec app bash -c "cd /var/www/laravel-project && php artisan migrate"
	docker-compose exec app bash -c "cd /var/www/laravel-project && php artisan db:seed"

.PHONY: dev-setup
dev-setup:
	docker-compose build app
	docker-compose build nginx
	docker-compose up -d app
	docker-compose up -d nginx
	docker-compose exec -T app bash -c "cd /var/www/laravel-project && composer install"
	docker-compose exec -T app bash -c "cd /var/www/laravel-project && php -r \"copy('.env.dev_example', '.env');\""
	docker-compose exec -T app bash -c "cd /var/www/laravel-project && php artisan key:generate"
	@make cache-clear
	@make down

.PHONY: dev-run
dev-run:
	docker-compose up -d nginx

.PHONY: dev-stop
dev-stop:
	docker stop nginx
	docker stop app
	docker rm -f `docker ps -a -q`
	docker rmi `docker images -q`