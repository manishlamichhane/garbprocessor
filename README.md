# About garbProcessor

garbProcessor is a supplement of noCo2 project. Both of them together show the flexibility and power of Software Oriented Architecture. noCo2 collects garbage consumption data from the users and makes it available via an API. garbProcessor fetches the data from the API of noCo2 and displays it in graph representing different relationships and trends between different entities. noCo2 can be thought of as a Garbage Collector company while garbProcessor can be considered as a company utilising the data produced by noCo2. Both are very minimally dependent on each other.

# Installation

1. Clone the repo
2. Create database with name dbgarbprocessor_2016 and update the root/application/config/database.php with appropriate db values
3. Make sure that noCo2 is running (in case you dont run it in default laravel port 8000, you might have to change the urls to which the home controller makes data requests to)

4. Done
