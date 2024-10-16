# Cheat sheet Symfony Project creation

## Ressources
- Créer une section backOffice/admin dans Symfony
    
     https://symfony.com/bundles/EasyAdminBundle/current/index.html
    
- Framework
    
    https://github.com/choquitofrito/Symfony7
    
    https://github.com/choquitofrito/Symfony7/blob/main/DocSymfony/SYLLABUS.md
    
- Doc de Twig: https://twig.symfony.com/doc/3.x/tags/block.html
    
    ![image.png](https://prod-files-secure.s3.us-west-2.amazonaws.com/e69249ab-3777-45a0-9046-0028bb159bc2/00b5967a-cc74-487d-b6a1-904a1417d517/84a88f0c-11c4-42bf-aead-0076312d89dc.png)

## Steps for Project creation
### Index

### Need to install
- composer : https://getcomposer.org/
- symfony 7: Download the exe file and copy it in xampp/php (to benefit from the path)
    https://symfony.com/download
- X Debug

### VS Code 
1. Extensions needed:
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

3.3. Get fixtures bundle and load the fixture
```
composer require doctrine/doctrine-fixtures-bundle --dev
```
```
symfony console doctrine:fixtures:load --no-interaction
```
3.4. Create login/logout/testUnits forms
```
symfony console make:security:form-login
```
3.5. Create the Login controller

```
symfony console make:controller Login
```
3.6. Create fixtures to fill in your DB
/!\ Don't forget to hash the password!
```
// Hasher de pwd
    private UserPasswordHasherInterface $pwdHasher;

    // Insert it in the construct function
    public function __construct(UserPasswordHasherInterface $pwdHasher)
    {
        $this->pwdHasher = $pwdHasher;
    }
    // Use it for your object user
    $pwdHashed = $this->pwdHasher->hashPassword($user,"Password");

```
3.7. Set the paths for login and logout
- Modify your file security.yaml and add the default target path
  ![image(10)](https://github.com/user-attachments/assets/fe8f24b7-2036-4832-967f-d9c9dcc44d20)
- Create the controller that will manage this path (usually called HomeController). the name of the path must be the same that you used in default target path
- Modify your Twig template
  NB:
      - for a login page, you cannot have extends base html
      - or if you want to restrict access, use function is_granted('ROLE_NAME').
3.8. Create registration form and accept uniq identification
  ```
  symfony console make:registration-form
  ```
For each registration, symfony will give the "ROLE_USER" by default (that way, the DB only stocks other ROLES)
If you want to add properties to your User entity:
- use the command make:entity
- update your user fixtures
- update your registration form
- MIGRATE your DB
  ```
      @REM Delete all in the migrations directory qui starting by V 
        del migrations\V*
        @REM Drop the Database
        symfony console doctrine:database:drop --force --no-interaction
        @REM Recreate the DB
        symfony console doctrine:database:create
        @REM Migrate all your entities
        symfony console make:migration --no-interaction
        @REM sync with DB
        symfony console doctrine:migration:migrate --no-interaction
  ```
- Load your fixtures
  
### 4. Model Creation
Try to commit between each step so if you make a mistake, you don't start again from scratch.
4.1. Create your entities

```
symfony console make:entity
```
Set parameters:
- Parameter name (=column namefor your DB)
- Field type:
    Main Types
      * string or ascii_string
      * text
      * boolean
      * integer or smallint or bigint
      * float
    Array/Object Types
      * array or simple_array
      * json
      * object
      * binary
      * blob
    Date/Time Types
      * datetime or datetime_immutable
      * datetimetz or datetimetz_immutable
      * date or date_immutable
      * time or time_immutable
      * dateinterval
    Other Types
      * enum
      * decimal
      * guid

Then migrate
```
`symfony console make:migration`

`symfony console doctrine:migrations:migrate`
```

4.2. Set relations between your entities
- Give a name to your relation
- Set your relation
    Relationships/Associations
      * ManyToOne
      * OneToMany
      * ManyToMany
      * OneToOne

  ``
      What type of relationship is this?
     ------------ -----------------------------------------------------------------------
      Type         Description
     ------------ -----------------------------------------------------------------------
      ManyToOne    Each Exemplaire relates to (has) one Livre.
                   Each Livre can relate to (can have) many Exemplaire objects
    
      OneToMany    Each Exemplaire can relate to (can have) many Livre objects.
                   Each Livre relates to (has) one Exemplaire
    
      ManyToMany   Each Exemplaire can relate to (can have) many Livre objects.
                   Each Livre can also relate to (can also have) many Exemplaire objects
    
      OneToOne     Each Exemplaire relates to (has) exactly one Livre.
                   Each Livre also relates to (has) exactly one Exemplaire.
     ------------ ----------------------------------------------------------------
  ``
  
- Give the Entity name you want to link
- Set the name for the relation in that entity
- Is null yes or no

  NB:
  - OneToOne: One entity "owns" the relation and has the foreign key
  - OneToMany: set the relation from the One side
  - ManyToMany: use it only if no parameters for that intermediary table, otherwise create a new entity

5. Fixtures
5.1. Create fixtures: 
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
  
5.2. Faker Library
  
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
    
5.3. Fixture for OneToOne relations
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

5.4. Fixture for OneToMany relations
First we make an instance for the relation one the One side:
```
$this->addReference('alias',$variableForOBject);
```
Then we get this reference in the Many side and link it : it will create a foreign key in the Many Table.
All the informations are stocken in the Many table.
Example to access these data:
```
// Get user with id
$user = $userRepository->find(1);

// Get all events organized by that user
$evenements = $user->getEvenements(); // Cette méthode est générée par la relation OneToMany

foreach ($evenements as $evenement) {
    echo $evenement->getNom();
}
```
5.5. Keep in mind

cascade-persist : 
Si on a une entité qui contient des objets d'autres entités (ex: un Livre qui contient des Exemplaires), et nous modifions/rajoutons ces dernières (ex: on rajoute un Exemplaire au Livre, on modifie un des 
Exemplaires du Livre), nous allons devoir faire uniquement persist sur la première et Doctrine fera persist sur toutes les entités associées.
  
6. Controllers

   A controller is linked to an Entity / an action. There can be many different actions in a controller each will be represented with a route and a method.
   Notation:
   ```
   #[Route ("/route", name: "path_name"]
   public function action(arguments){
    

   }
   ```
   
5. 
