# MangaDex - Your Comic/Manga Books Website

## A Sneak-Peek showcase

* HomePage :
<img src="https://github.com/HtetPhone/MangaDex/blob/main/public/img/home_MangaDex.png" alt="Home" width="600"/>
<br>

* Chapters :
<img src="https://github.com/HtetPhone/MangaDex/blob/main/public/img/chapters_MangaDex.png" alt="Chapters" width="600"/>
<br>

* Chapter View :
<img src="https://github.com/HtetPhone/MangaDex/blob/main/public/img/chapter_MangaDex.png" alt="Chapter View" width="200"/>
<br>

* Dashboard Panel :
<img src="https://github.com/HtetPhone/MangaDex/blob/main/public/img/dashboard_MangaDex.png" alt="Dashboard" width="600"/>
<br>

* Manga List :
<img src="https://github.com/HtetPhone/MangaDex/blob/main/public/img/mangaList_MangaDex.png" alt="Chapters" width="600"/>
<br>

* Chapters List :
<img src="https://github.com/HtetPhone/MangaDex/blob/main/public/img/chapterList_MangaDex.png" alt="Chapters" width="600"/>
<br>

## Dependencies
You can check the lists of dependencies in the *composer.json* and *package.json*.

### Some other info
* I used **Laravel Breeze** for *Frontend scaffolding*
* The whole design is structed by **Bootstrap**
* and rendered by **vite.js**
<br>
<br>

> [!TIP]
> For those who wanna clone repo and run the app - A step by step setup Manual
### Follow the steps down below

* First clone the repo down 
  `git clone repo-url`

* Install Composer packages & NPM Packages
  `composer install`
  `npm i`

* Set up .env file - Copy the .env.example file and change the name to .env
  `cp .env.example .env`
> in the .env file, set up the database

* Generate a new key for the app
  `php artisan key:generate`

* Run the migrations
  `php artisan migrate`

* Final Step - Run the app
  `npm run dev` for asset bundling &
  `php artisan serve` for localhost








