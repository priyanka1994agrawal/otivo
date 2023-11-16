# OTIVO

## Prerequisite
```
Docker desktop, GIT
```

## Install backend composer dependecies
```
cd app/
```
```
composer install
```

## VUE project setup
```
cd vue/
```
```
npm install
```

## Project build via docker
Run this command to RUN/START the project locally

`Make sure you are in the root directory where Makefile is present.`
```
make otivo-up
```
Once the above command is successfully run then open `http::/localhost:8080` in any browser to see the Accomodation listing in VUE JS

Run this command to STOP the project locally
```
make otivo-down
```

## PHP Unit test
```
cd app/
```
```
vendor/bin/phpunit tests/ApiServiceTest.php
```