<?php 
/*!
 * Developed by Kevin Warren, https://twitter.com/SkynetWebS
 *
 * Released under the MIT license
 * http://opensource.org/licenses/MIT
 *
 * Detect Device 1.0.1
 *
 * Last Modification Date: 20/03/2015
 */
require_once 'Mobile_Detect.php';
class Detect {
	private static $ipAddress = null;
	private static $ipUrl = null;
	private static $ipInfo = null;
	private static $ipInfoError = false;
	private static $ipInfoSource = null;
	private static $ipInfoHostname = null;
	private static $ipInfoOrg = null;
	private static $ipInfoCountry = null;
	#private static $ipInfoLatitude = null;
	#private static $ipInfoLongitude = null;
	#private static $ipInfoAddress = null;
	private static $detect = null;
	
	public static function init() {
		self::$detect = new Mobile_Detect();
		self::$detect->setDetectionType(Mobile_Detect::DETECTION_TYPE_EXTENDED);
		self::getIp();
	}
	
	private static function getIp() {
		#self::$setDetectionType(Mobile_Detect::DETECTION_TYPE_EXTENDED);
		if (isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP'])) { self::$ipAddress = $_SERVER['HTTP_CLIENT_IP']; }
		elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { self::$ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR']; }
		else { self::$ipAddress = $_SERVER['REMOTE_ADDR']; }
		if (in_array(self::$ipAddress, array('::1', '127.0.0.1', 'localhost'))) {
			self::$ipAddress = 'localhost';
			self::$ipUrl = '';
		} else {
			self::$ipUrl = '/' . self::$ipAddress;
		}
	}
	
	public static function isMobile() {
		return self::$detect->isMobile();
	}
	
	public static function isTablet() {
		return self::$detect->isTablet();
	}
	
	public static function isPhone() {
		return (self::$detect->isMobile() ? (self::$detect->isTablet() ? false : true) : false);
	}
	
	public static function isComputer() {
		return (self::$detect->isMobile() ? false : true);
	}
	
	public static function deviceType() {
		return (self::$detect->isMobile() ? (self::$detect->isTablet() ? 'Tablet' : 'Phone') : 'Computer');
	}
	
	public static function version($var) {
		return self::$detect->version($var);
	}
	
	public static function __callStatic($name, $arguments) {
		if (substr($name, 0, 2) != 'is') {
            Debug::error('No such method exists: ' . $name);
        }
        return self::$detect->{$name}();
	}
	
	public static function brand() {
		#$agent = $_SERVER['HTTP_USER_AGENT'];
		$brand = 'Unknown Brand';
		switch (self::deviceType()) {
		case 'Phone':
			foreach(self::$detect->getPhoneDevices() as $name => $regex) {
				$check = self::$detect->{'is'.$name}();
				if ($check !== false) { $brand = $name; }
			}
			return $brand;
		case 'Tablet':
			foreach(self::$detect->getTabletDevices() as $name => $regex) {
				$check = self::$detect->{'is'.$name}();
				if ($check !== false) { $brand = str_replace('Tablet', '', $name); }
			}
			return $brand;
			break;
		case 'Computer':
			return $brand;
			break;
		}
	}
	
	public static function os() {
		#self::$getOperatingSystems();
		$agent = $_SERVER['HTTP_USER_AGENT'];
		$version = '';
		$codeName = '';
		$os = 'Unknown OS';
		foreach(self::$detect->getOperatingSystems() as $name => $regex) {
			$check = self::$detect->version($name);
			if ($check !== false) { $os = $name . ' ' . $check; }
			break;
		}
		if (self::$detect->isAndroidOS()) {
			if (self::$detect->version('Android') !== false) {
				$version = ' ' . self::$detect->version('Android');
				switch (true) {
					case self::$detect->version('Android') >= 5.0: $codeName = ' (Lollipop)'; break;
					case self::$detect->version('Android') >= 4.4: $codeName = ' (KitKat)'; break;
					case self::$detect->version('Android') >= 4.1: $codeName = ' (Jelly Bean)'; break;
					case self::$detect->version('Android') >= 4.0: $codeName = ' (Ice Cream Sandwich)'; break;
					case self::$detect->version('Android') >= 3.0: $codeName = ' (Honeycomb)'; break;
					case self::$detect->version('Android') >= 2.3: $codeName = ' (Gingerbread)'; break;
					case self::$detect->version('Android') >= 2.2: $codeName = ' (Froyo)'; break;
					case self::$detect->version('Android') >= 2.0: $codeName = ' (Eclair)'; break;
					case self::$detect->version('Android') >= 1.6: $codeName = ' (Donut)'; break;
					case self::$detect->version('Android') >= 1.5: $codeName = ' (Cupcake)'; break;
					default: $codeName = ''; break;
				}
			}
			$os = 'Android' . $version . $codeName;
		} elseif (preg_match('/Linux/', $agent)) {
			$os = 'Linux';
		} elseif (preg_match('/Mac OS X/', $agent)) {
			if (preg_match('/Mac OS X 10_10/', $agent) || preg_match('/Mac OS X 10.10/', $agent)) {
				$codeName = ' (Yosemite)';
			} elseif (preg_match('/Mac OS X 10_9/', $agent) || preg_match('/Mac OS X 10.9/', $agent)) {
				$codeName = ' (Mavericks)';
			} elseif (preg_match('/Mac OS X 10_8/', $agent) || preg_match('/Mac OS X 10.8/', $agent)) {
				$codeName = ' (Mountain Lion)';
			} elseif (preg_match('/Mac OS X 10_7/', $agent) || preg_match('/Mac OS X 10.7/', $agent)) {
				$codeName = ' (Lion)';
			} elseif (preg_match('/Mac OS X 10_6/', $agent) || preg_match('/Mac OS X 10.6/', $agent)) {
				$codeName = ' (Snow Leopard)';
			} elseif (preg_match('/Mac OS X 10_5/', $agent) || preg_match('/Mac OS X 10.5/', $agent)) {
				$codeName = ' (Leopard)';
			} elseif (preg_match('/Mac OS X 10_4/', $agent) || preg_match('/Mac OS X 10.4/', $agent)) {
				$codeName = ' (Tiger)';
			} elseif (preg_match('/Mac OS X 10_3/', $agent) || preg_match('/Mac OS X 10.3/', $agent)) {
				$codeName = ' (Panther)';
			} elseif (preg_match('/Mac OS X 10_2/', $agent) || preg_match('/Mac OS X 10.2/', $agent)) {
				$codeName = ' (Jaguar)';
			} elseif (preg_match('/Mac OS X 10_1/', $agent) || preg_match('/Mac OS X 10.1/', $agent)) {
				$codeName = ' (Puma)';
			} elseif (preg_match('/Mac OS X 10/', $agent)) {
				$codeName = ' (Cheetah)';
			}
			$os = 'Mac OS X' . $codeName;
		} elseif (self::$detect->isWindowsPhoneOS()) {
			$icon = 'windowsphone8';
			if (self::$detect->version('WindowsPhone') !== false) {
				$version = ' ' . self::$detect->version('WindowsPhoneOS');
				/*switch (true) {
					case $version >= 8: $icon = 'windowsphone8'; break;
					case $version >= 7: $icon = 'windowsphone7'; break;
					default: $icon = 'windowsphone8'; break;
				}*/
			}
			$os = 'Windows Phone' . $version;
		} elseif (self::$detect->version('Windows NT') !== false) {
			switch (self::$detect->version('Windows NT')) {
				case 10.0: $codeName = ' 10'; break;
				case 6.3: $codeName = ' 8.1'; break;
				case 6.2: $codeName = ' 8'; break;
				case 6.1: $codeName = ' 7'; break;
				case 6.0: $codeName = ' Vista'; break;
				case 5.2: $codeName = ' Server 2003; Windows XP x64 Edition'; break;
				case 5.1: $codeName = ' XP'; break;
				case 5.01: $codeName = ' 2000, Service Pack 1 (SP1)'; break;
				case 5.0: $codeName = ' 2000'; break;
				case 4.0: $codeName = ' NT 4.0'; break;
				default: $codeName = ' NT v' . self::$detect->version('Windows NT'); break;
			}
			$os = 'Windows' . $codeName;
		}
		return $os;
		
	}
	
	
		
}
Detect::init();