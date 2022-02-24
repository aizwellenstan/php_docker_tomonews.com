<?php 
/***********************************************************************
 * @filename            : FeedTypes.php
 * @author              : Siako Chen
 * @description         : FeedWriter class based on Anis uddin Ahmad' code
 * @created             : 2012-11-15
 * @modified            : 2013-12-04 
 ***********************************************************************/

if (!class_exists('FeedWriter'))
	require dirname(__FILE__) . '/FeedWriter.php';

/**
 * Wrapper for creating RSS1 feeds
 *
 * @package     UniversalFeedWriter
 */
class RSS1FeedWriter extends FeedWriter
{
	function __construct()
	{
		parent::__construct(RSS1);
	}
}

/**
 * Wrapper for creating RSS2 feeds
 *
 * @package     UniversalFeedWriter
 */
class RSS2FeedWriter extends FeedWriter
{
	function __construct()
	{
		parent::__construct(RSS2);
	}
}

/**
 * Wrapper for creating ATOM feeds
 *
 * @package     UniversalFeedWriter
 */
class ATOMFeedWriter extends FeedWriter
{
	function __construct()
	{
		parent::__construct(ATOM);
	}
}
