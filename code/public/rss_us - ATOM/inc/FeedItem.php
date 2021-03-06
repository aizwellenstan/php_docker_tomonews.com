<?php 
/***********************************************************************
 * @filename            : FeedItem.php
 * @author              : Siako Chen
 * @description         : FeedWriter class based on Anis uddin Ahmad' code
 * @created             : 2012-11-15
 * @modified            : 2013-12-04 
 ***********************************************************************/

class FeedItem
{
	private $elements = array();    //Collection of feed elements
	private $version;
	
	/**
	* Constructor
	* 
	* @param    contant     (RSS1/RSS2/ATOM) RSS2 is default.
	*/ 
	function __construct($version = RSS2)
	{
		$this->version = $version;
	}
	
	/**
	* Add an element to elements array
	* 
	* @access   public
	* @param    string  The tag name of an element
	* @param    string  The content of tag
	* @param    array   Attributes(if any) in 'attrName' => 'attrValue' format
	* @param    boolean Specifies, if an already existing element is overwritten.
	* @return   void
	*/
	public function addElement($elementName, $content, $attributes = null, $overwrite = FALSE)
	{
		// return if element already exists & if overwriting is disabled.
		if (isset($this->elements[$elementName]) && !$overwrite)
			return;

		$this->elements[$elementName]['name']       = $elementName;
		$this->elements[$elementName]['content']    = $content;
		$this->elements[$elementName]['attributes'] = $attributes;
	}
	
	/**
	* Set multiple feed elements from an array.
	* Elements which have attributes cannot be added by this method
	* 
	* @access   public
	* @param    array   array of elements in 'tagName' => 'tagContent' format.
	* @return   void
	*/
	public function addElementArray($elementArray)
	{
		if (!is_array($elementArray))
			return;

		foreach ($elementArray as $elementName => $content)
		{
			$this->addElement($elementName, $content);
		}
	}
	
	/**
	* Return the collection of elements in this feed item
	* 
	* @access   public
	* @return   array
	*/
	public function getElements()
	{
		return $this->elements;
	}

	/**
	* Return the type of this feed item
	* 
	* @access   public
	* @return   string  The feed type, as defined in FeedWriter.php
	*/
	public function getVersion()
	{
		return $this->version;
	}
	
	// Wrapper functions ------------------------------------------------------
	
	/**
	* Set the 'dscription' element of feed item
	* 
	* @access   public
	* @param    string  The content of 'description' or 'summary' element
	* @return   void
	*/
	public function setDescription($description)
	{
		$tag = ($this->version == ATOM) ? 'content' : 'description';
		$this->addElement($tag, $description);
	}
	
	/**
	* @desc     Set the 'title' element of feed item
	* @access   public
	* @param    string  The content of 'title' element
	* @return   void
	*/
	public function setTitle($title)
	{
		$this->addElement('title', $title);
	}
	
	/**
	* @desc     Set the 'category' element of feed item
	* @access   public
	* @param    string  The content of 'category' element
	* @return   void
	*/
	public function setCategory($category)
	{
		$this->addElement('category', $category);
	}
		
	/**
	* Set the 'date' element of feed item
	* 
	* @access   public
	* @param    string  The content of 'date' element
	* @return   void
	*/
	public function setDate($date)
	{
		if(!is_numeric($date))
		{
			if ($date instanceof DateTime)
			{
				if (version_compare(PHP_VERSION, '5.3.0', '>='))
					$date = $date->getTimestamp();
				else
					$date = strtotime($date->format('r'));
			}
			else
				$date = strtotime($date);
		}
		
		if($this->version == ATOM)
		{
			$tag    = 'updated';
			$value  = date(DATE_ATOM, $date);
		}
		elseif($this->version == RSS2)
		{
			$tag    = 'pubDate';
			$value  = date(DATE_RSS, $date);
		}
		else
		{
			$tag    = 'dc:date';
			$value  = date("Y-m-d", $date);
		}
		
		$this->addElement($tag, $value);
	}
	
	/**
	* Set the 'link' element of feed item
	* 
	* @access   public
	* @param    string  The content of 'link' element
	* @return   void
	*/
	public function setLink($link)
	{
		if($this->version == RSS2 || $this->version == RSS1)
		{
			$this->addElement('link', $link);
		}
		else
		{
			$this->addElement('link','',array('href'=>urlencode(str_replace(' ', '-', remove_punc($link))).'?utm_source=FB_chatbot'));
			$this->addElement('id', FeedWriter::uuid($link,'urn:uuid:'));
		}
	}
	
	/**
	* Set the 'encloser' element of feed item
	* For RSS 2.0 only
	* 
	* @access   public
	* @param    string  The url attribute of encloser tag
	* @param    string  The length attribute of encloser tag
	* @param    string  The type attribute of encloser tag
	* @return   void
	*/
	public function setEncloser($url, $length, $type)
	{
		if ($this->version != RSS2)
			return;

		$attributes = array('url'=>$url, 'length'=>$length, 'type'=>$type);
		$this->addElement('enclosure','',$attributes);
	}

	/**
	* Set the 'author' element of feed item
	* For ATOM only
	* 
	* @access   public
	* @param    string  The author of this item
	* @return   void
	*/
	public function setAuthor($author)
	{
		if ($this->version != ATOM)
			return;

		$this->addElement('author', array('name' => $author));
	}

	/**
	* Set the unique identifier of the feed item
	* 
	* @access   public
	* @param    string  The unique identifier of this item
	* @return   void
	*/
	public function setId($id)
	{
		if ($this->version == RSS2)
		{
			$this->addElement('guid', $id, array('isPermaLink' => 'false'));
		}
		else if ($this->version == ATOM)
		{
			$this->addElement('id', FeedWriter::uuid($id,'urn:uuid:'), NULL, TRUE);
		}
	}
	
 } // end of class FeedItem
 
 
 function remove_punc($x){
	$x=str_replace('-', '-', $x);
	$x=str_replace(' ', '-', $x);
	$x=str_replace(';', '-', $x);
	$x=str_replace('?', '-', $x);
	$x=str_replace('.', '-', $x);
	$x=str_replace(',', '-', $x);
	$x=str_replace('#', '-', $x);
	$x=str_replace('$', '-', $x);
	$x=str_replace('(', '-', $x);
	$x=str_replace(')', '-', $x);
	$x=str_replace('&', '-', $x);
	$x=str_replace('%', '-', $x);
	$x=str_replace('#', '-', $x);
	$x=str_replace('@', '-', $x);	
	$x=str_replace('=', '-', $x);
	$x=str_replace('|', '-', $x);
	$x=str_replace('/', '-', $x);
	$x=str_replace('"', '-', $x);
	$x=str_replace('|', '-', $x);
	$x=str_replace('!', '-', $x);
	$x=str_replace(':', '-', $x);
	$x=str_replace('???', '-', $x);
	$x=str_replace('???', '-', $x);
	$x=str_replace("'", '-', $x);
	$x=str_replace('--', '-', $x);
	$x=strtolower($x);
	return $x;
}
