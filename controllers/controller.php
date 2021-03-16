<?php

class Controller
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        session_destroy();
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function info1()
    {

        global $validator;
        global $dataLayer;
        global $member;
        $this->_f3->set('genders', $dataLayer->getGender());

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $first = $_POST['first'];
            $last = $_POST['last'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $premium = $_POST['premium'];
            var_dump($premium);
            if (!$validator->validFirst($first)) {
                $this->_f3->set("errors['first']", "Please enter a first name");
            }
            if (!$validator->validLast($last)) {
                $this->_f3->set("errors['last']", "Please enter a last name");
            }
            if (!$validator->validAge($age)) {
                $this->_f3->set("errors['age']", "Please enter a numeric between 118 and 18");
            }
            if (!$validator->validGender($gender)) {
                $this->_f3->set("errors['gender']", "Please select a gender");
            }
            if (!$validator->validPhone($phone)) {
                $this->_f3->set("errors['phone']", "Please enter a properly formatted number");
            }

            if (empty($this->_f3->get('errors'))) {
                if ($premium == "on") {

                    $_SESSION['member'] = new PremiumUser($first, $last, $age, $gender, $phone);
                } else {
                    $_SESSION['member'] = new User($first, $last, $age, $gender, $phone);

                }

                $this->_f3->reroute('order2');
            }
        }
        //Sticky

        $this->_f3->set('first', isset($first) ? $first : "");
        $this->_f3->set('last', isset($last) ? $last  : "");
        $this->_f3->set('age', isset($age) ? $age : "");
        $this->_f3->set('gender', isset($gender) ? $gender : "");
        $this->_f3->set('phone', isset($phone) ? $phone : "");
        $this->_f3->set('premium', isset($premium) ? $premium : "");

        $view = new Template();
        echo $view->render('views/info1.html');
    }
    function info2()
    {
        global $dataLayer;
        global $validator;
        global $member;
        var_dump($_SESSION);

        $this->_f3->set('states', $dataLayer->getStates());
        $this->_f3->set('seeking', $dataLayer->getSeeking());

        $member = unserialize($_SESSION['$member']);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $state = $_POST['state'];
            $seeking = $_POST['seeking'];
            $biography = $_POST['biography'];

            if (!$validator->validEmail($email)) {
                $this->_f3->set('errors["email"]', 'Email must be valid format and non-empty');
            }

            if (empty($this->_f3->get('errors'))) {
                $_SESSION['member']->setEmail($email);
                $_SESSION['member']->setState($state);
                $_SESSION['member']->setSeeking($seeking);
                $_SESSION['member']->setBiography($biography);

                if ($_SESSION['member']->isMember()) {
                    $this->_f3->reroute('/order3');
                } else {
                    $this->_f3->reroute('/summary');
                }
            }
        }
        $this->_f3->set('email', isset($email) ? $email : "");
        $this->_f3->set('state', isset($state) ? $state : "");
        $this->_f3->set('biography', isset($biography) ? $biography : "");
//        $this->_f3->set('seeking', isset($seeking) ? $seeking : "");
        $this->_f3->set('seeking', $dataLayer->getSeeking());
        $view = new Template();
        echo $view->render("views/info2.html");
    }

    function info3()
    {
        global $dataLayer;
        global $validator;

        $this->_f3->set('indoor', $dataLayer->getIndoor());
        $this->_f3->set('outdoor', $dataLayer->getOutdoor());
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($indoor)) {
                if (!$validator->validIndoor($indoor)) {
                    $this->_f3->set("errors['indoor']", "Not valid activity");
                }
                if (isset($outdoor)) {
                    if (!$validator->validOutdoor($outdoor)) {
                        $this->_f3->set("errors['indoor']", "Not valid activity");
                    }
                }
            }
            if (empty($this->_f3->get('errors'))) {
            $indoor = implode(', ', $_POST['indoor']);
            $outdoor = implode(', ', $_POST['outdoor']);
            if(isset($indoor)){
                $_SESSION['member']->setIndoor($indoor);
            } else {
                $_SESSION['member']->setIndoor("No chosen indoor interests!");
            }
            if(issset($outdoor)){
                $_SESSION['member']->setOutdoor($outdoor);
            } else {
                $_SESSION['member']->setOutdoor("No chosen outdoor interests");
            }
            $this->_f3->reroute('/summary');
            }
        }

        $view = new Template();
        echo $view->render('views/info3.html');
    }
    function summary()
    {
        global $database;

        $database->saveUsers($_SESSION['member']);
        $view = new Template();
        echo $view->render('views/summary.html');

        session_destroy();
    }
    function extracredit()
    {
        global $database;
        $this->_f3->set('members', $database->getUsers());
        $view = new Template();
        echo $view->render('views/ec.html');

    }
}
