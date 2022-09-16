### Milestones

1. Auth => sanctum for api, session for web 
2. Redis => Cache Layer => Decorator Pattern
3. Policy 
4. Event Listener => Observer Pattern
5. Job & Queue => Failed!
6. Notification (Email Sending)
7. Post Like Count => Using Redis
8. Testing
9. Post State Pattern 
10. Observer Pattern => clear cache & uuid
11. Dockerized project
12. A sample module(package)
 


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
