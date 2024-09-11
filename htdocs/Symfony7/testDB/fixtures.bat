@REM Créer une base de données avec le même nom (elle est vide)
symfony console doctrine:database:create
@REM On fait une migration de notre code actuel pour recréer les tables à jour
symfony console make:migration --no-interaction
@REM On synchronise avec la DB
symfony console doctrine:migration:migrate --no-interaction