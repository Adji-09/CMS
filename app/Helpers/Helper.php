<?php

function active($path) {
	return Request::is($path) ? 'active' :  '';
}