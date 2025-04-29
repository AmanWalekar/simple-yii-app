# Yii2 Basic Application with Docker

This is a simple Yii2 application with Docker support for easy deployment.

## Requirements

- Docker
- Docker Compose

## Installation

1. Clone this repository
2. Run the following commands:

```bash
# Build and start the containers
docker-compose up -d

# Install Composer dependencies
docker-compose exec web composer install
```

## Accessing the Application

- Web application: http://localhost:8080
- Database: localhost:3306
  - Database name: yii2basic
  - Username: root
  - Password: root

## Development

The application is set up for development with:
- Yii2 Debug Toolbar
- Yii2 Gii (Code Generator)

## Production Deployment

For production deployment:
1. Set `YII_ENV=prod` in the docker-compose.yml file
2. Update the database credentials in config/db.php
3. Update the cookie validation key in config/web.php
4. Build and deploy the containers

## License

This project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT). 