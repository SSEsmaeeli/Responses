
Demo: [Click to see the demo here](https://blog.ssesmaeeli.ir)

### Project Description
Installation:
This project is able to launch via docker, sail and also the larvel valet.

1- copy the sample env file into a new .env file and set the credential of database

2- composer install

3- php artisan key:generate

For Registering there is only need to go config file “sample_user.php” and set email and password you want.

For the first time you run this command:

php artisan migrate:fresh --seed
Two user will be created in the database, the default are

user:
email: Sajjad@gmail.com
password: password
admin:
email: admin@gmail.com
password: password
How I implemented Model States
This blog currently support drafting, publishing, review, and rejected for the post model. Hence every post as soon as created it is not published and it goes automatically to the draft state which is the only permitted state, the the author can request review by clicking on the “review” button.

An admin is the only role who can change the “review” status to publish.

In the view file, the available permitted states are presented based on the current state.

For implementing this idea, one possibility is using the available open source package which are made for this purpose.

GitHub - spatie/laravel-model-states: State support for models
This package adds state support to models. It combines concepts from the state pattern and state machines. It is…
github.com

This package very well addresses the problem and make the work easy but it is not still satisfying when in the controller this is mandatory to select the next step manually.

$payment->state->transitionTo(Paid::class);
ref: https://spatie.be/docs/laravel-model-states/v2/01-introduction

And it means for each controller and also each state type we need this manual decision.

Furthermore, if there are multiple choices for the next step, having conditional statements will be needed in controller or view file and it is not maintainable in a big project.

I was wondering is there any possibility to avoid this manual step and probable conditional statement. To answer this issue, I implement a new Model State Pattern from scratch which lets to bypass this step too.

Indeed what I did, each object is able to switch a strategy through invocations of methods defined in the pattern’s interface.

My main concern is answered by encapsulating varying behavior for the same object, based on its internal state. This can be a cleaner way for an object to change its behavior at runtime without resorting to conditional statements in view file or controller and thus improve maintainability.

How I implemented caching through Decorator Design Pattern.
Decorator pattern allows behavior to be added to an individual object without affecting other objects from the same class.

In my case, Caching is the behavior which is implemented in namespace CachedRepo\PostCachedREpo.php , and the object/class is PostRepo in namespace Repos\PostRepo.php.

By this approach I design the system to cache two different route resources. First showing the individual post will be cached then index of my posts is also cached.

Subscriber Design Pattern:
1-

How I implemented clearing cached Resource. Using a formal laravel event listener, as soon as any update is happening for the post model I dispatch and event, PostUpdated. Then ClearCachedPost as the Listener is responsible for clearing all already cached.

2-

As soon as the state of post is change the client receive a message using event listener

Facade design pattern:

Usually, we make two controllers for one for api and web. depending on the landing routes we process the request in two different controllers one for api and the other for web. Here the replication of logic can happen. Those two controllers then return api or web responses accordingly.

To have a cleaner and maintainable code and avoid replication of logics in two different controllers, I made an advanced design which made possible to have one controller for both api and web in a way that the controller won’t deal with first the request is coming from the api or web and second the decisioning of whether the json response is requested or not and also.

By following this approach all the controllers follow the same pattern and all have 3 layers.

Validation layer: processing and validating the input data
Service layer: Action classes which inside them depending on the logic we may have Repository classes or not.
Response layer: which a Facade is responsible for serveing the response
In this approach each individual controller is acting like a hub, when the received request is first validated by a form request, through a dependency injection in the controller then all the validated data will be passed to a service layer which is a class to do some actions (processing the data and business logics of the application). Then the response is using a facade which is responsible to decide whether the response should be for api or web.

Now a question arrises if through the validating data something failed, how we can handle the request? The solution is just customizing the Exception Handler class to return a response depending on the api or web.

The benefit of this kind of architect is:

Since we have one controller for serving both api and web it is more maintainable.
The response layer is extracted from the service layer and any modification on the response is faster.
The code is more testable that means since the service layer itself is decoupled itself, we can have more unit test on different layers of service layer.


### Milestones

1. Auth => sanctum for api, session for web ✅
2. Redis => Cache Layer => Decorator Pattern ✅
3. Policy ✅
4. Event Listener => Observer Pattern ✅
5. Job & Queue => Failed!
6. Notification (Email Sending) ✅
7. Post Like Count => Using Redis
8. Testing
9. Post State Pattern ✅
10. Observer Pattern => clear cache & uuid ✅
11. Dockerized project ✅
12. A sample module(package)
13. Postman Collection ✅
14. Swagger API Doc
15. Larastan Checks
16. Microscope Checks
17. Live the project on a production server  ✅
18. Add Registration

### Stories
1. Auth => sanctum for api, session for web 
 - User types Enum =>
   - admin
      - Change Status of Post
   - client
     - CRUD Post
 
2. Wrapped Cache
 
3. Authorization of resources
   - admin =>  Full access
   - client => Write access for his/her post only
4. Observer Pattern
   - clear post cache on update
   - change post status (see no. 6 for more information)
5. Job & Queue & schedule
   - Delete revoked sanctum tokens every 24 hrs
   - Persist Redis like count values in Mysql
   - like factory

6. Notification 
   - email sending

7. Post like count
   - Redis Sorted Sets

8. Testing
     - unit test
     - feature test
  
9. Post State Pattern
  
10. Observer Pattern => clear cache & uuid
  
  
11. Docker
        - sail
        - docker-compose for production
