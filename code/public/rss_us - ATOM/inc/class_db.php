<?php 
/***********************************************************************
 * @filename            : inc/class_db.php
 * @author              : Siako Chen
 * @description         : database class
 * @created             : 2004-07-13
 * @modified            : 2004-07-13
 * @req-constants       : DEBUG, EMAIL_DEVELOPER
 * @req-functions       :
 * @req-classes         :
 ***********************************************************************/

class DB
{
    
    /***** Class Variables *****/
    var $_link; # connection resource
    var $_query_string; # query string
    var $_error_string; # error string
    var $_result; # result resource
    
    
    /***** Constructor *****/
    /*
    public void
    */
    function DB( $server, $username, $password, $database )
    {
        $this->_link = @mysql_connect( $server, $username, $password );
        @mysql_query("SET NAMES 'utf8'", $this->_link); 
        if( !$this->_link )
        {   # unable to establish connection to the database server
            $this->_reportError( 'Cannot connect to the database' );
        }
        if( !mysql_select_db( $database ) )
        {   # unable to select database
            $this->_reportError( 'Cannot select database.' );
        }
    }
    
    
    /***** Core Operations *****/
    /*
    public resource
    */
    function query( $sql ) 
    {
        $this->_query_string = $sql;
        $this->_result = mysql_query( $sql ) or $this->_reportError( 'Invalid Query' );
        return $this->_result;
    }
    
    /*
    public string
    returns the first single cell valie from the result set
    */
    function getVal( $sql )
    {
        $this->query( $sql );
        return ($this->numRows()>0) ? mysql_result( $this->_result, 0 ) : false;
    }

    /*
    public mixed-array
    */
    function fetchArray() 
    {
        return mysql_fetch_array( $this->_result );
    }

    /*
    public assoc-array
    */
    function fetchAssoc() 
    {
	return mysql_fetch_assoc( $this->_result );
    }
    
    /*
    public array
    */
    function fetchRow() 
    {
        return mysql_fetch_row( $this->_result );
    }
    
    /*
    public string (integer)
    */
    function numRows() 
    {
        return mysql_num_rows( $this->_result );
    }
    
    /*
    public string (integer)
    */
    function affectedRows() 
    {
        return mysql_affected_rows( $this->_link );
    }

    /*
    public string
    */
    function insertId()
    {
        return mysql_insert_id( $this->_link );
    }

    /*
    public boolean
    */
    function seek( $row_number )
    {
        return mysql_data_seek( $this->_result, (int)$row_number );
    }

    /*
    private void
    */
    function close() 
    {
        mysql_close( $this->_link );
    }
    
    
    /***** Error Handling *****/
    /*
    private string
    */
    function _getError()
    {
        $this->_error_string = mysql_error();
        return $this->_error_string;
    }
    
    /*
    private void
    */
    function _reportError( $error_str = '' )
    {
        $this->_getError();
        $msgs = array();
        if( !empty( $error_str ) )
        {
            $msgs[] = '<p>' .$error_string. '</p>';
        }
        if( isset( $this->_query_string ) )
        {
            $msgs[] = '<strong>Query String:</strong><br />'."\n".'<pre>' .$this->_query_string. '</pre>';
        }
        if( !empty( $this->_error_string ) )
        {
            $msgs[] = '<p>' .$this->_error_string. '</p>';
        }
        if( $_GET )
        {
            $msgs[] = '<h1>_GET</h1><pre>' .var_export( $_GET, true ). '</pre>';
        }
        if( $_POST )
        {
            $msgs[] = '<h1>_POST</h1><pre>' .var_export( $_POST, true ). '</pre>';
        }
        if( $_SESSION )
        {
            $msgs[] = '<h1>_SESSION</h1><pre>' .var_export( $_SESSION, true ). '</pre>';
        }
        # display or send?
        if( DEBUG )
        {   # development environment - display error immediately
            die( implode( "\n", $msgs ) );
        }
        else
        {   # live server - notify developer via email and then stop script execution
            $headers =  "Content-Type: text/html; charset=big5\r\n".
                        "X-Mailer: PHP/".phpversion();
            mail( EMAIL_DEVELOPER, $_SERVER['SERVER_NAME'].' ERROR: '.$error_str, implode( "\n", $msgs ), $headers );
            die( 'A database error occurred.' );
        }
    }
    
    
}

?>