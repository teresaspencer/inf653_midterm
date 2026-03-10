
## Project Outline
This is an outline and emphasizes what you MUST have to receive any points for your project.

Your Project submission in Blackboard must include:

1) A link to your GitHub code repository (no updates after the due date accepted) - required for a grade on your project.

2) A link to your deployed project - required for a grade on your project.

3) A one page PDF document discussing what challenges you faced while building your project. - 10pts (not providing this will be enough to drop one letter grade)

4) Not submitted in Blackboard - The additional submission of the Automated Tests for your REST API => You will see very detailed tests and the submission button for this on the automated testing page. 90pts

Project total points: 100

## Tips/Suggestions
authors/categories are identical - start there

Here is how you can get the value of the HTTP request method:
```$method = $_SERVER['REQUEST_METHOD'];```

## Example project that passes the automated tests: 

https://docker-inf653-midterm-example.onrender.com/

WARNING: If you are careless with the data, it won't be a good example. 

You can delete and update data in this example. However, that won't be good housekeeping for others who need to see the results it provides. 

RULE: Leave the data the way you found it. 

Start by requesting all of the quotes, authors, and categories. Save the responses in a text file. 

Then if you delete something, use a post request to put it back. 

If you update something, use put request to change it back to its original state. 

When running the automated tests, the POST requests insert data and the DELETE requests remove data. If all of your endpoints are working properly, this will balance out. Check the developer console in the browser for a count of how many records you started and ended with in each table.

Thank you for helping me keep this example in a state that will pass the automated tests and provide a good example for others.