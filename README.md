**About the project**

_technology used;_

•	Laravel  as the backend system<br/>
•	Angular4 as the frontend system<br/>
•	Twitter bootstrap and the responsive framework<br/>
•	MySql as the database<br/>

_About the project_<br/>
•	An administrator can view all existing posts or see a message that no blogs are available.<br/>
•	Blogs display Title, Excerpt body, Published Time and Author’s name<br/>
•	An administrator can modify and create new blogs.<br/>

_Configurations to change:_<br/>
_Angular4:_<br/>
In the angular/src/app/server.service.ts
Change base_url to the right url
_Laravel:_
In .env folder change the parameters to the database and APP_URL.<br/>
To run the database;<br/>
There is a migration file in laravel, run migration command
Php artisan migrate
