# Easy MVC Framework

```
composer require maaximelh/easy-mvc
```

If Easy MVC Framework is not on the server root, please uncomment the following line in public/.htaccess
```
# RewriteBase /
```

Then, configure your framework into App\Config.php.

This MVC Framework integrate by default the [Doctrine ORM](https://www.doctrine-project.org/projects/orm.html)

# How Doctrine ORM works

An user Entity has already created, you need to import it with CLI.

```bash
vendor/bin/doctrine orm:schema-tool:update --dump-sql --force
```

A new *users* table has been created in your database with the annotations in the Entity\User.php file.

How it works ? 

First, you need to get repository from Entity Manager.

```php
$em = Entity::getEntityManager(); // Get Entity Manager
$repository = $em->getRepository(User::class); // Get User repository
```

Then you can do all the treatments you want, like the examples above.

Example of finder with repository.

```php
$user = $repository->findBy(['email' => 'maxime@lehenaff.pro']); // Find all users where email = maxime@lehenaff.pro
$user = $repository->findOneByEmail('maxime@lehenaff.pro'); // Find one user where email = maxime@lehenaff.pro
$user = $repository->findAll(); // Find all users
```

Example of usage to create a user.

```php
$user = new User();
$user->setFirstname("Maxime");
$user->setLastname("LE HENAFF");
$user->setEmail("maxime@lehenaff.pro");
$entityManager->persist($user); // Persist user into Doctrine System
$entityManager->flush(); // Flush all persistent data (save / update)
echo 'User : ' . $user->getId(); // Will output new User ID
```

Example of usage to delete a user by id.

```php
$user = $repository->find(1); // Get user instance
$entityManager->remove($user); // Remove user into doctrine system
$entityManager->flush(); // Flush all persistent data (save / update)
```

Example of usage to updated user.

```php
$user = $repository->find(1);
$user->setFirstname("MaaximeLH");
$entityManager->flush();
```

For more, see the Doctrine ORM documentations.

# Generate Entities from database

If you have already tables in your database, you can generate Entities automatically with the following command.

```bash
php generator.php

# OR

vendor/bin/doctrine orm:convert-mapping --from-database annotation App/Entity
```
