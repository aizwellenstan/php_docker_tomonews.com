all: help

help:
	@echo ""
	@echo "-- Help Menu"
	@echo ""
	@echo "   1. make run                - Start Container Use default setting (listen web on 8080 , ssh on 8022)"


run:
	@sh clean_folder.sh
	@echo "Start Container Use default setting (listen web on 8080)"
	# @docker-compose up -d
	@docker-compose up -d --build
	# @docker-compose exec php-fpm composer install
	# @docker-compose exec php-fpm ln -s /var/www/html/storage/external /var/www/html/public/storage
	# @docker-compose exec php-fpm sh /var/www/html/seed.sh

clean:
	docker rm -f $(docker ps -q -a)