#In this laravel project i show that how to send mail using gmail smtp by implementing queue jobs
#steps one =>
At first your laravel proejct create a queue table using this command
php artisan queue:table
than migrate it by this command
php artisan migrate
#steps two =>
Than setup .env file 
queue connection should be database as we are doing jobs by database. 
QUEUE_CONNECTION=database

than setup smtp for gmail

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=yeasin.maakview@gmail.com
MAIL_PASSWORD=your gmail app password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=yeasin.maakview@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
#step three =>

Than create a mail by this command 
php artisan make:mail SendEmailWelcome

than you can write code as per your requirements
you can get example from my SendEmailWelcome.php file

Than you have to create blade file for email template and write code as per your requirements
or you can follow my welcome.blade.php file
 #step four =>
 Than create a job by this command 
 php artisan make:job SendWelcomeEmailJob file implements 
Here SendWelcomeEmailJob file implements ShouldQueue 
In this file you have to fire the specefic job like you can set a mail by this =>

SendWelcomeEmailJob.php

 public function handle()
    {
        $emails = ['15203045@iubat.edu','yeasinshuvo76@gmail.com','Civt-200538@dtiac','abdullahaltahssin@gmail.com'];
        foreach ($emails as $key => $email) {
            Mail::to($email)->send(new SendEmailWelcome('yeasin'));
        }
       
    }
    
  #step five =>
  THan you have to write the route for this job and dispatch the job 
  Route::get('test', function () {
    
    dispatch(new SendWelcomeEmailJob());

    dd('sent');
});

