# Let install be the first
install: vendor/autoload.php

# The rest should be alphabetical

clean:
	rm -rf cache/*

cs-fix: vendor/autoload.php
	@vendor/bin/php-cs-fixer fix -v

cs-fix-all: vendor/autoload.php
	@vendor/bin/php-cs-fixer fix -v --using-cache=no

deploy:
	@echo "Executing remote deploy"
	@ssh yivry "bash -lc \"cd yivry.com && ./newrelease\""

dev:
	DEV=1 php -S localhost:8888 -t public/

no-dev: clean
	php -S localhost:8888 -t public/

stan: vendor/autoload.php
	@vendor/bin/phpstan analyze

vendor/autoload.php: composer.lock composer.json
	@composer install
	@touch -c vendor/autoload.php
