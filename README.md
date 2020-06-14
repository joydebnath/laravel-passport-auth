## Set up Laravel/Passport
Run the following command

```sh
php artisan passport:install
```

It will generate two clients. We need to store the second client's details

Update the .env file with the following details

##### Web_Password_Grant_Client_ID={CLIEND_ID}

##### Web_Password_Grant_Client_SECRET={CLIENT_SECRET}

## How to IOS and Android Clients

Run the following command two times

```sh
php artisan passport:client --password
```

Update the .env file with the following details

#####  IOS_Password_Grant_Client_ID={CLIEND_ID}
#####  IOS_Password_Grant_Client_SECRET={CLIENT_SECRET}

#####  Android_Password_Grant_Client_ID={CLIEND_ID}
#####  Android_Password_Grant_Client_SECRET={CLIENT_SECRET}