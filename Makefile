setup:
	docker-compose pull
	docker-compose build
	make seed
	docker-compose up -d
	cp pre-commit-hook .git/hooks/pre-commit
	chmod +x .git/hooks/pre-commit

seed:
	docker-compose up -d fm-mysql
	docker-compose up -d app
	docker-compose run --rm app composer install
	docker-compose run --rm app php artisan migrate --seed