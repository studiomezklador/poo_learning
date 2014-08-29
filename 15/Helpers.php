<?php

// A Hash function to share everywhere, in a more functional way
function getHash($str)
{
	return hash('sha256', $str);
}

