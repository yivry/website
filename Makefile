clean:
	rm -rf cache/*

dev:
	DEV=1 php -S localhost:8888 -t public/

no-dev: clean
	php -S localhost:8888 -t public/

deploy:
	ssh yivry "bash -lc \"cd yivry.com && ./newrelease\""
