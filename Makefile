.PHONY:  setup
clean:
	docker-compose up -d
.PHONY: clean
clean:
	docker-compose down --volumes --remove-orphans
	rm -rf ./docker/db/data
	rm -rf ./docker/db/my.cnf
	rm -rf ./docker/db/sql