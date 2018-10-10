# Laravel Heroku 5.7

Just an example of heroku running on laravel; Checkout the example here: https://rocky-ridge-43753.herokuapp.com/

## Bash History
Here are the commands I ran to build out this Laravel instance on Heroku

```bash
# Create a new laravel project
composer create-project --prefer-dist laravel/laravel laravel-heroku-5.7

# Switch to that new project
cd laravel-heroku-5.7

# Start tracking in git 
git init

# Add a -p if you want your repo to be private (create a github repo)
hub create

# Add a proc file so heroku knows to look in the public folder
echo web: vendor/bin/heroku-php-apache2 public/ > Procfile 

# This is my alias for "git add ."
ga .

# My alias for "git commimt -m "your message here""
gc -m 'init'

# Another alias for
# git push --set-upstream origin $(git branch | awk "NR==1 {print $2}")
# or in this case "git push --set-upstream origin master" because I'm
# on the master branch 
gpu

# Open the website in your favorite browser
heroku open
```

You can find more best practices here https://devcenter.heroku.com/articles/getting-started-with-laravel direct from heroku themselves.