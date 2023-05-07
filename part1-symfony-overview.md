# Part 1 - Symfony overview: the minimum that you must to know before start

- [Introduction](#introduction)
- [Main Topics to Know About Symfony](#main-topics-to-know-about-symfony)
  1. [Symfony Serve](#symfony-serve)
  2. [Controllers](#controllers)
  3. [Action](#action)
  4. [Annotations](#annotations)
  5. [Routing](#routing)
  6. [Twig](#twig)
  7. [Bundles](#bundles)
  8. [Doctrine](#doctrine)
- [Project Directory Structure](#project-directory-structure)
- [Database Interaction](#database-interaction)
- [Explore Further](#explore-further)

[⬅️ Back to README.md](/README.md)

## Introduction

In this tutorial, we present an essential overview of Symfony, a powerful and versatile PHP web application framework that streamlines the development process for complex web applications. Emphasizing best practices, reusable code, and a modular approach, Symfony employs the Model-View-Controller (MVC) architecture pattern, equipping developers with the tools and knowledge to create maintainable and scalable web solutions with ease.

## Main topics to know about Symfony

1. **Symfony Serve**:Symfony Serve is a command-line tool provided by the Symfony framework to quickly set up a local web server for your project. It helps developers test and debug their applications without needing to configure a separate web server like Apache or Nginx. To use Symfony Serve, simply run symfony serve in your project directory..
2. **Controllers**: Controllers are the core of any Symfony application, acting as the central hub for handling user input, processing it, and returning a response. They contain the logic that coordinates different parts of your application, such as models and views. In Symfony, controllers are typically created as PHP classes, with methods representing different actions.
3. **Action**: An action is a method within a controller that handles a specific user request. Each action corresponds to a route, which maps a URL pattern to the action. When a user accesses the application through a specific URL, the corresponding action is executed, and a response (usually an HTML page) is returned to the user.
4. **Annotations**: Annotations are metadata added to your PHP code, which can help define the behavior of your Symfony application. In the context of Symfony, annotations are often used for defining routes and configuring services. They are placed in comments, starting with `@`, and can be read by the Symfony framework during runtime..
5. **Routing**: Routing is the process of mapping URLs to specific actions within your controllers. Symfony uses a powerful and flexible routing system that allows developers to define URL patterns and associate them with controller actions. Routing can be defined using YAML, XML, PHP, or annotations, making it easy to manage and organize your application's routes.
6. **Twig**: Twig is a fast and secure templating engine for PHP, which is integrated into Symfony by default. It allows developers to separate the presentation logic from the application logic, making it easier to maintain and update. With Twig, you can create reusable templates that include placeholders for dynamic content, which are then filled in with data from your application when a page is rendered.
7. **Bundles**: In Symfony, a bundle is a collection of files and resources that are organized around a specific feature or functionality. They can include controllers, views, configuration files, and other assets. Bundles are designed to be reusable and shareable, allowing developers to create and distribute modular code that can be easily integrated into other Symfony projects.
8. **Doctrine**: Doctrine is an Object-Relational Mapping (ORM) library for PHP, which is commonly used with Symfony to interact with databases. It provides a powerful and flexible way to manage data persistence in your application, abstracting the underlying database system and allowing you to work with objects and classes instead of raw SQL queries. Doctrine can be used with various database management systems, such as MySQL, PostgreSQL, or SQLite.

## Project Directory Structure

```
my_project/
├─ bin/
├─ config/
│  ├─ packages/
│  └─ routes/
├─ public/
├─ src/
│  ├─ Controller/
│  ├─ Entity/
│  ├─ Form/
│  ├─ Repository/
│  └─ Twig/
├─ templates/
├─ tests/
├─ translations/
└─ var/
   ├─ cache/
   └─ log/
```

See a description of folders and subfolders below

- **bin**: Contains application binaries, such as the console used to generate files during development. Using `php bin/console list`, you can view all available commands.
- **config**:
  - Stores application configurations, such as services, routes, bundles, and environment variables for different environments.
  - **packages**: Contains configuration files for specific packages or components.
- **migrations**: Stores database migration files managed by the Doctrine Migrations component.
- **public**:
  - Contains the front-controller and static files like assets.
  - **build**: Stores compiled assets generated by tools like Webpack Encore.
- **src**: The heart of the application, where you create the business logic.
  - **Controller**: Contains application controllers.
  - **Entity**: Contains application entities representing database tables.
  - **Repository**: Contains repositories for querying the database.
  - **Form**: Contains application form types.
  - **EventSubscriber**: Contains event subscribers listening to application events.
  - **Command**: Contains custom console commands.
- **templates**:
  - Stores views, by default using the Twig engine, but other engines or frameworks like Vue and React can also be used.
  - **bundles**: Contains views for specific bundles.
  - **partials**: Contains reusable template parts.
- **tests**: Contains application tests.
- **translations**: Folder for storing translation files.
- **var**: Stores caches and logs.
  - **cache**: Contains application cache files.
  - **log**: Contains application log files.

## Database Interaction

Symfony uses the Doctrine ORM (Object-Relational Mapper) to interact with databases, providing an abstraction layer for working with different databases and persistence mechanisms.

- **Entities**: PHP classes representing database tables and their relationships.
- **Repositories**: Classes responsible for retrieving and storing data in the database.
- **Query Builder**: A fluent interface for building SQL queries programmatically.
- **Data Fixtures**: A way to pre-populate your database with initial data for development and testing.
- **Service**: Used to access Repositories, manage business logic, and provide data to the Controller, which delivers it to the client.
- **DQL (Doctrine Query Language)**: Query language used in Repositories. It's a layer created by Doctrine on top of SQL to apply its own implementations and abstractions. It facilitates query construction and ensures portability between different database management systems.

To ensure proper organization and recommended practices in Symfony application development, follow these guidelines:

1. Create Entities to represent database tables, using annotations to define fields and relationships.
2. Use Repositories to perform database queries, preferably using DQL.
3. Access Repositories through Services, which manage business logic.
4. In the Controller, focus on managing requests and responses, delegating database interaction to Services and Repositories.

## Explore Further

To gain a deeper understanding and expand your knowledge, visit official documentation for:

- **Symfony**: Visit the [Symfony documentation](https://symfony.com/doc/current/index.html) for a comprehensive guide on the Symfony framework, including its components, best practices, and advanced features. The documentation covers various topics, from getting started with Symfony to deploying your application in a production environment.

- **Twig**: The [Twig documentation](https://twig.symfony.com/doc/) provides a detailed overview of the Twig templating engine, its syntax, and built-in functions. Learn how to create reusable templates, extend and include other templates, and implement custom filters and functions to enhance your application's presentation layer.

- **Doctrine**: Explore the [Doctrine ORM documentation](https://www.doctrine-project.org/projects/doctrine-orm/en/2.14/index.html) to understand how to work with databases effectively using Doctrine in your Symfony projects. The documentation covers essential topics like database schema design, querying and persisting data, and managing relationships between entities.

By referring to these resources, you'll gain valuable insights and expertise in using Symfony, Twig, and Doctrine to build robust, scalable, and maintainable web applications.
