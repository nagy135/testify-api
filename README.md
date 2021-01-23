# Testify-API

laravel/php8

## Models

### User
+ id
+ firstname
+ lastname
+ email
+ password

#### foreign keys
+ class

### Class
+ id
+ name

### Subject
+ id
+ name

### Test
+ id
+ name
#### foreign keys
+ subject

### Question
+ id 
#### foreign keys
+ test

### TestResult
Is created when teacher gives test to student, waiting for his state change
+ id
+ state (pending, done, result)
+ result (%)
+ deadline (timestamp)
#### foreign keys
+ test
+ user
