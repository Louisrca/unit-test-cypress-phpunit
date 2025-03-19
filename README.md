# TaskManager - Guide d'installation rapide

## Prérequis

- PHP 7.4+
- Composer
- Node.js & npm
- k6

## Installation

### PHPUnit

```bash
# Installation des dépendances PHP
composer install

# Exécution des tests
./vendor/bin/phpunit
```

### Cypress

```bash
# Installation des dépendances Node.js
npm install

# Lancement de Cypress
npx cypress open

# Exécution des tests en mode headless
npx cypress run
```

### k6

```bash
# Vérification de l'installation
k6 version

# Exécution du test de performance
k6 run tests/performance/load_test.js

# Test avec paramètres spécifiques
k6 run --vus 100 --duration 30s tests/performance/load_test.js
```

## Serveur local

```bash
# Démarrer le serveur PHP pour les tests
php -S localhost:8000
```

## Structure du projet

```
task-manager/
├── src/                 # Code source
├── tests/               # Tests PHPUnit et k6
├── cypress/             # Tests Cypress
└── public/              # Fichiers HTML
```

## Résolution des problèmes

- **PHPUnit**: Exécutez `composer dump-autoload` si les classes ne sont pas trouvées
- **Cypress**: Vérifiez que le serveur local est démarré
- **k6**: Assurez-vous que l'application est accessible à l'URL spécifiée
