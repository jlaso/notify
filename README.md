A proof of concept, trying to apply DDD

Install dependencies with composer install

you have to copy the file config/container-config-dev.dis.php as config/container-config-dev.php and put 
your config details into it

you can regenerate or create the db launching the command php bin/regenerate-db.php

You can see in the project several layers in order to have not coupled the different things.

Please be free to comment something. I tried to apply all the stuff I read about this but I'm not pretty sure
to understand very well some concepts.