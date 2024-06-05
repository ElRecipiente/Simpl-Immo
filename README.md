# Simpl-Immo

TODO: description de l'app

## Development

### Requirements

- Docker
- Docker Compose

### Setup

```bash
cp .env.example .env
docker-compose up -d --build
```

To stop docker:

```bash
docker-compose down
```

to remove all docker containers:

- all stopped containers
- all networks not used by at least one container
- all images without at least one container associated to them
- all build cache

```bash
docker system prune -a
```

### Links

- App: `http://localhost:8000/`
- PhpMyAdmin : `http://localhost:8888/`

TODO: MySql links
