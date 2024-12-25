
# Advanced Version 2 of Geographical Management System

This project is a continuation of version 1, enhanced with Object-Oriented Programming (OOP) in PHP to introduce new features, optimize entity management, and improve the user interface for a modern and ergonomic experience.

---

## Features

### **User Stories**
1. **Designer Tasks**:
   - Correct and improve the use case diagram from version 1.
   - Create a UML class diagram representing the application's structure.

2. **Back-End Developer Tasks**:
   - Implement an OOP architecture for the following entities:
     - **Continent**: `ID`, `Nom`, `Nombre de pays`.
     - **Country**: `ID_Pays`, `Nom_Pays`, `Population_Pays`, `Langue_Pays`, `Continent associé`.
     - **City**: `IDCity`, `Name_City`, `Description_City`, `Type_City` (capital or other), `Associated country`.

   - Develop PHP classes with these functionalities:
     - User/Admin authentication.
     - Add a continent, country, or city along with their information.
     - Modify or delete continents, countries, or cities.
     - View lists of continents, countries, and cities with their details.

   - Centralize database connection and SQL queries using PDO in a dedicated class (`DataBase Management`), including:
     - Secure data management with prepared statements.
     - Utilize predefined PHP functions for efficient data handling.

---

## Bonus Features

- **Generalization**: Extend the system to manage all continents.
- **Search Engine**: Quickly access country or city information.
- **Dynamic Filters**:
  - Filter countries by continent.
  - Filter cities by type (capital or other).
- **Dynamic Statistics**:
  - Count of cities by country.
  - Count of countries per continent.
  - Identify the continent with the largest population.
  - Identify the most populated city on each continent.

---

## Deliverables

- Fully functional OOP-based back end with the listed features.
- Updated use case diagram and UML class diagram.
- A modernized UI/UX for better usability.

**Note**: Incomplete deliverables will result in the invalidation of the skill set.

---

## Technologies Used

- **Back-End**: PHP (Object-Oriented Programming), PDO for database management.
- **Database**: MySQL or any relational database supporting SQL.
- **UI/UX**: HTML, CSS, and JavaScript for a modern and ergonomic design.

