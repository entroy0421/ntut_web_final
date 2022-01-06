sudo rm /usr/local/bin/docker-compose
curl -L "https://github.com/docker/compose/releases/download/v2.2.2/docker-compose-$(uname -s)-$(uname -m)" > ./docker-compose
sudo mv ./docker-compose /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose
