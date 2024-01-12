db-no:
	docker-compose build --no-cache
db:
	docker-compose build
du:
	docker-compose up -d
dd:
	docker-compose down