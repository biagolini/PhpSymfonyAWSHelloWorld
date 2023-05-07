# Part 3 - AWS Deployment: Deploying the HelloWorld Symfony Application on an Amazon EC2 Instance

- [Introduction](#introduction)
- [Requirements](#requirements)
- [Creating an EC2 Instance](#creating-an-ec2-instance)
- [Configuring the Web Server](#configuring-the-web-server)
- [Get code](#get-code)
- [Install dependencies](#install-dependencies)
- [Testing the Deployed Application](#testing-the-deployed-application)
- [Next Steps](#next-steps)

[⬅️ Back to README.md](/README.md)

## Introduction

In this tutorial, we will explain the steps required to deploy the HelloWorld Symfony application on an Amazon EC2 instance. We will cover creating an EC2 instance, configuring the necessary environment (including web server), and deploying the application code.

## Requirements

- An AWS account with access to launch EC2 instances and configure security groups.
- Basic knowledge of AWS services and EC2 instances.
- SSH access to your EC2 instance using a key pair.
- Basic knowledge of Git and GitHub.

## Creating an EC2 Instance

Launch an Ubuntu EC2 instance in a public subnet.
Make sure that the security group attached to your instance allows public access (i.e., 0.0.0.0/0) to ports 443 and 80. Additionally, allow inbound access to port 22 from your IP address.

Use the following User Data while launching the instance:

```bash
#!/bin/bash
sudo apt update -y
sudo apt upgrade -y
sudo apt install -y awscli git apache2 php php-mysql php-zip unzip php-simplexml
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"
sudo curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash
sudo apt install symfony-cli
```

## Configuring EC2

SSH to your Instance using the following command, replacing INSTANCE-IP with your instance's public IP address and YourKey.pem with the path to your key pair file.

```bash
ssh ec2-user@INSTANCE-IP -i YourKey.pem
```

Check if your dependencies are correctly installed by running the following commands.

```bash
aws --version
git --version
apache2 -v
php --version
php -m # php extension
composer --version
symfony -V
```

## Configuring the Web Server

Create a new Apache configuration file by running the following command.

```bash
sudo nano /etc/apache2/sites-available/symfony.conf
```

Paste the following configuration into the file.

```
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/symfony/public

    <Directory /var/www/symfony/public>
        AllowOverride None
        Order Allow,Deny
        Allow from All

        FallbackResource /index.php
    </Directory>

    <Directory /var/www/symfony/public/bundles>
        FallbackResource disabled
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

Enable the new site configuration and disable the default one by running the following commands.

```ssh
sudo a2ensite symfony.conf
sudo a2dissite 000-default.conf
```

Restart the Apache service to apply the changes.

```
sudo systemctl restart apache2
```

## Get code

Clone your Symfony application from GitHub using the following commands. Replace the GitHub repository URL with the one you created at the end of [Part 2](part2-application-setup.md), or alternatively, use the provided code below to obtain the sample code shared in this tutorial.

NOTE: It is crucial to ensure that your code is compatible with the versions of PHP and Symfony installed on your EC2 instance. The sample code shared in this tutorial was written using PHP 8.2.5 and Symfony 5.5.4. To avoid potential issues, confirm that your application has been developed and tested using these same versions.

```
cd /var/www
sudo git clone https://github.com/biagolini/PhpSymfonyAWSHelloWorld symfony
sudo chown -R ubuntu:ubuntu /var/www/symfony
```

Before changing the permissions of the website directory and its contents, decide on the appropriate permission level for your server. Here are some examples and considerations:

- **chmod 644**: Assigning chmod 644 to files ensures that the owner has read and write permissions while other users only have read permissions. This is beneficial because it restricts unauthorized users from modifying the files, potentially compromising the security or functionality of the web application. However, some web applications might not function correctly if they require write or execute permissions for certain files. In such cases, manual adjustments to file permissions might be necessary.
- **chmod 755**: Assigning chmod 755 to directories allows the owner to have read, write, and execute permissions, while other users can only read and execute. This is important as it enables users to access and traverse directories without being able to modify their contents directly. On the other hand, directories can potentially expose sensitive information, such as configuration files or private keys, if they are stored within the directories. This could lead to potential security risks. It is essential to ensure that sensitive information is properly protected using additional security measures.
- **chmod 777**: Assigning chmod 777 to files and directories grants read, write, and execute permissions to the owner, the group, and other users. While this can be useful for troubleshooting access restrictions on a web server, it also presents significant security risks. Thus, you should NEVER use chmod 777 in a production environment.

```bash
sudo find /var/www/symfony -type d -exec chmod 755 {} \;
```

## Install dependencies

Change to the Symfony project directory and install the dependencies.

```
cd /var/www/symfony
composer install
```

Configure your .env or .env.local file with the necessary settings, such as database connection details. While this step is not applicable to the project developed in this tutorial, it may be required for other projects to ensure proper configuration and functionality.

```
cd /var/www/symfony
nano .env
```

Clear the cache and set the environment to prod.

```
sudo APP_ENV=prod php bin/console cache:clear
```

## Testing the Deployed Application

Open your web browser and navigate to your instance's public IP address. To test if the routing is working properly, access your public instance IP and append a name after the slash (i.e., "/"). For example:

```
http://123.123.123.123/
http://123.123.123.123/Carlos
```

By trying both URLs, you can confirm that the application routes are functioning as expected.

## Next Steps

Congratulations on successfully deploying the HelloWorld Symfony application on an Amazon EC2 instance! If
