<?php

if(!function_exists('siteUrl'))
{
	/**
	 * Generate absolute path by URI
	 *
	 * @param string $uri
	 * @return string
	 */
	function siteUrl(string $uri = '') : string
	{
		global $siteDetails;

		return $siteDetails['rootUrl'] . $uri;
	}
}