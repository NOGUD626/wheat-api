.PHONY:  setup
setup:
	docker-compose up -d
	docker-compose exec app bash -c "cd /var/www/laravel-project && composer install"
	docker-compose exec app bash -c "cd /var/www/laravel-project && php -r \"copy('.env.example', '.env');\""
	docker-compose exec app bash -c "cd /var/www/laravel-project && php artisan key:generate"

.PHONY:  run
run:
	docker-compose up -d
	docker-compose exec app bash -c "cd /var/www/laravel-project && composer install"
	
.PHONY:  down
down:
	docker-compose down
	
.PHONY: clean
clean:
	docker-compose down --volumes --remove-orphans
	rm -rf ./docker/db/data
	rm -rf ./docker/db/my.cnf
	rm -rf ./docker/db/sql