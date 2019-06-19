<?php
require_once 'dbconn.php';
$conn = openCon();
try{
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET FOREIGN_KEY_CHECKS = 0;
                TRUNCATE TABLE job_type;
                TRUNCATE TABLE user;
                TRUNCATE TABLE user_profile;
                TRUNCATE TABLE job;
                TRUNCATE TABLE review;
                TRUNCATE TABLE user_message;
                SET FOREIGN_KEY_CHECKS = 1;");
    $sql = "INSERT INTO job_type (name, difficulty)
                VALUES  ('Gradinarit', 1),
                        ('Babysitting', 2),
                        ('Plimbat caini', 1),
                        ('Spalare masina', 2),
                        ('Mutare mobila', 2),
                        ('Curatare casa', 3),
                        ('Editat imagini', 3),
                        ('Reparat calculator', 3);
             CALL addUser('mihai','1','mihai@mail.com','Mihai','Vanca');
             CALL addUser('andrei','1','andrei@mail.com','Andrei','Basescu');
             CALL addUser('mircea','1','mircea@mail.com','Mircea','Marin');
             CALL addUser('denis','1','denis@mail.com','Denis','Gucci');
             CALL addUser('flaviu','1','flaviu@mail.com','Flaviu','Popa');
             INSERT INTO job (fk_id_employer, fk_id_employee, fk_type, description)
                VALUES  (1,3,1,'Am nevoie de cineva sa tunda iarba intr-o curte de 200mp(primiti bonus limonada)'),
                        (5,4,4,'Angajez un tanar sa imi curete masina manual deoarece nu am incredere in spalatoriile automate de la benzinarii deoarece cred ca imi strica vopseaua. Pe langa o plata substantiala mai primiti si gogosi de la sotie.'),
                        (4,NULL,5,'URGENT !! Trebuie sa scot toata mobila din apartament deoarece vor veni baietii de la deratizare si m-au sfatuit sa golesc apartamentul din cauza substantelor toxice. De preferat un baiat mai voinic, sa mearga lucrurile mai repede fiindca nu am foarte mult timp la dispozitie.')";
    $conn->exec($sql);
}catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}
?>