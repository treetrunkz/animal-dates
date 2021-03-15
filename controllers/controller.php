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


        $this->_f3->set('genders', $dataLayer->getGender());
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $first = $_POST['first'];
            $last = $_POST['last'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $phone = $_POST['mobile'];
            $premium = $_POST['premium'];

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
                    $member = new PremiumUser($first, $last, $age, $gender, $phone);
                    $_SESSION['member'] = serialize($member);
                } else {
                    $member = new User($first, $last, $age, $gender, $phone);
                    $_SESSION['member'] = serialize($member);
                }

                $this->_f3->reroute('/order2');
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
        echo $view->render('/order1');
    }
    function info2()
    {
        global $dataLayer;
        global $validator;
        $this->_f3->set('states', $dataLayer->getStates());
        $this->_f3->set('seeking', $dataLayer->getSeeking());
        var_dump($_SESSION);
        $view = new Template();
        echo $view->render('views/info2.html');
    }
    function info3()
    {
        $view = new Template();
        echo $view->render('views/info3.html');
    }
    function summary()
    {
        $view = new Template();
        echo $view->render('views/summary.html');
    }
}
