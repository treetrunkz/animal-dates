<?php

class DataLayer
{
    function getIndoor()
    {
        return array("Drawing", "TV", "Movies", "Acting", "Dancing", "Guitar", "Flute", "Piano", "Break Dancing", "Yoga");

    }

    function getOutdoor()
    {
        return array("Disc Golf", "Running", "Star Gazing", "Snow Sledding", "Shooting", "Cooking", "SnowBoarding", "Skiing");

    }
    function getGender()
    {
        return array('Male', "Female", 'Trans-Fem', 'Trans-Masc', 'Non-Binary');
    }
    function getStates()
    {
        return array('AL', 'AK', 'AS', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FM', 'FL', 'GA',
            'GU', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MH', 'MD', 'MA',
            'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND',
            'MP', 'OH', 'OK', 'OR', 'PW', 'PA', 'PR', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT',
            'VT', 'VI', 'VA', 'WA', 'WV', 'WI', 'WY');
    }

    function getSeeking()
    {
        return array('Male', 'Female', 'Trans-Fem', 'Trans-Masc', 'Non-Binary');
    }
}