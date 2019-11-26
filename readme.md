#EMPLOI

## About Emploi

Emploi is an end-to-end recruitment platform with the following features:

- Employers Post Vacancies
- Job Seekers Apply vacancies
- Employers Shortlisting
- Role suitability Index to rank applicants

## Installing Emploi

Ideal installation is on an Ubuntu 18.04 VPS. 

###Requirements
- Ubuntu 18.04
- EngineX Server
- PHP 7.3-fpm
- Composer
- Supervisor
- Git repository
- MySQL Database
- Certbot

###1. On server

a) Create directory
mkdir -p /var/www/emploi.co

b) Create Nginx server block in /etc/nginx/sites-available/emploi.co and paste contents below

server {
    listen 80;
    root /var/www/emploi.co/public;
    index index.php index.html index.htm;
    server_name emploi.co;
    location / {
           try_files $uri $uri/ /index.php$is_args$args;
    }
    location ~ \.php$ {
           try_files $uri /index.php = 404;
           fastcgi_pass unix:/var/run/php/php7.3-fpm.sock;
           fastcgi_index index.php;
           fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
           include fastcgi_params;
    }
}

c) Make server block accessible

ln -s /etc/nginx/sites-available/emploi.co /etc/nginx/sites-enabled/emploi.co

d) Create git repo

mkdir -p /var/repo/emploi.git
cd /var/repo/emploi.git
git init --bare

e) Enable receiving updates from development center by creating a hook, pasting contents and giving correct permissions

nano /var/repo/emploi.git/hooks/post-receive

#!/bin/sh
Unset GIT_INDEX_FILE
git --work-tree=/var/www/emploi.co --git-dir=/var/repo/emploi.git checkout -f

>>exit and give permissions

chmod +x /var/repo/emploi.git/hooks/post-receive

###2. On Local Machine

>>edit database/seeds/DatabaseSeeder.php and remove dummy data (At the bottom)
>>update admin passwords which by replacing them with Hashed Equivalent

>>add remote host and push code
git remote add production ssh://root@emploi.co:22/var/repo/emploi.git
git push production master

###3. Server

a) Create mysql database

mysql
CREATE DATABASE emploi;
GRANT ALL PRIVILEGES ON emploi.* to 'emploi'@'localhost' IDENTIFIED BY 'AVeryHardPass!';
FLUSH PRIVILEGES;
exit;

b) Continue installation

cd /var/www/emploi.co
composer install
chown -R :www-data /var/www/emploi.co
chmod -R 777 /var/www/emploi.co
composer dump-autoload

c) Create .env file (Environment file)

APP_NAME=Emploi
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://emploi.co
LOG_CHANNEL=stack
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=emploi
DB_USERNAME=emploi
DB_PASSWORD=AVeryHardPass!
BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=database
SESSION_DRIVER=file
SESSION_LIFETIME=120
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=postmaster@mg.emploi.co
MAIL_FROM_NAME='Emploi Team'
MAIL_PASSWORD=b494db25c0c0a5a9355bc8ec121ae36d-9c988ee3-d124ce79
MAIL_ENCRYPTION=null
MAILGUN_DOMAIN=info@emploi.co

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

d) Finish up installation

php artisan key:generate
php artisan config:cache
php artisan migrate
php artisan db:seed
php artisan storage:link
composer dump-autoload

e) Setup SSL with Certbot and enable auto renew

certbot --nginx -d emploi.co
certbot renew --dry-run

f) Import data from Cv-portal

>>visit jobsikaz.com/cpanel
>>navigate to databases and execute these queries, exporting data to csv

[i] Export job seekers and save as seekers.csv

SELECT job_seekers.names, job_seekers.public_name, job_seekers.dob, job_seekers.email, job_seekers.gender, job_seekers.phone, job_seekers.current_position, job_seekers.post_address, job_seekers.years_experience, job_seekers.experience, job_seekers.education, job_seekers.objective, job_seekers.resume, job_seekers.featured, job_seekers.industry, users.password FROM job_seekers
LEFT JOIN users ON job_seekers.user_id = users.id

[ii] Export employers and save as employers.csv

SELECT employers.company, employers.industry, employers.mobile, employers.phone, employers.location, employers.post_address, users.email, users.password, users.name FROM employers
LEFT JOIN users ON employers.user_id = users.id

[iii] Export Employers saved Cvs and save as saved-profiles.csv

SELECT users.email as employer_email, job_seekers.email as seeker_email, accounts.created_at FROM accounts
LEFT JOIN users on accounts.user_id = users.id
LEFT JOIN job_seekers on accounts.id = job_seekers.id

[iv] Export Employers cv requests and save as resume-requests.csv

SELECT users.email as employer_email, job_seekers.email as seeker_email, resume_requests.status, resume_requests.created_at FROM resume_requests
LEFT JOIN users ON resume_requests.user_id = users.id
LEFT JOIN job_seekers ON resume_requests.resume_id = job_seekers.id

>>copy .csv files to /var/www/emploi.co/storage/app directory using scp

>>open tmux as below and start import

tmux
php artisan command:ImportData

>> press ctrl+b then d to exit. This will keep the process running when terminal is closed

>> open another tmux and run
php artisan command:ImportPosts

g) Setup supervisor to manage queues

All Done


## Security Vulnerabilities

If you discover a security vulnerability within Emploi, please send an e-mail to Obare C. Brian via [brian.obare@emploi.co](mailto:brian.obare@emploi.co) or raise the issue on Slack. All security vulnerabilities will be promptly addressed.

## License

Emploi is a product of Jobsikaz Afrique.
