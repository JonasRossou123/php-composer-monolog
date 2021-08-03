# Title: MVC/Twig

- Repository: `mvc-twig-symfony`
- Type of Challenge: `Learning challenge`
- Duration: `1 day`
- Deployment strategy : `NA`
- Team challenge : `solo`

## Project contributors:
- Jonas Rossou

## Learning objectives?
- To be able to manage packages with composer
- Understand what composer does for you
- Work with monolog
- Get used to work with different handlers


## The Mission
We are going to use a popular open source tool to log messages: monolog. To manage this external package we will use composer


## What did I learn from this exercise
- Learning about composer and handle packages
- Basic understanding of Monolog
- Learn to find a workaround if a package is outdated
- Log to a file with StreamHandler
- Email a log with NativeMailerHandler
- Console log with ChromePHPHandler
- Routing with {path}
- Passing data from twig to controller (with a post method)

## Struggles
limited information when it comes to trouble shooting. Some of the packages were outdated and trying to find an alternative wasn't that easy.

## Must-have features
Use the buttons.html page to submit log messages and write the message in a log file.

Write each color of buttons to a different file:

info: info.log and send the messages to browser console using BrowserConsoleHandler
warning: warning.log
danger: warning.log and email these messages using NativeMailerHandler
dark: emergency.log and email these messages using NativeMailerHandler
You do not need to use an if to get the messages written in different files

## Nice to have features
Try to experiment with different Monolog features like different Handlers!

