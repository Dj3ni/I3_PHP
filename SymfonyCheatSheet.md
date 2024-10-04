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


