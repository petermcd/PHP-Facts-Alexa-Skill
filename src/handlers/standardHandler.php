<?php

class standardHandler{
    public $alexa;
    public function GetFact(){
        $facts = array('P H P has been primarily written in the C language.',
            'The language was created in 1995 by Rasmus Lerdorf.',
            'P H P is licensed under the P H P licence. Although designed to be an open source licence it is not considered a copy left licence by the Free Software Foundation. This due to restrictions on the term P H P.',
            'P H P was originally called Personal Home Page Tools, this was later changed to P H P Hypertext Pre-processor. Yes, that is correct, the P in P H P stands for P H P.',
            'The current major version of P H P is 7. Prior to this it was 5. Much work took place to try to make P H P fully Unicode compliant however this proved a much larger task than expected. This was version 6; however, the code base was abandoned therefore version 6 was never officially released.',
            'There are currently over 4600 open bugs on the P H P bug tracker. The oldest being opened on the 16th of August 2001, this bug does on occasion receive comments.',
            'There are many ways to contribute to P H P at all levels. These range from contributing to the core language through to helping writing tests and updating documentation.',
            'If you find a bug within P H P this can be easily reported by visiting bugs dot p h p dot net. Be sure to check to see if the bug has already been created.',
            'P H P powers some of the biggest sites on the internet. These include Facebook and Wikipedia.',
            'W 3 techs dot com estimates that around 82% of the internet is powered by P H P with P H P 5 still being the most popular major version.',
            'As P H P developers, we are spoiled by the quality of the documentation located on P H P dot net. In general, the documentation has descriptive information about each function and option within the language as well as many easily understandable code examples.',
            'Prior to 2012 releases of new versions of P H P were spontaneous. Since, efforts have been made to ensure a new dot release is released on a yearly basis. This has helped bring more stability to the language that allows developers see when a new version will be released and when support for older versions will also be dropped.',
            'After a dot release such as 7 point 1 it is supported for 3 years from the date of release.',
            'New versions of P H P not only remove bugs but also add new functionality. Although efforts are made to make things as backward compatible as possible there is always a chance that a new version will remove older functionality. It is important to ensure that you keep on top of deprecated features and find alternatives prior to the final removal of that feature. Having error reporting set to E All on a dev environment is a good way to help identify such features however these are also documented in the release notes.',
            'P H P has a thriving user group community. These can often be found by a simple Google search or a search on sites such as Event Brite. Unable to locate one in your area? Why not create one yourself. P H P dot net has some guidance on how you can go about this. Other user group organisers are also usually willing to give advice.',
            'Conference are an important part of the community. Not only do you get to see some great talks by some leading experts in the community, but you also get to meet other like-minded developers.'
        );
        $reprompts = array('How about another fact?',
            'Would you like another fact?',
            'I have further facts. Would you like one.');
        $this->alexa->response->speak($facts[array_rand($facts, 1)] . ' ' . $reprompts[array_rand($reprompts, 1)]);
        $this->alexa->response->listen($reprompts[array_rand($reprompts, 1)]);
        $this->alexa->response->emit();
    }
    public function AMAZONCancelIntent(){
        $this->AMAZONStopIntent();
    }
    public function AMAZONHelpIntent(){
        $speak = 'My main purpose is to give you facts regarding P H P. Simply ask for a fact and I will give you a random fact from my list. Would you like a fact?';
        $reprompt = 'Is there anything else you would like?';
        $this->alexa->response->speak($speak)->listen($reprompt);
        $this->alexa->response->emit();
    }
    public function About(){
        $about = 'The P H P facts skill was created by Peter McDonald who is the creator of the Alexa Skills Kit S D K For P H P. The skill was created to show how much easier it is to create a skill in P H P using the S D K. Peter is always looking for assistance with the S D K so why not check it out on GitHub where it is freely available.';
        $reprompt = 'What else can I do for you?';
        $this->alexa->response->speak($about . ' ' . $reprompt)->listen($reprompt);
        $this->alexa->response->emit();
    }
    public function AMAZONStopIntent(){
        $speak = 'Thank you for stopping by. Be sure to check back soon, we are always adding new facts.';
        $this->alexa->response->speak($speak);
        $this->alexa->response->emit();
    }
    public function AMAZONYesIntent(){
        $this->GetFact();
    }
    public function AMAZONNoIntent(){
        $this->AMAZONStopIntent();
    }
    public function LaunchRequest(){
        $speak = 'Welcome to P H P facts. Would you like a fact?';
        $reprompt = 'If you would like a fact simply say \'I would like a fact\'. For further help simply ask for help.';
        $this->alexa->response->speak($speak)->listen($reprompt);
        $this->alexa->response->emit();
    }
    public function SessionEndedRequest(){
        $this->alexa->response->emit(true);
    }
}