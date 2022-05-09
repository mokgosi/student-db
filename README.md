## Setup Instructions

The following instructions assumes that you are familiar with the following technologies and you have them installed and setup on you local environment if needed:

- Laravel 8/9
- PHP >= 8
- Mysql 8.0.28
- Laravel sail
- Docker 20
- Docker-Compose
- Node & NPM
- Git

### Clone the repo from github 
```
$ git clone https://github.com/mokgosi/student-db.git
```

### Install dependencies 
```
$ composer install
```

### (OPTIONAL) Run these commands to stop any running containers and services
```
$ sudo aa-remove-unknown
$ docker container kill $(docker ps -q) // kill all running containers
$ sudo systemctl start apparmor 
$ sudo apparmor_parser -r /var/lib/snapd/apparmor/profiles/*
$ sudo systemctl stop apache2
$ sudo /etc/init.d/mysql stop
```

### Setup containers and images
```
$ ./vendor/bin/sail up 
```

### Scaffold Breeze
```
$ ./vendor/bin/sail artisan breeze:install 
```

### Setup Environment variables file in your root directory
```
mv .env.example .env
```

### Setup application unique key
```
$ ./vendor/bin/sail key:generate 
```

### Database migration and seed
```
sail artisan migrate:fresh --seed
```

