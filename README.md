Thank you for taking the time to complete this task. We appreciate your effort and look forward to reviewing your submission.

We would like you to create a basic Laravel API called **“Laravel Tech Task Demo API”**. The purpose of the API is to display, add, edit and delete tasks.

## Key criteria:
1. A task is formed of a name (min 3, max 100 characters) and a description (min 10, max 5000 characters).
2. All users can view all tasks.
3. Only the user that created a task can edit or delete that task. Provide the means to do this within the response when a task is added or updated.
4. No user accounts are to be created/ nor required.
5. Should be a RESTful API with a base of: `/api/tasks`.
6. Uses a NoSQL database (this is already setup)
7. Appropriate Unit Tests.
8. Use Laravel Best Practices.

## Bonus Criteria:
1. All requests should be logged in a log file via middleware.
2. Implement Soft Deleting.

## Submission:
1. Respond to the email you received with a link to the fork of this repository with your solution in. Please include a `.env` file within your repository.
2. The three commands which will be used to run your solution will be:
    1. `composer install`
    2. `php artisan migrate`
    3. `php artisan serve`
