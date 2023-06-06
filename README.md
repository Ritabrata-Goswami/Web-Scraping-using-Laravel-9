# Web-Scraping-using-Laravel-9
1. First install Laravel package called Goutte.
```
composer require weidner/goutte
```
2. Go to config/app.php path
Add
```
Weidner\Goutte\GoutteServiceProvider::class
```
inside 'providers' => [...] And 
```
'Goutte' => Weidner\Goutte\GoutteFacade::class
```
inside 'aliases' => Facade::defaultAliases()->merge([])->toArray()

## Controller
Add this Trait.
```
use Goutte\Client;
```
with public method index(). 

At first we have to create a Guzzle Http Client by **new Client()**

Guzzle is a PHP HTTP client that makes it easy to send HTTP requests and trivial to integrate with web services. 
It provides the simple yet powerful interface for sending GET,POST,PUT,DELETE.... requests.

In *composer.json* file Guzzle package version can be checked.
"require": {
        "php": "^8.0.2",
        **"guzzlehttp/guzzle": "^7.2",**
        "laravel/framework": "^9.19",
        "laravel/sanctum": "^3.0",
        "laravel/tinker": "^2.7",
        "weidner/goutte": "^2.3"
    }

```

class WebScrapper extends Controller
{
    public function index()
    {
        $client = new Client();
        
        $website = $client->request('GET', 'https://www.w3schools.com/php/php_ref_string.asp');
        
        // return $website->html();
        return $website->text();
    }
}
```
If we use **$website->html()** that will return the basic HTML structure of that website here *'https://www.w3schools.com/php/php_ref_string.asp'*.
If we use **$website->text()** that will return all the HTML contents instead elements.
The requested website must be in *GET* method.

You can also filter specific HTML-DOM element by filter() method.
example:- **$website->filter('h2')** 
here <h2></h2> elements will be filter from that requested site.
