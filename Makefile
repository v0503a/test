build:
	@docker compose build --no-cache

up:
	@docker compose up -d --force-recreate

down:
	@docker compose down --remove-orphans

start:
	@docker compose start

stop:
	@docker compose stop
