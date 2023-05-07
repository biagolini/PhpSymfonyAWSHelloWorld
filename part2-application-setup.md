# Part 2 - Application Setup: Creating a HelloWorld Symfony Application

- [Introduction](#introduction)
- [Requirements](#requirements)
- [Installing Symfony within Debian/Ubuntu OS](#installing-symfony-within-debianubuntu-os)
- [Configure git globally](#configure-git-globally)
- [Creating a New Symfony Application](#creating-a-new-symfony-application)
- [Adding project dependencies](#adding-project-dependencies)
- [Adding a HelloWorld Controller](#adding-a-helloworld-controller)
- [Testing the Application Locally](#testing-the-application-locally)
- [Commit changes](#commit-changes)
- [Next Steps](#next-steps)

[⬅️ Back to README.md](/README.md)

## Introduction

In this tutorial, we will cover the process of creating a simple HelloWorld application using the Symfony PHP framework. We will go through the necessary prerequisites, installation process, and initial project configuration.

## Requirements

- IDE for code development (locally).There are several IDEs to PHP, here are some popular ones: Phpstorm; Visual Studio Code (VSCode); Eclipse with PDT.
- Basic knowledge of Git and GitHub.

### Phpstorm IDE Configuration

If you are using PhpStorm, it is highly recommended that you install the following plugins:

- PHP Annotations (From Daniel Espendiller)
- PHP toolbox (From Daniel Espendiller)
- Symfony Support (From Daniel Espendiller)

After installing the plugins, activate them in PhpStorm by navigating to "File" → "Settings" → "PHP" → "Symfony" → Enable the checkbox labeled "Enable Plugins for this project".

Ensure that PhpStorm is synchronizing composer with composer.json. To do so, navigate to: "File" → "Settings" → "PHP" → "Composer" → Confirm that the checkbox labeled "Synchronize IDE Settings with composer.json" is enabled.

## Installing Symfony within Debian/Ubuntu OS

Use the commands below to install the necessary components for the development of this project on your local machine.

```bash
sudo apt update -y
sudo apt upgrade -y
sudo apt install -y awscli git apache2 php php-mysql php-zip unzip php-simplexml
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"
sudo curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash
sudo apt install symfony-cli
```

Check if your dependencies are correctelly installed.

```bash
aws --version
git --version
apache2 -v
php --version
php -m # php extension
composer --version
symfony -V
```

## Configure git globally

Configure your Git user information.

```bash
git config --global user.name "Your Name"
git config --global user.email "your.email@example.com"
```

## Creating a New Symfony Application

There are several methods to create a new Symfony application, each tailored to your specific needs and preferences.

1. Full-featured Web Application (used in this tutorial).

This command generates a new Symfony project configured for a full-stack web application. It incorporates additional packages and features, such as forms, validation, security, and templating.

```bash
symfony new my_symfony_app --webapp
```

2. Basic Symfony Application.

This command establishes a new Symfony project with a minimal setup, suitable for building microservices, APIs, or console applications. It includes a limited set of packages and a streamlined directory structure.

```bash
symfony new my_symfony_app
```

3. Symfony Skeleton using Composer.

This minimal skeleton is designed for creating Symfony applications with only the essential components. It is ideal for microservices projects, APIs, or situations where you want to add specific components as needed.

```bash
composer create-project symfony/skeleton my_symfony_app
```

4. Custom Project Name with Website-Skeleton.

This comprehensive skeleton is geared towards traditional web applications. It features numerous additional components, such as Twig, Doctrine, Monolog, WebProfiler, and more, making it suitable for more complex web projects.

```bash
composer create-project symfony/website-skeleton my_symfony_app
```

Choose the most appropriate command based on your needs and proceed with the Hello World tutorial.

## Adding project dependencies

Before start, navegate to your local project directory and add the required dependencies:

```bash
cd mySymfonyApp
composer require annotation
```

## Adding a HelloWorld Controller

Create a HelloController using Symfony CLI. After run the following command, a new Controller will be found in src\Controller\NAMEController.php (i.e. src\Controller\HelloController.php)

```bash
symfony console make:controller Hello
```

Develop HelloController to display a regular and a custom hello message. For doing so, check my code presented in the [src\Controller\HelloController.php](src\Controller\HelloController.php) file

## Testing the Application Locally

Test run Symfony serve

```
symfony serve --port=8080
```

Open your browser and test the application by accessing the following URLs

```
http://localhost:8080/
http://localhost:8080/Carlos
```

## Commit changes

Add all the files in your project to the repository.

```bash
git add .
```

Commit your changes with a descriptive message.

```bash
git commit -m "Initial commit for HelloWorld Symfony Application"
```

If you haven't already, create a new repository on a Git hosting service like GitHub Bitbucket or GitLab. Follow the instructions provided by the service to set up the remote repository.

```bash
git remote add origin <REMOTE_REPOSITORY_URL>
```

Push your changes to the remote repository.

```bash
git push -u origin main
```

## Next Steps

After completing this tutorial, proceed to [Part 3 - AWS Deployment: Deploying the HelloWorld Symfony Application on an Amazon EC2 Instance](part3-aws-deployment.md) to learn how to deploy your application to an EC2 instance.
