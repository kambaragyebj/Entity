C:\Users\jkambaragye\Documents\Project\cis>git clone http://jkambaragye@172.21.72.71:8080/git/root/prehmisCIS.git

### Add Object relation mapping ##############
1. composer require orm

######## Create Database ######################

2. php bin/console doctrine:database:create

######### Add Entity /PHP file that will commuicate with the database ########################
3. composer require symfony/maker-bundle --dev
3.1 php bin/conole make:entity

Enter class Name of the Entity

User 

*************Two files are created **************

Src/Entity/User.php
Src/Repository/UserRepository.php / responsible for select queries 


****** Add New property name ******** /column name that correspond with column names in the database
> name
>string  | type ? to see other 


4.  php bin/conole make:migration | create table in the database
5.  php bin/console doctrine:migrations:migrate


*** UPDATE ENTITY AND DATABASE TABLE
1. php bin/conole make:entity Entity_Name| User
2. enter new propert
3. php bin/conole make:migration
4. php bin/console doctrine:migrations:migrate



****************drop entire database *****************

1. php bin/console doctrine:schema:drop --force --full-database

########## CONTROLLER #############################################

1. php bin/console make:controller DefaultController


        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);


        return $this->json(['username'=>'Jackson kambaragye']); for api



        return  new Response('Hello Misaki', $name);

        @Route("/default2/", name="default2")
        return $this->redirectToRoute('default2'); // Redirect to another route







############################ FORM ################################################

1. composer require symfony/form | forms in symfony are related to entity 

2. php bin/console make:form UserFormType based on the Entity u created

******************** Render form view in the controller ******************************

Add

use App\Form\UserFormType in the default controller


################# it enables codes to be automtoically excuted in the entity | have to be done on some event e.g persit event   ############

 @ORM\HasLifecycleCallbacks()