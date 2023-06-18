
# News Aggregator

A news
aggregator website that pulls articles from various sources and displays them in a clean,
easy-to-read format


## Installation

1. Clone the project/repo (download the zip from green button above) or install GIT in your system then:

```bash
  git clone https://github.com/OkkashaAlly/news-aggregator-backend.git
```

2. Navigate to the project directory

```bash
  cd news-aggregator-backend
``` 
3. Install dependencies
```
 composer install
```
4. Install MySQL Database 
```
Follow this link: https://www.mysql.com/
```
5. Update MySQL root user password
6. Create a new Database
7. Copy the Enviroment variables from env.example and create a new .env file paste
```
 cp .env.example .env or copy .env.example .env
```
8. Find the line where you can add the created Database and the user password

9. Run ``` php artisan key:generate ```

10. Run ``` php artisan migrate ```

11. Run ``` php artisan db:seed ```

12. Run ``` php artisan serve ```
