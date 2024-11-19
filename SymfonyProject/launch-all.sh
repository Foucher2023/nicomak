#!/bin/bash
docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)
docker-compose up -d

# Wait until MySQL is ready
echo "Waiting for MySQL to be ready..."
until docker exec mysql mysqladmin ping --silent; do
  sleep 1
done
echo "MySQL is ready."
echo "PhpMyadmin is ready."

# Now proceed with the rest of the commands
echo "Running setup tasks..."
cd ThanksPages/ || exit 1

# Remove vendor directory and reinstall dependencies
rm -rf vendor/
composer install

# Start Symfony server
./refresh-server.sh

# Run database reset script
./reset-Database.sh

echo "Setup complete."

