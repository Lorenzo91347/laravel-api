# Laravel Many to Many
 
 Continuation of the One-To-Many exercise, this time a trial on building a many to many SQL relation between two tables,with the inclusion of a pivot tabel to allow them to communicate properly.

 -Created two migrations,one for the Technologies table,and one for the pivot table with two foreign keys and an index.
 -Created a seeder to populate the Technologies table.
 -Modified the 'create' and 'edit' blade files to allow to choose a technology.
 -Modified the controller to allow validation and database upload of the new attributes.