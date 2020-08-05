Eloquent relationships
=======================

There are may eloquent relationships - belongsTo, hasMany, hasOne, belongsToMany.

examples:

post belongs to a user
user has many posts

post has many tags
tag belongs to many posts

Database tables
----------------

To create a relationship between articles and users:

1. Create a users table (parent table)
2. Create an posts table (child table). 

N.b. if a user is delete the relationship still exists with the apost.

Foreign key
----------
The posts table needs a user_id column and this will be the foreign key.

A foreign key constraint is used to link two tables together. Field(s) in the child table refers to the primary key of the parent table.  A foreign key constraing prevents 
actions from destroying the link and also prevents invalid data.

Create a foreign key as follows:

In Sql server:

```
CREATE TABLE posts (
user_id int FOREIGN KEY REFERENCES users(user_id)
);

In mysql:
```

FOREIGN KEY(user_i) REFERENCES users(user_id)
```
Models
---------

Post model:

```
 public function user() {
        return $this->belongsTo(User::class);
             } 

             public function tags() {
                return $this->belongsToMany(Tag::class);
                     } 
```
N.b. if you want to refer to the user as an author instead you can set this as the second argument to override the foreign key e.g.

```
public function author() {
return $this->belongsTo(User::class, 'user_id')
}

```
User model:

```
 public function posts() {
                return $this->hasMany(Post::class);
                     } 
                     
```

