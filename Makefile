VERSION=1.0
DIR=${PWD}

.PHONY: install test

install:
	composer install
test:
	@if [ -d $(DIR)/vendor ]; then \
		$(DIR)/vendor/bin/phpspec run; \
	else \
		composer install && $(DIR)/vendor/bin/phpspec run; \
	fi
