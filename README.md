This package allows you to list resources and order them based on a specific column 

# Installation
You can install the package in a Laravel app with Nova installed

```bash
composer require radwanic/resource-listing
```

# Description

A Laravel Nova card that displays a list of resource items based on the criteria that you specify.


# Basic Usage

Adding the snippet below to the dashboard `cards` function will display the most resent posts based on their `created_at` field

```php
protected function cards()
{
	return [
		...
		(new ResourceListing())->resource(\App\Post::class)
	];
}
```
*Screenshot*
![basic](https://user-images.githubusercontent.com/10232523/62667040-3eb02c00-b986-11e9-8ddd-ffe1b5ce256f.png)

# Available Methods

|Name| Description | Example | Default Value
|--|--|--|--|
| resource |  sets the resource (must be set) | `\App\Post::class` | - |
| cardTitle | sets card title, won't display a card title if not set | Recent Posts | empty string |
| resourceTitleColumn |  choose the resource model column which will be used in the listing | `first_name` - `name` - `title` | `title` |
| resourceUri | sets the resource uri. only the title will be displayed if not set | `/resoucres/posts/` | empty string |
| limit | sets the maximum number of items that will be listed | `1` - `3` - `5` | `10` |
| orderBy | sets the column that will be used to sort the list | `updated_at` - `name` - `price` - `age` | `created_at` |
| order | sets the sorting direction | `asc` - `desc` | `desc` |
| readableDate | sets the readable human date flag. this can be used with any date column | `true` - `false` | `false` |

# Advanced Examples

 - Display recently updated posts, link each post to its resource url,
   and limit the results to 5

```php
(new ResourceListing())  
 ->cardTitle('Recently Updated Posts')  
 ->resource(\App\TOYIT\Posts\Post::class)  
 ->resourceUrl('/resources/posts/') 
 ->orderBy('updated_at') 
 ->limit(5)
```
*Screenshot*
![recent posts](https://user-images.githubusercontent.com/10232523/62667039-3eb02c00-b986-11e9-9890-c4b8c3e3996b.png)

 - Get the most expensive products based on the `price`, and use `name` to display each item
```php
(new ResourceListing())  
 ->cardTitle('Recently Updated Posts')  
 ->resource(\App\TOYIT\Posts\Post::class) 
 ->resourceUrl('/resources/posts/')   
 ->resourceTitleColumn('name')
 ->orderBy('price')
 ->limit(5)
```
*Screenshot*
![most expensive](https://user-images.githubusercontent.com/10232523/62667043-3f48c280-b986-11e9-9a23-7a33fcd84a1a.png)
- Get the three oldest members based on the `created_at` column, transform the `created_at` to a readable human time diff, and set the `order` direction to `asc`
```php
new ResourceListing())  
 ->cardTitle('Oldest Members')  
 ->resource(\App\TOYIT\Users\User::class)  
 ->resourceTitleColumn('name')  
 ->resourceUrl('/resources/users/')  
 ->readableDate(true)  
 ->orderBy('created_at')  
 ->order('asc'),
```
*Screenshot*
![oldest members](https://user-images.githubusercontent.com/10232523/62667041-3eb02c00-b986-11e9-8c93-199ff6ca2e4b.png)

## Security

If you discover any security related issues, please email mohammed-radwan@hotmail.com

## Contributing

This is a basic package that covers few cases and has limited features. Any contributions are welcome and credited.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.