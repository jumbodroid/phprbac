# phprbac

**phprbac** is wrapper around the OWASP/rbac package that adds support for the Laravel framework

>Leverage phprbac to add NIST Level 2 Authorization to your Laravel projects.

Add the provider to *config/app.php* providers array
>Jumbodroid\PhpRbac\ServiceProviders\PhpRbacServiceProvider::class

Run **php artisan vendor:publish --provider="Jumbodroid\PhpRbac\ServiceProviders\PhpRbacServiceProvider"** to publish the config and migration files
