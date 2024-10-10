# Cheat sheet Symfony Project creation

## Ressources
- Créer une section backOffice/admin dans Symfony
    
     https://symfony.com/bundles/EasyAdminBundle/current/index.html
    
- Framework
    
    https://github.com/choquitofrito/Symfony7
    
    https://github.com/choquitofrito/Symfony7/blob/main/DocSymfony/SYLLABUS.md
    
    Doc de Twig: https://twig.symfony.com/doc/3.x/tags/block.html
    
    ![image.png](https://prod-files-secure.s3.us-west-2.amazonaws.com/e69249ab-3777-45a0-9046-0028bb159bc2/00b5967a-cc74-487d-b6a1-904a1417d517/84a88f0c-11c4-42bf-aead-0076312d89dc.png)

## Steps for Project creation
### Index

### Need to install
- composer : https://getcomposer.org/
- symfony 7: Download the exe file and copy it in xampp/php (to benefit from the path)
    https://symfony.com/download
- X Debug

### VS Code 
1. Extensions Needed:
    - Intelephense
    - PHP Namspace Resolver
    - Twig Language 2
      
2. Emmet Abbreviation for Twig
   - Go to the Parameters weel> Settings
   - search for Emmet
   - In the section Emmet: include Languages, click on add Item
   - In the Item field : "twig" and value : "html"
   - ok.
     
 ![image](https://github.com/user-attachments/assets/c0a89cdc-3f49-4308-8ed9-2273d79808cc)

 Now you're all set to use emmet abbreviations in a twig template :)

  
### 1. Workbook
  - Class Diagram or MCD
  - Cases Diagram or features repertory
  - Wireframe
    
### 2. Initiate Symfony Project
```
symfony new --webapp my_project
```
When starting the project and then when you clone it in another workstation, put this command so you have all the dependencies installed:

```
composer install
```
To start the local server

```
symfony server:start
```

To stop it:
```
symfony server:stop
```

### 3. Safety and login Module Creation
3.1. Symfony doesn't implement it by default so we need to ask it to install it

```
symfony composer req symfony/security-bundle
```
3.2. Create User class and set parameters. Watch out, not entity!
```
symfony console make:user
```
-->Symfony will create a user class with a database name "user". Be carefull, some DB servers won't allow it (like PostgreSQL) so you need to change this value : ![image](https://github.com/user-attachments/assets/61a9586f-6f91-4f42-be7a-58f11d168432)

3.3. Get fixtures bundle
```
composer require doctrine/doctrine-fixtures-bundle --dev
```
3.1.1. Create fixtures: 
```
symfony console make:fixture
```
- Then choose the Entity for wich you want to create the fixture. 
- Give a name for your fixture: don't forget to put Fixture in the name of your fixture so Symfony recognize it. For example: UserFixture
- code your fixture
- Determine fixture dependencies: use "implements DependenceFixtureInterface" in the fixture declaration and then create the getDependencies() method where you return the Fixtures you depend. 
![image(5)](https://github.com/user-attachments/assets/50a0a457-9e15-46aa-9eea-034a538ac788)
![image(6)](https://github.com/user-attachments/assets/6f600408-06b6-4833-bf4f-0d3a44899c5b)

  
- Launch your fixture:
  ```
  symfony console doctrine:fixtures:load
  ```
  
3.3.2. Faker Library
  
```
composer require fakerphp/faker
```
To use faker in your fixture file:
       - In your load function, call faker and save it in a var to use it further: $faker = \Faker\Factory::create("fr_BE") empty if you want US data or ("language_COUNTRY") if you want local data.
       - Create the object which will contain your fake data
       - Call to a faker function when you need to fill in data
       - Persist your object
       - Flush to send it to your DB
       ![image](https://github.com/user-attachments/assets/354cb61f-fb74-4803-9d60-0b70095f0fd5)
    
3.3.3. Fixture for OneToOne relations
In a OneToOne relation, one entity "own" the relation and will have the foreign key.
You can chose to create a fixture for several entities but you'll have to do it manually.
Common fixture:
- Create the object and date for the first entity
- Create the object and data for the second entity
- link them with your method
- persist the objects
- flush
  ![image(7)](https://github.com/user-attachments/assets/fecc7377-94a4-461e-9a87-f0d411d585da)

Seperate fixture:
- In the entity that own the relation, you need to set a reference for the object in the fixture, after the persist() (Doctrine need to know the object exist before setting a reference) but before the flush()
  ![image(8)](https://github.com/user-attachments/assets/b2f58764-bc99-451c-9938-92e71a45e310)
- Get that référence in the other entity fixture:
  ![image(9)](https://github.com/user-attachments/assets/6e46cd95-879e-4c95-83ca-5a16ec458c8e)
  That fixture is dependent of the first one so don't forget to set the dependency.

5. 
