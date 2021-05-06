# phprbac

**phprbac** is wrapper around the OWASP/rbac package that adds support for the Laravel framework

>Leverage phprbac to add NIST Level 2 Authorization to your Laravel projects.

Add the provider to *config/app.php* providers array
>Jumbodroid\PhpRbac\ServiceProviders\PhpRbacServiceProvider::class

Run **php artisan vendor:publish --provider="Jumbodroid\PhpRbac\ServiceProviders\PhpRbacServiceProvider"** to publish the config and migration files.  

# Usage  

The complete documentation can be found at [phprbac.net](http://phprbac.net/api.php "The PHP-RBAC website").
Just replace:  
1. `Rbac->{Permissions}` with `Rbac->permissions()`  
2. `Rbac->{Roles}` with `Rbac->roles()`  
3. `Rbac->{Users}` with `Rbac->users()`  
To get an instance of the Rbac class, use `Rbac->getInstance()`  

## Roles  

1. Create new role  
```php
$role_id = Rbac::roles()->add($title, $description);  
$role_id = Rbac::roles()->add($title, $description, $parent_id);  
```  

2. Find role title  
```php
$role = Rbac::roles()->getTitle($role_id);
```  

3. Find list of permissions assigned to a given role  
```php
$role_permissions = Rbac::roles()->permissions($role_id, true);  
```  

4. Unassign all permissions assigned to a given role  
```php  
Rbac::roles()->unassignPermissions($role_id);  
```  

5. Assign permission to a role  
```php  
Rbac::roles()->assign($role_id, $perm_id);  
```  

6. Remove a role and all its descendants  
```php  
$ok = Rbac::roles()->remove($role_id, true);  
```  

7. Removes a role  
```php  
Rbac::roles()->remove($role->ID, true);  
```  


## Permissions

1. Create a new permission  
```php  
$perm_id = Rbac::permissions()->add($perm_title, $perm_desc, 1);  
```  

2. Check if a given permission exists  
```php  
$perm_id = Rbac::permissions()->returnId($perm_title);  
```  

3. Unassign all roles assigned to a given permission  
```php  
Rbac::permissions()->unassignRoles($perm_id);  
```  

4. Removes a given permission  
```php  
Rbac::permissions()->remove($perm_id, true);  
```  



## Users

1. Unassign a given role from all users  
```php  
Rbac::roles()->unassignUsers($role_id);  
```  

2. Check if a given user has a given role  
```php  
$assigned = Rbac::users()->hasRole($role['ID'], $user->id);  
```  

3. Retrieves all roles assigned to a given user  
```php  
$assigned = Rbac::users()->allRoles($user_id);  
```  

4. Assign a given role to a user  
```php  
Rbac::users()->assign($role_id, $user_id);  
```  

5. Unassign a given role from a user  
```php  
Rbac::users()->unassign($role_id, $user_id);  
```  


## UserRoles


## RolePermissions

