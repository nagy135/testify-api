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
+ class_id

### CClass
CClass because Class is reserved
+ id
+ name (varchar)

### Subject
+ id
+ name (varchar)

### Test
+ id
+ name (varchar)
#### foreign keys
+ subject_id

### TestResult
Is created when teacher gives test to student, waiting for his state change
+ id
+ state (string: pending, done, result)
+ score (integer)
+ deadline (datetime)
+ started_at (datetime)
+ ended_at (datetime)
+ length (integer, minutes)
#### foreign keys
+ test_id
+ user_id

### Question
+ id 
+ type (string, enum)
#### foreign keys
+ test_id
### polymorphism
+ real_image_id
+ real_image_type

### QuestionResult
+ id
+ state (string: pending, done, result)
+ score (integer)

#### foreign keys
+ question_id
+ user_id

### QuestionABC
+ id
+ question (varchar)
+ a (varchar)
+ b (varchar)
+ c (varchar)
+ d (varchar)
+ correct (varchar ('a', 'b', 'c', 'd'))
