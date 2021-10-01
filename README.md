CRM 3000
========

This is a sandbox project for Symfony and JS training and evaluation.

## Requirements

  * PHP 7.2.5 or higher
  * [Composer 2][1]
  * [Symfony 5.3 binary][2]


## Installation

Clone the repository in your workspace:

```bash
git clone https://github.com/SivaPrsm/crm3000.git
```

Update the file `.env` with your database configuration, then launch the database migration and populate it:

```bash
symfony console doctrine:migrations:migrate
symfony console doctrine:fixture:load
```

If you don't have a webserver ready to go, launch the Symfony local web server:
```bash
symfony server:start
```

You can now open the project in your browser at [https://localhost:8000][3] and connect as an administrator:

  * username: admin
  * password: admin

[1]: https://getcomposer.org/download/
[2]: https://symfony.com/download
[3]: https://localhost:8000
