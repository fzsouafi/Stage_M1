# The Alpine Marmot Project web-interface

This interface allows to interact with the database of the Alpine Marmot Project , including entering and modifying data. 

For more information go on [the Alpine marmot project website](https://thealpinemarmotproject.org/) 

## CONTENTS OF THIS FILE

 * Getting started
 * Interface structure
 * Interface portability
 * Maintainers




## Getting Started

You can download the folder ` marmota_2` here on gitlab or you'll find it on the ` marmota_rw server ` the path to fin it is ` var/www/marmota/marmota_2 `.

[**LINK TO THE INTERFACE**](http://umr5558-marmota-dev.univ-lyon1.fr/marmota/marmot_2/)

Before doing anything else read all the READ ME.

## Interface structure

This inteface is built according to the model view controller (for more informations: https://book.cakephp.org/2/fr/cakephp-overview/understanding-model-view-controller.html). The language used are HTML, PHP (https://www.php.net/docs.php) and a little bit of java script.
 
Amoeba bootstrap template is used for this website. (AMOEBA :https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/)

Description of the folder/files according to the building model:

 - The view : It's all the files/folder that are only for the interface 
   - *array.php* : table allowing to link all the php files to reference and call them when needed
   - *before_field_page.php* : html code for the before field page
   - *contact_page.php* : html code for the contact page
   - *footer_backtop.php* : html code for the footer and back to top button (present on all pages)
   - *header.php* : html code for the header (present on all pages)
   - *index.php* : most important file, base of the interface, allow to direct/link the right file
   - *main_page.php* :html code for the main page

   - folder *form* : contain all the files form the forms which are each link to a controller file (eg: formAddHandlerYear.php link to controlAddHandlerYear.php)
   - folder *assets* : contain all the files for the "visuals effects"
     - *css* : contain the css file which determinate the syles for the html interface
     - *img* : contain all the pictures, favions, .. which are used
     - *js* : contain the java script fonction given with the bootstrap template
     - *vendor* : contain files and folder given with the bootstrap template



 - The controller : correspond to the *control* folder which contain all the files which makes le link between between the model and the forms.



 - The model :correspond to the *model* folder which contain a file model contening all the function that are used for interrract with the data base.


## Interface portability

After retrieving the interface folder it is important to make some changes to adapt it to the parent database: 

**Priority changes:**
 - in the ` model.php ` file change the database connection information :
 
'''

	$server='xxx'; //Server with dataBase
	$user='xxx'; //User to connect to DataBase
	$passWord='xxx; //Password for the user
	
'''
	
 - in the ` header.php ` file (VIEW) change the links for the Database

'''

	<li><a href="http://umr5558-marmota-dev.univ-lyon1.fr/phppgadmin/"> Database</a></li>
	
'''

 - in the `capture_page.php` file (VIEW) change the link to the capture form
	
'''

	<h4 class="title"> <a href="XXX"> <br> Add new capture <br></a></h4>
	
'''



**Secondary changes:**

- on the view you'll find the ` DB_diagram.png ` you need to replace it by the current database diagram (attention: keep the same file name !!!!)
- there is the possibility to add comments/description, areas have been set aside for this purpose


ATTENTION: if the marmota database is different from the one used to create the interface you'll need to check and modify most of the files, especially the control ones !!!!!!!!!!!!!!!!!


## Contributors

The marmota project is lead by A. COHAS and assist on the data base by L. HUMBLOT.

Version 1.0 : Fanny PONCE, Fatima SOUAFI, Malik TALBI et Xinyue JIANG.

## Versioning

Version 1.0 : 3/04/2020


## License

https://bootstrapmade.com/license/

## Acknowledgments

* F. DUCHATEAU: thank you for your help all along this project
