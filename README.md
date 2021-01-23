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

### Class
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
+ result (integer)
+ deadline (timestamp)
#### foreign keys
+ test_id
+ user_id

### Question
+ id 
+ type (string, enum)
#### foreign keys
+ real_question_id
+ test_id

### QuestionABC
+ id
+ question (varchar)
+ a (varchar)
+ b (varchar)
+ c (varchar)
+ d (varchar)
+ correct (varchar ('a', 'b', 'c', 'd'))
