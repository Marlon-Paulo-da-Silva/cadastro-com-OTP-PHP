<?php

function generateToken()
{
    return rtrim(strtr(base64_encode(getRandomNumber()), '+/', '-_'), '=');
}

function getRandomNumber()
{
    return hash('sha256', uniqid(mt_rand(), true), true);
}