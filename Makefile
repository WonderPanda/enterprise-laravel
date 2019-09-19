composer:
	docker container run --rm -v $(pwd):/app --user $(id -u):$(id -g) composer

artisan:
	docker container run --rm -v $(pwd):/app --user $(id -u):$(id -g) composer
