<?php
class PremiumUser extends User
{

    private $_indoor;
    private $_outdoor;

    public function __construct($_first, $_last, $_age, $_gender, $_phone, $_member = true, $_indoor = "", $_outdoor = "")
    {
        parent::__construct($_first, $_last, $_age, $_gender, $_phone, $_member);
        $this->_indoor = $_indoor;
        $this->_outdoor = $_outdoor;
    }

    public function isMember(): bool
    {
        return true;
    }
    /**
     * @return mixed|string
     */
    public function getIndoor()
    {
        return $this->_indoor;
    }

    /**
     * @param mixed|string $indoor
     */
    public function setIndoor($indoor)
    {
        $this->_indoor = $indoor;
    }

    /**
     * @return mixed|string
     */
    public function getOutdoor()
    {
        return $this->_outdoor;
    }

    /**
     * @param mixed|string $outdoor
     */
    public function setOutdoor($outdoor)
    {
        $this->_outdoor = $outdoor;
    }


}