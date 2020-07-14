<?php
  
namespace App\Http\Controllers;
  
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\Validator;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
  
        $botman->hears('{message}', function($botman, $message) {
            $this->askEmail($botman);  
        });
  
        $botman->listen();
    }

    public function askEmail($botman)
    {
        $botman->ask('May I know your email so we can reach you.', function(Answer $answer) use ($botman) {
            $email = $answer->getText();

            $validator = Validator::make(['email' =>$email],[
                'email' => 'email',
            ]);
            if (!$validator) {
                return $this->repeat('That doesn\'t look like a vilad email, please enter a valid email.');
            }
  
            $this->say('Thank you..');
            // $this->askIssue($botman);
        });
    }

    public function askIssue($botman)
    {
        $botman->ask('How can we help you?', function(Answer $answer)  use ($botman){
  
            $issue = $answer->getText();
  
            $this->say('Your complain has beend received.');
            $this->say('And is beeing addressed');
            $this->say('We will be in touch.');
        });
    }
  
    /**
     * Place your BotMan logic here.
`     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer)  use ($botman){
  
            $name = $answer->getText();
  
            $this->say('Nice to meet you '.$name);
            $a = $this->askEmail($botman);
        });
        
    }

}