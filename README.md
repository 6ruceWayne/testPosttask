1) Composer install to set every package
2) Composer update to check every version 
3) Set Data Base credentials to .env file
4) For migration:
php artisan migrate 
5) For seeders:

php artisan db:seed --class=UserSeeder

php artisan db:seed --class=PostSeeder

php artisan db:seed --class=CommentSeeder

6) Then set up project:
php artisan serve
7) Have a try at all routes:
GET /{ENDPOINT} - See all
GET /{ENDPOINT}?sort=views&sortType=desc&page=1&perPage=20 - Use filters for sorting things sort, sortType, page и perPage
GET /{ENDPOINT}/{id} - See one entity
POST /{ENDPOINT} - Add entity
PATCH /{ENDPOINT}/{id} - Update entity
DELETE /{ENDPOINT}/{id} - Delete entity

ENDPOINT could be users, posts, comments

In order to use Postman as a tool for testing POST/PATCH/DELETE requests in App\Http\Middleware in VerifyCsrfToken.php the base site link was added as an exception to not use CsrfToken. In other ways Postman wouldn't work or would require to add all routes.
