DOCKEREXECPHP=docker exec -it rickandmorty_php

start:
	./dc up -d
stop:
	./dc down
ps:
	./dc ps
test:
	${DOCKEREXECPHP} bin/phpunit
coverage:
	${DOCKEREXECPHP} bin/phpunit --coverage-html coverage
php:
	${DOCKEREXECPHP} sh
