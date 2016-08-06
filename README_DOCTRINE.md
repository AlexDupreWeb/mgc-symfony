#DOCTRINE Documentation

## COMMANDS

Create an entity

    php bin/console generate:doctrine:entity


Update database when an entity is create, update or delete

    php app/console doctrine:schema:update --force


## PHP

Get One

Get All

Insert
$user
    ->setLogin('admin')
    ->setPassword('test')
    ->setEmail('admin@alexandre-dupre.fr')
    ->setGender('male')
    ->setSname('Admin')
    ->setFname('Admin')
    ->setAvatar('AVATAR')
    ->setIdCompany(0)
    ->setCompanyJob('Webmaster')
    ->setDateBirth($tmp_date)
    ->setDateCreated($tmp_date)
    ->setDateUpdated($tmp_date)
    ->setActive(false)
    ->setOrdre(30);

$em = $this->getDoctrine()->getEntityManager();
$em->persist($user);
$em->flush();

$user
    ->setLogin('test1')
    ->setPassword('test')
    ->setEmail('test1@alexandre-dupre.fr')
    ->setGender('male')
    ->setSname('Test1')
    ->setFname('Test1')
    ->setAvatar('AVATAR')
    ->setIdCompany(0)
    ->setCompanyJob('Tester')
    ->setDateBirth($tmp_date)
    ->setDateCreated($tmp_date)
    ->setDateUpdated($tmp_date)
    ->setActive(true)
    ->setOrdre(30);

$em = $this->getDoctrine()->getEntityManager();
$em->persist($user);
$em->flush();







$tmp_date= new \DateTime();

$user = new User();
$user
    ->setLogin('test2')
    ->setPassword('test')
    ->setEmail('test2@alexandre-dupre.fr')
    ->setGender('male')
    ->setSname('Test2')
    ->setFname('Test2')
    ->setAvatar('AVATAR')
    ->setIdCompany(0)
    ->setCompanyJob('Tester')
    ->setDateBirth($tmp_date)
    ->setDateCreated($tmp_date)
    ->setDateUpdated($tmp_date)
    ->setActive(true)
    ->setOrdre(30);


$em = $this->getDoctrine()->getEntityManager();
$em->persist($user);
$em->flush();


Update

Delete