<?php
class PremiumUser extends User
{

    private $_indoor;
    private $_outdoor;


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