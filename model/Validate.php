<?php

class Validate
{
    /**
     * @var DataLayer
     */
    private $_dataLayer;

    /**
     * Validate constructor.
     */
    public function __construct()
    {
        $this->_dataLayer = new DataLayer();
    }

    /* Validate a first
     * Food must not be empty and may only consist
     * of alphabetic characters.
     *
     * @param String first
     * @return boolean
     */
    function validFirst($first)
    {
        return !empty($first) && ctype_alpha($first);
    }

    /* Validate quantity
     * Quantity must not be empty and must be a number
     * greater than 1.
     *
     * @param String last
     * @return boolean
     */
    function validLast($last)
    {
        return !empty($last) && ctype_alpha($last);
    }

    /* Validate Age
     * Age must be numeric
     *
     */
    function validAge($age)
    {
        return !empty($age) && ctype_digit($age) && $age > 18 && $age < 118;
    }

    /* Validate a gender
     *
     *
     * @param String gender
     * @return boolean
     */
    function validGender($gender)
    {
        global $f3;
        return in_array($gender, $f3->get('genders'));
    }

    /* Validate Phone
     *
     * @param String phone
     * valid if phone is a numeric or not empty
     */
    function validPhone($phone)
    {
        return !empty($phone) && ctype_digit($phone);
    }

    /* Validate Email
     *
     * @param String email
     * validate whether the input will be an accurate email or not
     */
    function validEmail($email)
    {
        // Checks if valid email
        return !empty($email)
            && (filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    /* Validate Outdoor
     *
     * @param String outdoor
     * validate indoor inputs.
     */
    function validOutdoor($outdoor)
    {
        global $f3;

        if (empty($outdoor)) {
            return true;
        }

        //But if there are condiments, we need to make sure they're valid
        foreach ($outdoor as $outdoors) {
            if (!in_array($outdoors, $f3->get('outdoor'))) {
                return false;
            }
        }
        return true;
    }

    /* Validate Indoor
     *
     * @param String indoor
     * validate indoor inputs.
     */
    function validIndoor($indoor)
    {
        global $f3;

        if (empty($indoor)) {
            return true;
        }

        //But if there are condiments, we need to make sure they're valid
        foreach ($indoor as $indoors) {
            if (!in_array($indoors, $f3->get('indoor'))) {
                return false;
            }
        }

        return true;
    }

    /* Validate seeking
     *
     * @param String seeking
     * @return boolean
     */
    function validSeeking($seeking)
    {
        if (empty($seeking)) {
            return true;
        }
        return true;
    }

    /* Validate Biography
     *
     * @param String biography
     * @return boolean
     */
    function validBiography($biography)
    {
        return !empty($biography);
    }

    /*
     * Validate State
     * placeholder
     */
    function validState($state)
    {
        return !empty($state);
    }


}
