Acme News
=========

## Instructions ##

### 1. Install all dependencies via composer ###

```
$ composer install
```
### 2. Create database and schema ###

```
$ ./bin/console doctrine:database:create
$ ./bin/console doctrine:schema:create
```

### 3. Import MySQL data from the dump ###

```
$ mysql -u USER -p DATABASE < ./sql/dump.sql
```

### 4. Start a Symfony server ###

```
$ ./bin/console server:start
```
### 5. Access the site on http://localhost:8000/ ###

#### News catalog: ####
```
/news
```

#### Pagination: ####
```
/news?page=2
```

#### News page: ####
```
/news/3
```

### News in XML: ###
```
/news.xml
```
