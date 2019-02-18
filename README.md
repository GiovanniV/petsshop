### Pet Store
Imagine that you run an pet shop. You sell three different type of animals – Dogs, Cats, and Reptiles. You have multiple pets of each type available (i.e Hounds or Mutts or , Calicos, Turtles...). You also sell Pet toys and Pet Carriers.

Your store has a cataloging issue however! You need a way to search and filter your merchandise for easier visibility into your stores situation.

1. Your first challenge is to create and list all objects in the store.
2. Your second challenge is to sort and filter these objects by attributes associated to the objects.

The items in the store must share at least 1 attribute between them. If your catalog is sorted by an attribute, an object with this attribute not equal to the requested value will not show up.

**Attribute Ideas:**
- Pet Type
- Item Type
- Color
- Lifespan (Required)
- Age (Required)
- Price (Required)

Finally, your store offers discounts, but only on pets who's age is over half of it's project lifespan (i.e. Dogs live 12 years on average, so a dog at age 6 would be discounted).

Utilizing Object Oriented Programming, design and build a system that will store the listed information. Your submitted solution should contain not only the source code for the classes you have created, but also contain example usage of these classes. Please do not utilize pre-built frameworks.

**Your store must:**
- Have at least 5 of every object type (Dogs, Cats, Reptiles, Toys Carriers)
- Offer at least 5 items with a discount
- Sort and filter current objects by specific attributes of your choice (i.e. Item Type, Life Span, Pet Color)

**solution**

I have used mysql and php oop to get above question solution 
take clone of this repositoty and and run** composer dump **command to step auto loader import sql in db as per as your mysql crednetial

here once you are going to create object then you have to insert recod also if record not found it db to get proper result
based on requirement I have created some url access the all possible object and filter functionality
I have created attribute as drop donw
- Pet Type
(1, 'Hounds'),
(2, 'Mutts'),
(3, 'Calicos'),
(4, 'Turtles');
- Item Type
(1, 'cat'),
(2, 'dog'),
(3, 'Reptiles'),
(4, 'Pet toys'),
(5, 'Pet Carriers');
- Color
(1, 'red'),
(2, 'green'),
(3, 'blue'),
(4, 'black');
/index.php
which fetch all the store object like Dogs, cats,.........
$queryBuilder->getAllItems('animals'); here animals is db and output is coming with print_r 
  /**
     * @param string $table
     * @param int $types
     * @param int $color
     * @param int $pets
     * @param float $disc
     * @return array
     */
- public function getAllItems(string $table, int $types=0, int $color=0, int $pets=0, float $disc=0.0)
- even here you can pass param above and it show filter data
- see below fetch data based on object
- /cats.php
- $results=$cats->getAllCats();
- /dogs.php
- $results=$cats->getAllDogs();
- /pettoys.php
- $results=$pet->getAllPetToys();
- /cats.php
- $results=$cats->getAllReptiles();
- /cats.php
- $results=$cats->getAllToysCarriers();

