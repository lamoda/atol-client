DOCKER_IMAGE = atol-client-php

.PHONY: help build test test-unit test-functional test-integration lint lint-fix clean install

help:
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "  %-20s %s\n", $$1, $$2}' $(MAKEFILE_LIST)

build:
	docker build -t $(DOCKER_IMAGE) -f Dockerfile .

install:
	docker run --rm -v $(PWD):/app -w /app composer:latest install

test:
	docker run --rm -v $(PWD):/app -w /app $(DOCKER_IMAGE) ./vendor/bin/phpunit

test-unit:
	docker run --rm -v $(PWD):/app -w /app $(DOCKER_IMAGE) ./vendor/bin/phpunit tests/Unit

test-functional:
	docker run --rm -v $(PWD):/app -w /app $(DOCKER_IMAGE) ./vendor/bin/phpunit tests/Functional

test-integration:
	docker run --rm -v $(PWD):/app -w /app $(DOCKER_IMAGE) ./vendor/bin/phpunit tests/Integrational

lint:
	docker run --rm -v $(PWD):/app -w /app $(DOCKER_IMAGE) ./vendor/bin/php-cs-fixer fix --dry-run --diff --verbose

lint-fix:
	docker run --rm -v $(PWD):/app -w /app $(DOCKER_IMAGE) ./vendor/bin/php-cs-fixer fix --verbose

clean:
	-docker rmi $(DOCKER_IMAGE)
	-docker system prune -f
