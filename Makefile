clean:
	rm -r cache/*

dev:
	DEV=1 php -S localhost:8888 -t public/

no-dev:
	php -S localhost:8888 -t public/