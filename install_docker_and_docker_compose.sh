dnf config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo
dnf remove docker  docker-client  docker-client-latest  docker-common \
docker-latest docker-latest-logrotate docker-logrotatedocker-engine
wget https://download.docker.com/linux/fedora/30/x86_64/stable/Packages/containerd.io-1.2.6-3.3.fc30.x86_64.rpm
dnf install containerd.io-1.2.6-3.3.fc30.x86_64.rpm -y
dnf install docker-ce docker-ce-cli -y
dnf list docker-ce docker-ce-cli containerd.io
systemctl enable --now docker

sudo rm /usr/local/bin/docker-compose
curl -L "https://github.com/docker/compose/releases/download/v2.2.2/docker-compose-$(uname -s)-$(uname -m)" > ./docker-compose
sudo mv ./docker-compose /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose
