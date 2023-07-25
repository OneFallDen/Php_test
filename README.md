# How to start
- copy files and run apache
- to send request visit localhost/index.php/
    - GET
        - users/{userId} - get user
        - users/{userId}/posts - get users posts
        - users/{userId}/todos - get users todos
    - POST
        - posts and send body:{
            userID: int,
            title: str,
            body: str
        } - add new post
    - PUT
        - posts/{postId} and send x-www-form-unlencoded: id=int&title=str&body=str&userId=1 - update post
    - DELETE
        - posts/{postId} - delete post