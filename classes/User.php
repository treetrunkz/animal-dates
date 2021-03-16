<?php

class User
{
    private $_first;
    private $_last;
    private $_age;
    private $_gender;
    private $_phone;
    private $_member;
    private $_email;
    private $_state;
    private $_seeking;
    private $_biography;
    private $_indoor = "";
    private $_outdoor = "";

    public function __construct($_first, $_last, $_age, $_gender, $_phone, $_member = false)
    {
        $this->_first = $_first;
        $this->_last = $_last;
        $this->_age = $_age;
        $this->_gender = $_gender;
        $this->_phone = $_phone;
        $this->_member = $_member;
    }
    public function isMember()
    {
        return false;
    }
    /**
     * @return mixed
     */
    public function getFirst()
    {
        return $this->_first;
    }

    /**
     * @param mixed $first
     */
    public function setFirst($first)
    {
        $this->_first = $first;
    }

    /**
     * @return mixed
     */
    public function getLast()
    {
        return $this->_last;
    }

    /**
     * @param mixed $last
     */
    public function setLast($last)
    {
        $this->_last = $last;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getMember()
    {
        return $this->_member;
    }

    /**
     * @param mixed $member
     */
    public function setMember($member)
    {
        $this->_member = $member;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return mixed
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * @param mixed $seeking
     */

    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * @return mixed
     */
    public function getBiography()
    {
        return $this->_biography;
    }

    /**
     * @param mixed $biography
     */
    public function setBiography($biography)
    {
        $this->_biography = $biography;
    }
    /**
     * @return mixed|string
     */
    public function getOutdoor()
    {
        return "";
    }

    /**
     * @param mixed|string $outdoor
     */
    public function setOutdoor($outdoor)
    {
        return "";
    }
}