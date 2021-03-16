<?php
//CREATE TABLE users (
//	id int unsigned AUTO_INCREMENT PRIMARY KEY,
//	first varchar(30) NOT NULL,
//	last varchar(30) NOT NULL,
//	age varchar(10) NOT NULL,
//    gender varchar(30) NOT NULL,
//    phone varchar(30) NOT NULL,
//    email varchar(30) NOT NULL,
//    state varchar(30) NOT NULL,
//    seeking varchar(30) NOT NULL,
//    biography text,
//    interests varchar(200) DEFAULT NULL,
//    premium varchar(10) DEFAULT NULL,
//    image varchar(200) DEFAULT NULL );
class Database
{
    private $_dbh;

    function __construct($dbh)
    {
        $this->_dbh = $dbh;
    }
    function getUsers()
    {
        $sql = 'SELECT * FROM users ORDER BY last, first';
        $statement = $this->_dbh->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    function saveUsers($member)
    {
        $sql = 'INSERT INTO users (first, last, age, gender, phone, email, state, seeking, biography, premium, interests, image)
               VALUES (:first, :last, :age, :gender, :phone, :email, :state, :seeking, :biography, :premium, :interests, :image)';
        $statement = $this->_dbh->prepare($sql);
        $premium = null;
        $interests = "";
        $image = "thisimage.png";
        if ($member->isMember()){
            $premium = true;
            $interests = $_SESSION['member']->getIndoor() . $_SESSION['member']->getOutdoor();
        }
        $statement->bindParam(':first', $member->getFirst(), PDO::PARAM_STR );
        $statement->bindParam(':last', $member->getLast(), PDO::PARAM_STR );
        $statement->bindParam(':age', $member->getAge(), PDO::PARAM_STR );
        $statement->bindParam(':gender', $member->getGender(), PDO::PARAM_STR );
        $statement->bindParam(':phone', $member->getPhone(), PDO::PARAM_STR );
        $statement->bindParam(':email', $member->getEmail(), PDO::PARAM_STR );
        $statement->bindParam(':state', $member->getState(), PDO::PARAM_STR );
        $statement->bindParam(':seeking', $member->getSeeking(), PDO::PARAM_STR );
        $statement->bindParam(':biography', $member->getBiography(), PDO::PARAM_STR );
        $statement->bindParam(':premium', $premium, PDO::PARAM_STR );
        $statement->bindParam(':interests', $interests, PDO::PARAM_STR );
        $statement->bindParam(':image', $image, PDO::PARAM_STR );
        $statement->execute();
    }
}
