# Easy MVC Framework

First step :
```
git clone https://github.com/MaaximeLH/easy-mvc.git
```

```
cd easy-mvc/
```

Install dependencies & load autoloader :

```
composer install
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

See examples :
```php
        /**
         * Example of usage with repository
         *
         * $user = $repository->findBy(['email' => 'maxime@lehenaff.pro']); // Find all users where email = maxime@lehenaff.pro
         * $user = $repository->findOneByEmail(['email' => 'maxime@lehenaff.pro']); // Find all users where email = maxime@lehenaff.pro
         * $user = $repository->findAll(); // Find all users
         **/
    
        /**
         * Example of usage to create a user
         *
         * $user = new User();
         * $user->setFirstname("Maxime");
         * $user->setLastname("LE HENAFF");
         * $user->setEmail("maxime@lehenaff.pro");
         *
         * $entityManager->persist($user); // Persist user into Doctrine System
         * $entityManager->flush(); // Flush all persistent data (save / update)
         *
         * echo 'User : ' . $user->getId(); // Will output new User ID
         */
        
        /**
         * Example of usage to delete a user by id
         *
         * $user = $repository->find(1); // Get user instance
         *
         * $entityManager->remove($user); // Remove user into doctrine system
         * $entityManager->flush(); // Flush all persistent data (save / update)
         */
    
        /**
         * Example of usage to update user
         *
         * $user = $repository->find(1);
         * $user->setFirstname("MaaximeLH");
         * $entityManager->flush();
         */
```

For more, see the Doctrine ORM documentations.