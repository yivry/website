install: vendor/autoload.php

clean:
	rm -rf cache/*

dev:
	DEV=1 php -S localhost:8888 -t public/

no-dev: clean
	php -S localhost:8888 -t public/

deploy:
	@echo "Executing remote deploy"
	@ssh yivry "bash -lc \"cd yivry.com && ./newrelease\""

vendor/autoload.php: composer.lock composer.json
	@composer install
	@touch -c vendor/autoload.php

stan: vendor/autoload.php
	@vendor/bin/phpstan analyze

cs-fix: vendor/autoload.php
	@vendor/bin/php-cs-fixer fix -v

cs-fix-all: vendor/autoload.php
	@vendor/bin/php-cs-fixer fix -v --using-cache=no
